<?php

class Theme_Options_Test extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        \WP_Mock::setUp();
    }

    public function tearDown()
    {
        \WP_Mock::tearDown();
    }

    public function testRegister()
    {
        $options = new \Dxw\GdsCampaignRoot\Theme\Options();

        $this->assertInstanceOf(\Dxw\Iguana\Registerable::class, $options);

        \WP_Mock::wpFunction('acf_add_options_sub_page', [
            'args' => [[
                'page_title' => 'Sitewide Appearance',
                'parent_slug' => 'themes.php',
            ]],
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('acf_add_local_field_group', [
            'args' => [[
                'key' => 'group_577e95f281e19',
                'title' => 'Header',
                'fields' => array(
                    array(
                        'key' => 'field_576c2b1d4517',
                        'label' => 'Site Tagline',
                        'name' => 'site_tagline',
                        'type' => 'textarea',
                        'instructions' => 'This shows in the sitewide header to the right of the logo.',
                        'required' => '',
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_5731697a2fac4',
                        'label' => 'Tagline Colour',
                        'name' => 'tagline_colour',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'choices' => array(
                            'light-text' => 'Light',
                            'dark-text' => 'Dark',
                        ),
                        'default_value' => array(
                            0 => 'light-text'
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'disabled' => 0,
                        'readonly' => 0
                    ),
                    array(
                        'key' => 'field_5783ad6ac8402',
                        'label' => 'Site Logo',
                        'name' => 'site_logo',
                        'type' => 'image',
                        'instructions' => 'The logo should be no bigger than 624px in width.',
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
                        'min_width' => '208 PX',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '624 PX',
                        'max_height' => '',
                        'max_size' => '256 KB',
                        'mime_types' => 'png',
                    ),
                    array(
                        'key' => 'field_5783ad80c8403',
                        'label' => 'Header Background Image',
                        'name' => 'header_background_image',
                        'type' => 'file',
                        'instructions' => 'The background image should be bigger than 1400px by 300px.',
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
                        'max_size' => '512 KB',
                        'min_width' => '1400 PX',
                        'min_height' => '300 PX',
                        'mime_types' => 'png,jpg',
                    ),
                    array(
                        'key' => 'field_5783ada6c8404',
                        'label' => 'Header Background Colour',
                        'name' => 'header_background_colour',
                        'type' => 'color_picker',
                        'instructions' => 'Shown when no image is defined.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '#005ea5',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options-sitewide-appearance',
                        ),
                    ),
                ),
                'menu_order' => 1,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
                ],
            ],
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('acf_add_local_field_group', [
            'args' => [[
                    'key' => 'group_579e95e281f15',
                    'title' => 'Button Styles',
                    'fields' => array(
                        array(
                            'key' => 'field_5331597f2fac1',
                            'label' => 'Button Style',
                            'name' => 'button_style',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'choices' => array(
                                'default' => 'Default (Green)',
                                'button-dark' => 'Dark with light text',
                                'button-light' => 'Light with dark text',
                                'button-ghost--dark' => 'Outlined with dark text',
                                'button-ghost--light' => 'Outlined with light text',
                            ),
                            'default_value' => array(
                                0 => 'default'
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'ajax' => 0,
                            'placeholder' => '',
                            'disabled' => 0,
                            'readonly' => 0
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'options_page',
                                'operator' => '==',
                                'value' => 'acf-options-sitewide-appearance',
                            ),
                        ),
                    ),
                    'menu_order' => 2,
                    'position' => 'normal',
                    'style' => 'default',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => 1,
                    'description' => '',
                    ],
                ],
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('acf_add_local_field_group', [
            'args' => [[
                'key' => 'group_534e95f281a15',
                'title' => 'Social Media Icons',
                'fields' => array(
                    array(
                        'key' => 'field_5783adf460314',
                        'label' => 'Facebook',
                        'name' => 'facebook_id',
                        'type' => 'url',
                        'instructions' => 'The link to your Facebook profile.',
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
                        'instructions' => 'The link to your Twitter profile.',
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
                        'key' => 'ield_5783ae4261315',
                        'label' => 'Twitter Handle',
                        'name' => 'twitter_handle',
                        'type' => 'text',
                        'instructions' => 'Your Twitter handle E.G. @govuk',
                        'required' => '',
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '@govuk',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_5783ae3160426',
                        'label' => 'YouTube',
                        'name' => 'youtube_id',
                        'type' => 'url',
                        'instructions' => 'The link to your YouTube profile.',
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
                        'instructions' => 'The link to your Linkedin profile.',
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
                    array(
                        'key' => 'field_5783ae3160476',
                        'label' => 'Instagram ID',
                        'name' => 'instagram_id',
                        'type' => 'url',
                        'instructions' => 'The link to your Instagram profile.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => 'https://www.instagram.com/example',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options-sitewide-appearance',
                        ),
                    ),
                ),
                'menu_order' => 3,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
                ],
            ],
            'times' => 1,
        ]);

        $options->register();
    }
}
