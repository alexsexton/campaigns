<?php

namespace Dxw\GdsCampaignRoot\Theme;

class Menus implements \Dxw\Iguana\Registerable
{

    public function custom_wp_nav_menu($var) {
        return is_array($var) ? array_intersect($var, array(
            //List of allowed menu classes
            'current_page_item',
            'current_page_parent',
            'current_page_ancestor',
            'current-menu-item',
            'first',
            'last',
            'vertical',
            'horizontal',
            'menu-item-has-children',
            'sub-menu'
            )
        ) : '';
    }

    //Replaces "current-menu-item" with "active"
    public function current_to_active($text){
        $replace = array(
            //List of menu item classes that should be changed to "active"
            'current_page_item' => 'active',
            'current_page_parent' => 'active',
            'current_page_ancestor' => 'active',
            'current-menu-item' => 'active',
            'menu-item-has-children' => 'has-sub-nav',
            'sub-menu' => 'sub-nav',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
        return $text;
    }

    public function strip_empty_classes($menu) {
        return $menu;
    }

    public function register()
    {
        register_nav_menu('header', 'Header Menu');
        register_nav_menu('footer', 'Footer Menu');
        add_filter('nav_menu_css_class', [$this, 'custom_wp_nav_menu']);
        add_filter('nav_menu_item_id', [$this, 'custom_wp_nav_menu']);
        add_filter('page_css_class', [$this, 'custom_wp_nav_menu']);
        add_filter ('wp_nav_menu', [$this, 'current_to_active']);
        add_filter ('wp_nav_menu', [$this, 'strip_empty_classes']);
    }
}
