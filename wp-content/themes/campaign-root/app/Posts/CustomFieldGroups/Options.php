<?php

namespace Dxw\GdsCampaignRoot\Posts\CustomFieldGroups;

class Options implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        if (function_exists('acf_add_options_sub_page')) {
            acf_add_options_sub_page('Error page');
        }

        if (function_exists('register_options_page')) {
            register_options_page('Error page');
        }

        register_field_group(array(
            'key' => 'group_5795e5dc9da5a',
            'title' => 'Error Page',
            'fields' => array(
                array(
                    'key' => 'field_5795e5df86bc6',
                    'label' => 'Error Page Message',
                    'name' => 'error_page_message',
                    'type' => 'wysiwyg',
                    'instructions' => 'This message will be shown on 404 (file not found) pages.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-error-page',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
            )
        );
    }
}
