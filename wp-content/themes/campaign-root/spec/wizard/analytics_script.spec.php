<?php

describe(\Dxw\GdsCampaignRoot\Wizard\AnalyticsScript::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();

        $this->analyticsScript = new \Dxw\GdsCampaignRoot\Wizard\AnalyticsScript();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    describe('->register()', function () {
        it('adds the appropriate callbacks', function () {
            expect($this->analyticsScript)->to->be->instanceof(\Dxw\Iguana\Registerable::class);

            \WP_Mock::expectActionAdded('wp_print_scripts', [$this->analyticsScript, 'wpPrintScripts']);

            $this->analyticsScript->register();
        });
    });

    describe('->wpPrintScripts()', function () {
        context('with option unset', function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_ga_id'],
                    'return' => false,
                ]);
            });

            it('outputs nothing', function () {
                ob_start();
                $this->analyticsScript->wpPrintScripts();
                $output = ob_get_clean();

                expect($output)->to->equal('');
            });
        });

        context('with option set to blank', function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_ga_id'],
                    'return' => '',
                ]);
            });

            it('outputs nothing', function () {
                ob_start();
                $this->analyticsScript->wpPrintScripts();
                $output = ob_get_clean();

                expect($output)->to->equal('');
            });
        });

        context('with option set', function () {
            beforeEach(function () {
                \WP_Mock::wpFunction('get_option', [
                    'args' => ['campaigns_ga_id'],
                    'return' => 'UA-123456-1',
                ]);

                \WP_Mock::wpFunction('esc_js', [
                    'args' => ['UA-123456-1'],
                    'return' => '_UA-123456-1_',
                ]);
            });

            it('outputs Analytics JS', function () {
                ob_start();
                $this->analyticsScript->wpPrintScripts();
                $output = ob_get_clean();

                expect($output)->to->contain('<script>');
                expect($output)->to->contain('GoogleAnalyticsObject');
                expect($output)->to->contain("ga('create', '_UA-123456-1_', 'auto');");
            });
        });
    });
});
