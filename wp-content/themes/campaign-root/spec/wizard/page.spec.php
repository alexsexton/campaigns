<?php

describe(\Dxw\GdsCampaignRoot\Wizard\Page::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([]));
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    describe('->register()', function () {
        it('registers the things', function () {
            expect($this->page)->to->be->instanceof(\Dxw\Iguana\Registerable::class);

            \WP_Mock::expectActionAdded('admin_menu', [$this->page, 'adminMenu']);
            \WP_Mock::expectActionAdded('wp_ajax_campaigns_wizard_set', [$this->page, 'wpAjax']);

            $this->page->register();
        });
    });

    describe('->adminMenu()', function () {
        it('calls add_submenu_page', function () {
            \WP_Mock::wpFunction('add_submenu_page', [
                'args' => [
                    'tools.php',
                    'Setting up analytics',
                    'Setting up analytics',
                    'activate_plugins',
                    'wizard',
                    [$this->page, 'callback'],
                ],
                'times' => 1,
            ]);

            $this->page->adminMenu();
        });
    });

    describe('->callback()', function () {
        it('calls get_template_part', function () {
            \WP_Mock::wpFunction('get_template_part', [
                'args' => ['admin/wizard/page'],
                'times' => 1,
            ]);

            $this->page->callback();
        });
    });

    describe('->wpAjax()', function () {
        beforeEach(function () {
            $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([
                'campaigns_wizard_type' => 'ga',
                'campaigns_wizard_id' => 'UA-123456',
                'nonce' => '999999',
            ]));

            \WP_Mock::wpFunction('update_option', [
                'args' => ['campaigns_ga_id', 'UA-123456'],
                'times' => 0,
            ]);

            \WP_Mock::wpFunction('wp_die', [
                'times' => 1,
            ]);
        });

        context('with no type', function () {
            beforeEach(function () {
                $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([
                    'campaigns_wizard_id' => 'UA-123456',
                    'nonce' => '999999',
                ]));
            });

            it('does nothing', function () {
                ob_start();
                $this->page->wpAjax();
                $output = ob_get_clean();
                expect(json_decode($output, true))->to->equal([
                    'error' => true,
                    'message' => 'type missing',
                ]);
            });
        });

        context('with invalid type', function () {
            beforeEach(function () {
                $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([
                    'nonce' => '999999',
                    'campaigns_wizard_type' => 'meow',
                    'campaigns_wizard_id' => 'UA-123456',
                ]));
            });

            it('does nothing', function () {
                ob_start();
                $this->page->wpAjax();
                $output = ob_get_clean();
                expect(json_decode($output, true))->to->equal([
                    'error' => true,
                    'message' => 'type incorrect',
                ]);
            });
        });

        context('with no nonce', function () {
            beforeEach(function () {
                $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([
                    'campaigns_wizard_type' => 'ga',
                    'campaigns_wizard_id' => 'UA-123456',
                ]));
            });

            it('does nothing', function () {
                ob_start();
                $this->page->wpAjax();
                $output = ob_get_clean();
                expect(json_decode($output, true))->to->equal([
                    'error' => true,
                    'message' => 'nonce missing',
                ]);
            });
        });

        context('with a non-string nonce', function () {
            beforeEach(function () {
                $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([
                    'campaigns_wizard_type' => 'ga',
                    'campaigns_wizard_id' => 'UA-123456',
                    'nonce' => [],
                ]));
            });

            it('does nothing', function () {
                ob_start();
                $this->page->wpAjax();
                $output = ob_get_clean();
                expect(json_decode($output, true))->to->equal([
                    'error' => true,
                    'message' => 'nonce missing',
                ]);
            });
        });

        context('with an invalid nonce', function () {
            beforeEach(function () {
                $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([
                    'campaigns_wizard_type' => 'ga',
                    'campaigns_wizard_id' => 'UA-123456',
                    'nonce' => '111111',
                ]));

                \WP_Mock::wpFunction('wp_verify_nonce', [
                    'args' => ['111111', 'campaigns_wizard'],
                    'return' => false,
                ]);
            });

            it('does nothing', function () {
                ob_start();
                $this->page->wpAjax();
                $output = ob_get_clean();
                expect(json_decode($output, true))->to->equal([
                    'error' => true,
                    'message' => 'invalid nonce',
                ]);
            });
        });

        context('with a valid nonce', function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('wp_verify_nonce', [
                    'args' => ['999999', 'campaigns_wizard'],
                    'return' => true,
                ]);
            });

            context('when triggered by non-admin-level user', function () {
                beforeEach(function () {
                    \WP_Mock::wpFunction('current_user_can', [
                        'args' => ['activate_plugins'],
                        'return' => false,
                    ]);
                });

                it('does nothing', function () {
                    ob_start();
                    $this->page->wpAjax();
                    $output = ob_get_clean();
                    expect(json_decode($output, true))->to->equal([
                        'error' => true,
                        'message' => 'user not permitted',
                    ]);
                });
            });

            context('when triggered by an admin-level user', function () {
                beforeEach(function () {
                    \WP_Mock::wpFunction('current_user_can', [
                        'args' => ['activate_plugins'],
                        'return' => true,
                    ]);
                });

                it('updates the ga option', function () {
                    \WP_Mock::wpFunction('update_option', [
                        'args' => ['campaigns_ga_id', 'UA-123456'],
                        'times' => 1,
                    ]);

                    ob_start();
                    $this->page->wpAjax();
                    $output = ob_get_clean();
                    expect(json_decode($output, true))->to->equal([
                        'error' => false,
                    ]);
                });

                it('updates the gtm option', function () {
                    $this->page = new \Dxw\GdsCampaignRoot\Wizard\Page(new \Dxw\Iguana\Value\Post([
                        'campaigns_wizard_type' => 'gtm',
                        'campaigns_wizard_id' => 'GTM-123456',
                        'nonce' => '999999',
                    ]));

                    \WP_Mock::wpFunction('update_option', [
                        'args' => ['campaigns_gtm_id', 'GTM-123456'],
                        'times' => 1,
                    ]);

                    ob_start();
                    $this->page->wpAjax();
                    $output = ob_get_clean();
                    expect(json_decode($output, true))->to->equal([
                        'error' => false,
                    ]);
                });
            });
        });
    });
});
