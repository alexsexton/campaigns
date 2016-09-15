<?php

describe(\Dxw\GdsCampaignRoot\NewSiteDefaults::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();

        $this->newSiteDefaults = new \Dxw\GdsCampaignRoot\NewSiteDefaults();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    describe('->__construct()', function () {
        it('is registerable', function () {
            expect($this->newSiteDefaults)->to->be->instanceof(\Dxw\Iguana\Registerable::class);
        });
    });

    describe('->register()', function () {
        it('registers action', function () {
            \WP_Mock::expectActionAdded('wpmu_new_blog', [$this->newSiteDefaults, 'wpmuNewBlog']);
            $this->newSiteDefaults->register();
        });
    });

    describe('->wpmuNewBlog()', function () {
        it('creates a new post', function () {
            \WP_Mock::wpFunction('switch_to_blog', [
                'args' => [5],
                'return' => function ($a) {
                    $GLOBALS['test_switch_to_blog'] = $a;
                },
                'times' => 1,
            ]);

            \WP_Mock::wpFunction('restore_current_blog', [
                'args' => [],
                'return' => function () {
                    $GLOBALS['test_switch_to_blog'] = 0;
                },
                'times' => 1,
            ]);

            \WP_Mock::wpFunction('wp_insert_post', [
                'args' => [[
                    'post_title' => 'Home page',
                    'post_type' => 'page',
                    'post_status' => 'publish',
                ]],
                'return' => function () {
                    // This can't be called before switch_to_blog or after restore_current_blog
                    expect($GLOBALS['test_switch_to_blog'])->to->equal(5);
                    return 7;
                },
                'times' => 1,
            ]);

            \WP_Mock::wpFunction('update_option', [
                'args' => ['show_on_front', 'page'],
                'return' => function () {
                    expect($GLOBALS['test_switch_to_blog'])->to->equal(5);
                },
                'times' => 1,
            ]);

            \WP_Mock::wpFunction('update_option', [
                'args' => ['page_on_front', 7],
                'return' => function () {
                    expect($GLOBALS['test_switch_to_blog'])->to->equal(5);
                },
                'times' => 1,
            ]);

            \WP_Mock::wpFunction('update_option', [
                'args' => ['template', \Dxw\GdsCampaignRoot\NewSiteDefaults::DEFAULT_THEME],
                'return' => function () {
                    expect($GLOBALS['test_switch_to_blog'])->to->equal(5);
                },
                'times' => 1,
            ]);

            \WP_Mock::wpFunction('update_option', [
                'args' => ['stylesheet', \Dxw\GdsCampaignRoot\NewSiteDefaults::DEFAULT_THEME],
                'return' => function () {
                    expect($GLOBALS['test_switch_to_blog'])->to->equal(5);
                },
                'times' => 1,
            ]);

            $this->newSiteDefaults->wpmuNewBlog(5);
        });
    });
});
