<?php

register_field_group(array(
    'key' => 'group_56e9937e4dc99',
    'title' => 'Content',
    'fields' => array(
        array(
            'key' => 'field_572b3982eabf4',
            'label' => 'Content Blocks',
            'name' => 'content_blocks',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => ''
            ),
            'button_label' => 'Add Content Block',
            'min' => '',
            'max' => '',
            'layouts' => array(
                // Hero
                array(
                    'key' => '572b45ec7bc15',
                    'name' => 'hero',
                    'label' => 'Hero',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_572c45dc7bc13',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'readonly' => 0,
                            'disabled' => 0
                        ),
                        array(
                            'key' => 'field_572c6181a933b',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'basic',
                            'media_upload' => 0
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Title
                array(
                    'key' => '572b45dc7bc15',
                    'name' => 'title',
                    'label' => 'Title',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_572b45dc7bc16',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'readonly' => 0,
                            'disabled' => 0
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Subtitle
                array(
                    'key' => '572c61a9a937c',
                    'name' => 'subtitle',
                    'label' => 'Subtitle',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_572c61a9a937d',
                            'label' => 'Subtitle',
                            'name' => 'subtitle',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'readonly' => 0,
                            'disabled' => 0
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Promo Box
                array(
                    'key' => '572b15e47bc15',
                    'name' => 'promo_box',
                    'label' => 'Promo Box',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_571a45de7bc13',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'readonly' => 0,
                            'disabled' => 0
                        ),
                        array(
                            'key' => 'field_572a6181a933b',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'basic',
                            'media_upload' => 0
                        ),
                        array(
                            'key' => 'field_574460645fdf3',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'file',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'return_format' => 'array',
                            'library' => 'all',
                            'min_size' => '',
                            'max_size' => '',
                            'mime_types' => ''
                        ),
                        array(
                            'key' => 'field_5744607c5fdf4',
                            'label' => 'Background',
                            'name' => 'background',
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
                                'brand-primary' => 'Brand Primary',
                                'brand-secondary' => 'Brand Secondary',
                                'brand-tertiary' => 'Brand Tertiary',
                                'brand-quaternary' => 'Brand Quaternary',
                                'brand-quinary' => 'Brand Quinary'
                            ),
                            'default_value' => array(
                                0 => 'brand-primary'
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'ajax' => 0,
                            'placeholder' => '',
                            'disabled' => 0,
                            'readonly' => 0
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Content
                array(
                    'key' => '572c6183a937a',
                    'name' => 'content',
                    'label' => 'Content',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_572c6183a937b',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 1
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Left Align Image and Caption
                array(
                    'key' => '572b4473b1181',
                    'name' => 'left_aligned_image',
                    'label' => 'Left-Aligned Image with Caption',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_572b448cb1183',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'large',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => ''
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Right Align Image and Caption
                array(
                    'key' => '572b44d4b1185',
                    'name' => 'right_aligned_image',
                    'label' => 'Right-Aligned Image with Caption',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_572b44d4b1187',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'preview_size' => 'large',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                            'return_format' => 'array',
                            'library' => 'all'
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Full Width Image
                array(
                    'key' => '572b456ab118e',
                    'name' => 'full_width_image',
                    'label' => 'Full-width image',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_572b456fb118f',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'large',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => ''
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Info Graphic
                array(
                    'key' => '5772492fcf6e3',
                    'name' => 'info_graphic',
                    'label' => 'Info Graphic',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5772494f9de0d',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'full',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => ''
                        ),
                        array(
                            'key' => 'field_577249799de0e',
                            'label' => 'Caption',
                            'name' => 'caption',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => 'br',
                            'readonly' => 0,
                            'disabled' => 0
                        )
                    ),
                    'min' => '',
                    'max' => ''
                ),
                // Call to Action
                array(
                    'key' => '57724a89fb427',
                    'name' => 'call_to_action',
                    'label' => 'Call to Action',
                    'display' => 'row',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_57724a97fb428',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => 'wpautop',
                            'readonly' => 0,
                            'disabled' => 0
                        ),
                        array(
                            'key' => 'field_57724adb49901',
                            'label' => 'Button Text',
                            'name' => 'button_text',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => '',
                            'conditional_logic' => '',
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                            'readonly' => 0,
                            'disabled' => 0
                        ),
                        array(
                            'key' => 'field_57724a9ffb429',
                            'label' => 'Button URL',
                            'name' => 'button_url',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 1,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => ''
                            ),
                            'default_value' => '',
                            'placeholder' => ''
                        )
                    ),
                    'min' => '',
                    'max' => ''
                )
            )
        )
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-default.php'
            )
        )
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        0 => 'custom_fields',
        1 => 'discussion',
        2 => 'comments',
        3 => 'send-trackbacks'
    ),
    'active' => 1,
    'description' => ''
));


?>
