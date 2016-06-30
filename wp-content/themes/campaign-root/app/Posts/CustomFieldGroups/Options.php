<?php

namespace Dxw\GdsCampaignRoot\Posts\CustomFieldGroups;

class Options implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        if (function_exists('acf_add_options_sub_page')) {
            acf_add_options_sub_page('Homepage');
            acf_add_options_sub_page('Error page');
        }

        if (function_exists('register_options_page')) {
            register_options_page('Homepage');
        }
    }
}
