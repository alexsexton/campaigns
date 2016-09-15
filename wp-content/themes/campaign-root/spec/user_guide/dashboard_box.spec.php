<?php

describe(\Dxw\GdsCampaignRoot\UserGuide\DashboardBox::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();

        $this->dashboardBox = new \Dxw\GdsCampaignRoot\UserGuide\DashboardBox();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registerable', function () {
        expect($this->dashboardBox)->to->be->instanceof(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('adds actions', function () {
            \WP_Mock::expectActionAdded('wp_dashboard_setup', [$this->dashboardBox, 'wpDashboardSetup']);
            \WP_Mock::expectActionAdded('default_hidden_meta_boxes', [$this->dashboardBox, 'defaultHiddenMetaBoxes'], 10, 2);

            $this->dashboardBox->register();
        });
    });

    describe('->wpDashboardSetup()', function () {
        it('adds widget', function () {
            \WP_Mock::wpFunction('get_current_screen', [
                'args' => [],
                'return' => 'current-screen',
            ]);

            \WP_Mock::wpFunction('add_meta_box', [
                'args' => ['get-started', 'Get Started', [$this->dashboardBox, 'callback'], 'current-screen', 'normal', 'high'],
                'times' => 1,
            ]);

            $this->dashboardBox->wpDashboardSetup();
        });
    });

    describe('->callback()', function () {
        it('displays content', function () {
            $homepage_id = 4;
            \WP_Mock::wpFunction('esc_attr', [
                'return' => function ($a) { return '_'.$a.'_'; },
            ]);

            \WP_Mock::wpFunction('get_option', [
                'return' => $homepage_id,
            ]);

            \WP_Mock::wpFunction('network_site_url', [
                'args' => ['/user-guide/'],
                'return' => 'https://campaigns.gov.uk/user-guide/',
            ]);

            \WP_Mock::wpFunction('network_site_url', [
                'args' => ['/style-guide/'],
                'return' => 'https://campaigns.gov.uk/style-guide/',
            ]);

            \WP_Mock::wpFunction('admin_url', [
                'return' => function ($a) { return 'https://campaigns.gov.uk/my-site/wp-admin/'.$a; },
            ]);

            ob_start();
            $this->dashboardBox->callback();
            $output = ob_get_clean();

            expect($output)->to->contain('<a href="_https://campaigns.gov.uk/user-guide/_" class="button button-primary">Campaigns platform user guide</a>');
            expect($output)->to->contain('<a href="_https://campaigns.gov.uk/my-site/wp-admin/post.php?post='.$homepage_id.'&action=edit_" class="button button-primary">Build a homepage</a>');
        });
    });

    describe('defaultHiddenMetaBoxes', function () {
        context('when second argument is "dashboard"', function () {
            beforeEach(function () {
                $this->screen = \Mockery::mock(\WP_Screen::class, function ($mock) {
                    $mock->id = 'dashboard';
                });
            });

            context('when first argument is empty array', function () {
                it('adds to list of hidden metaboxes', function () {
                    $output = $this->dashboardBox->defaultHiddenMetaBoxes([], $this->screen);

                    expect($output)->to->equal([
                        'dashboard_activity',
                        'dashboard_primary',
                    ]);
                });
            });

            context('when first argument is not empty', function () {
                it('adds to list of hidden metaboxes', function () {
                    $output = $this->dashboardBox->defaultHiddenMetaBoxes(['meow', '123'], $this->screen);

                    expect($output)->to->equal([
                        'meow',
                        '123',
                        'dashboard_activity',
                        'dashboard_primary',
                    ]);
                });
            });
        });

        context('when second argument is not "dashboard"', function () {
            beforeEach(function () {
                $this->screen = \Mockery::mock(\WP_Screen::class, function ($mock) {
                    $mock->id = 'not-dashboard';
                });
            });

            it('should do nothing', function () {
                $output = $this->dashboardBox->defaultHiddenMetaBoxes(['meow', '123'], $this->screen);

                expect($output)->to->equal([
                    'meow',
                    '123',
                ]);
            });
        });
    });
});
