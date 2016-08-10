<?php

namespace Dxw\GdsCampaignRoot\Theme;

class Helpers implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        add_action('wp_footer', [$this, 'wpFooter']);
    }

    public function wpFooter()
    {
      //..
    }
}
