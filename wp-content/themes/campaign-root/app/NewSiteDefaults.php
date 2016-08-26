<?php

namespace Dxw\GdsCampaignRoot;

class NewSiteDefaults implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('wpmu_new_blog', [$this, 'wpmuNewBlog']);
    }

    public function wpmuNewBlog($_blog_id)
    {
        switch_to_blog($_blog_id);

        $home_id = wp_insert_post([
            'post_title' => 'Home page',
            'post_type' => 'page',
            'post_status' => 'publish',
        ]);

        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_id);

        restore_current_blog();
    }
}
