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
                'page_title' => 'Options',
                'parent_slug' => 'themes.php',
            ]],
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('acf_add_local_field_group', [
            'args' => [[
                    'key' => 'group_577e95f281e15',
                    'title' => 'Options',
                    'fields' => array(
                        array(
                            'key' => 'field_577e95fb0d7bf',
                            'label' => 'Facebook',
                            'name' => 'facebook',
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
                            'placeholder' => 'https://www.facebook.com/tom.tester.353',
                        ),
                        array(
                            'key' => 'field_577e965e0d7c0',
                            'label' => 'Twitter',
                            'name' => 'twitter',
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
                            'placeholder' => 'https://twitter.com/dxw',
                        ),
                        array(
                            'key' => 'field_577e96690d7c1',
                            'label' => 'YouTube',
                            'name' => 'youtube',
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
                            'placeholder' => 'https://www.youtube.com/channel/UC0F1JXZwfq_m9OJYVna5tMg',
                        ),
                        array(
                            'key' => 'field_577e96bdc5879',
                            'label' => 'Logo',
                            'name' => 'logo',
                            'type' => 'image',
                            'instructions' => '',
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
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_577e96cec587a',
                            'label' => 'Google Analytics ID',
                            'name' => 'google_analytics_id',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => 'UA-000000-01',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'readonly' => 0,
                            'disabled' => 0,
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
                ],
            ],
            'times' => 1,
        ]);

        $options->register();
    }
}
