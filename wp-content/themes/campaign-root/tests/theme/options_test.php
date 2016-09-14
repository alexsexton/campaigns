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
                'title' => 'Footer Social Media Icons',
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
