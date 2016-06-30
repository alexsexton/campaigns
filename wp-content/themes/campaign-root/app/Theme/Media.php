<?php

namespace Dxw\GdsCampaignRoot\Theme;

class Media implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        set_post_thumbnail_size(150, 150, true);
        add_image_size('medium', 200, 200, true);
        add_image_size('large', 800, 300, true);

        add_theme_support('post-thumbnails');

        add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
        add_filter('image_send_to_editor', 'remove_width_attribute', 10);

        // Makes doing RWD images much easier
        function remove_width_attribute($html)
        {
            $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
            return $html;
        }
    }
}
