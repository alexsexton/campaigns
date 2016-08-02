<?php

namespace Dxw\GdsCampaignRoot\Theme;

class Options implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        acf_add_options_sub_page([
            'page_title' => 'Options',
            'parent_slug' => 'themes.php',
        ]);

        acf_add_local_field_group([
            'key' => 'group_577e95f281e15',
            'title' => 'Options',
            'fields' => array(
                array(
                    'key' => 'field_5783ad6ac8402',
                    'label' => 'Site Logo',
                    'name' => 'site_logo',
                    'type' => 'image',
                    'instructions' => 'The logo will scale so that is 208 pixels in width',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '416 PX',
                    'max_height' => '',
                    'max_size' => '256 KB',
                    'mime_types' => 'png',
                ),
                array(
                    'key' => 'field_5783ad80c8403',
                    'label' => 'Header Background Image',
                    'name' => 'header_background_image',
                    'type' => 'file',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'library' => 'all',
                    'min_size' => '',
                    'max_size' => '',
                    'mime_types' => 'png,jpg',
                ),
                array(
                    'key' => 'field_5783ada6c8404',
                    'label' => 'Header Background Colour',
                    'name' => 'header_background_colour',
                    'type' => 'color_picker',
                    'instructions' => 'Shows when no image is defined.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '#005ea5',
                ),
                array(
                    'key' => 'field_5783adf460314',
                    'label' => 'Facebook',
                    'name' => 'facebook_id',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'https://www.facebook.com/example',
                ),
                array(
                    'key' => 'ield_5783ae2260315',
                    'label' => 'Twitter',
                    'name' => 'twitter_id',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'https://twitter.com/example',
                ),
                array(
                    'key' => 'field_5783ae3160426',
                    'label' => 'YouTube',
                    'name' => 'youtube_id',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'https://www.youtube.com/channel/example',
                ),
                array(
                    'key' => 'field_5783ae3160316',
                    'label' => 'Linkedin ID',
                    'name' => 'linkedin_id',
                    'type' => 'url',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'https://www.linkedin.com/company/example',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-options',
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
        ]);
    }
}
