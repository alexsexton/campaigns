<?php

namespace Dxw\GdsCampaignRoot\Theme;

class Pages implements \Dxw\Iguana\Registerable
{

    public function add_taxonomies_to_pages()
    {
        register_taxonomy_for_object_type('category', 'page');
    }

    public function category_archives($wp_query)
    {
        $my_post_array = array('post','page');

        if ($wp_query->get('category_name') || $wp_query->get('cat')) {
            $wp_query->set('post_type', $my_post_array);
        }
    }

    public function register()
    {
        add_action('init', [$this, 'add_taxonomies_to_pages']);

        if (! is_admin()) {
            add_action('pre_get_posts', [$this, 'category_archives']);
        }
    }
}
