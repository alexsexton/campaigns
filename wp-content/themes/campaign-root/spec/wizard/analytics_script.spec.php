<?php

describe(\Dxw\GdsCampaignRoot\Wizard\AnalyticsScript::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();

        \WP_Mock::wpFunction('esc_js', [
            'return' => function ($a) {
                return '_'.$a.'_';
            },
        ]);

        $this->analyticsScript = new \Dxw\GdsCampaignRoot\Wizard\AnalyticsScript();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    describe('->register()', function () {
        it('adds the appropriate callbacks', function () {
            expect($this->analyticsScript)->to->be->instanceof(\Dxw\Iguana\Registerable::class);

            \WP_Mock::expectActionAdded('campaigns_after_body', [$this->analyticsScript, 'campaignsAfterBody']);

            $this->analyticsScript->register();
        });
    });

    describe('->campaignsAfterBody()', function () {
        context('with option unset', function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_gtm_id'],
                    'return' => false,
                ]);

                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_ga_id'],
                    'return' => false,
                ]);
            });

            it('outputs nothing', function () {
                ob_start();
                $this->analyticsScript->campaignsAfterBody();
                $output = ob_get_clean();

                expect($output)->to->equal('');
            });
        });

        context('with option set to blank', function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_gtm_id'],
                    'return' => false,
                ]);

                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_ga_id'],
                    'return' => '',
                ]);
            });

            it('outputs nothing', function () {
                ob_start();
                $this->analyticsScript->campaignsAfterBody();
                $output = ob_get_clean();

                expect($output)->to->equal('');
            });
        });

        context('with ga option set', function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_ga_id'],
                    'return' => 'UA-123456-1',
                ]);
            });

            it('outputs Analytics JS', function () {
                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_gtm_id'],
                    'return' => false,
                ]);

                ob_start();
                $this->analyticsScript->campaignsAfterBody();
                $output = ob_get_clean();

                expect($output)->to->contain('<script>');
                expect($output)->to->contain('GoogleAnalyticsObject');
                expect($output)->to->contain("ga('create', '_UA-123456-1_', 'auto');");
            });

            context('with gtm option set', function () {
                beforeEach(function () {
                    \WP_Mock::wpFunction('get_option', [
                        'args' => ['campaigns_gtm_id'],
                        'return' => 'GTM-123456',
                    ]);
                });

                it('outputs GTM JS', function () {
                    ob_start();
                    $this->analyticsScript->campaignsAfterBody();
                    $output = ob_get_clean();

                    expect($output)->to->contain('<script>');
                    expect($output)->to->contain('googletagmanager.com');
                    expect($output)->to->contain("?id=_GTM-123456_");
                    expect($output)->to->contain("'_GTM-123456_'");
                });
            });
        });
    });
});
