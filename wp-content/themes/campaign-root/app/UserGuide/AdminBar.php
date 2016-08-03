<?php

namespace Dxw\GdsCampaignRoot\UserGuide;

class AdminBar implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('admin_bar_menu', [$this, 'adminBarMenu'], 101);
    }

    public function adminBarMenu(\WP_Admin_Bar $wpAdminBar)
    {
        $wpAdminBar->add_node([
            'id' => 'user-guide',
            'title' => 'User Guide',
            'href' => network_site_url('/user-guide/'),
        ]);
    }
}
