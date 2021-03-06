<?php

namespace Dxw\GdsCampaignRoot\Posts\CustomFieldGroups;

class Sidebar implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        register_field_group(array(
            'key' => 'group_5785074e510aa',
            'title' => 'Meta Tags',
            'fields' => array(
                array(
                    'key' => 'field_57850753b913e',
                    'label' => 'Description',
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => 'Used for SEO page description and open graph tags',
                    'required' => 0,
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
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
            'menu_order' => 1,
            'position' => 'side',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));
    }
}
