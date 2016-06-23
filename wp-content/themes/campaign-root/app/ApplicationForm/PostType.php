<?php

namespace Dxw\GdsCampaignRoot\ApplicationForm;

class PostType implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        \register_post_type('gds_application', [
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'labels' => [
                'name' => 'Applications',
                'singular_name' => 'Application',
            ],
            // Apparently this needs to be false instead of an empty array
            'supports' => false,
        ]);
    }
}
