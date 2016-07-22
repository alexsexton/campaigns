<?php

// These are here to copy and paste if needed to extend other fields


// Customise Background
array(
    'key' => 'field_577a39f69d296',
    'label' => 'Customise Background',
    'name' => 'customise_background',
    'type' => 'checkbox',
    'instructions' => '',
    'required' => '',
    'conditional_logic' => '',
    'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'choices' => array(
        'yes' => 'Yes',
    ),
    'default_value' => array(
    ),
    'layout' => 'vertical',
    'toggle' => 0,
),


array (
    'key' => 'field_577a3a079d297',
    'label' => 'Background Image',
    'name' => 'background_image',
    'type' => 'image',
    'instructions' => '',
    'required' => '',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_577a39f69d296',
                'operator' => '==',
                'value' => 'yes',
            ),
        ),
    ),
    'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
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
    'mime_types' => '',
),
array(
    'key' => 'field_577a3a379d298',
    'label' => 'Background Colour',
    'name' => 'background_colour',
    'type' => 'color_picker',
    'instructions' => '',
    'required' => '',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_577a39f69d296',
                'operator' => '==',
                'value' => 'yes',
            ),
        ),
    ),
    'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'default_value' => '',
),

// Text Alignment
array (
    'key' => 'field_578df240409b6',
    'label' => 'Text Align',
    'name' => 'text_align',
    'type' => 'select',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_577a39f69d296',
                'operator' => '==',
                'value' => 'yes',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'choices' => array (
        'left' => 'Left',
        'centered' => 'Centered',
        'right' => 'Right',
    ),
    'default_value' => array (
        0 => 'left',
    ),
    'allow_null' => 0,
    'multiple' => 0,
    'ui' => 0,
    'ajax' => 0,
    'placeholder' => '',
    'disabled' => 0,
    'readonly' => 0,
),

// Text Colour

array (
    'key' => 'field_578df2a9409b7',
    'label' => 'Text Colour',
    'name' => 'text_colour',
    'type' => 'color_picker',
    'instructions' => '',
    'required' => '',
    'conditional_logic' => array(
        array(
            array(
                'field' => 'field_577a39f69d296',
                'operator' => '==',
                'value' => 'yes',
            ),
        ),
    ),
    'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'default_value' => '',
),


// GA Event tracking
array(
    'key' => 'field_577503aab2790',
    'label' => 'GA Event tracking',
    'name' => 'ga_event_tracking',
    'type' => 'checkbox',
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
    ),
    'choices' => array(
        'event_tracking' => 'Add Event Tracking',
    ),
    'default_value' => array(
    ),
    'layout' => 'vertical',
    'toggle' => 0,
),

    array(
        'key' => 'field_577504d141a44',
        'label' => 'Event Category',
        'name' => 'event_category',
        'type' => 'text',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'field_577503aab2790',
                    'operator' => '==',
                    'value' => 'event_tracking',
                ),
            ),
        ),
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
    ),
    array(
        'key' => 'field_5775055c65eb5',
        'label' => 'Event Action',
        'name' => 'event_action',
        'type' => 'text',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'field_577503aab2790',
                    'operator' => '==',
                    'value' => 'event_tracking',
                ),
            ),
        ),
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
    ),
    array(
        'key' => 'field_5775057265eb6',
        'label' => 'Event Label',
        'name' => 'event_label',
        'type' => 'text',
        'instructions' => '',
        'required' => '',
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'field_577503aab2790',
                    'operator' => '==',
                    'value' => 'event_tracking',
                ),
            ),
        ),
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
    ),
