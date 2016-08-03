<?php

describe(\Dxw\GdsCampaignRoot\UserGuide\AdminBar::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();

        $this->wpAdminBar = \Mockery::mock(\WP_Admin_Bar::class);

        $this->adminBar = new \Dxw\GdsCampaignRoot\UserGuide\AdminBar();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
    });

    it('is registerable', function () {
        expect($this->adminBar)->to->be->instanceof(\Dxw\Iguana\Registerable::class);
    });

    describe('->register()', function () {
        it('adds actions', function () {
            \WP_Mock::expectActionAdded('admin_bar_menu', [$this->adminBar, 'adminBarMenu'], 101);

            $this->adminBar->register();
        });
    });

    describe('->adminBarMenu()', function () {
        it('adds a menu item', function () {
            \WP_Mock::wpFunction('network_site_url', [
                'args' => ['/user-guide/'],
                'return' => 'https://campaigns.gov.uk/user-guide/',
            ]);

            $this->wpAdminBar->shouldReceive('add_node')
            ->with([
                'id' => 'user-guide',
                'title' => 'User Guide',
                'href' => 'https://campaigns.gov.uk/user-guide/',
            ])
            ->once();

            $this->adminBar->adminBarMenu($this->wpAdminBar);
        });
    });
});
