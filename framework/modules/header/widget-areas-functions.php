<?php

if(!function_exists('goodwish_edge_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function goodwish_edge_register_top_header_areas() {
        $top_bar_layout  = goodwish_edge_options()->getOptionValue('top_bar_layout');
        $top_bar_enabled = goodwish_edge_options()->getOptionValue('top_bar');

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Left', 'goodwish'),
                'id'            => 'edgtf-top-bar-left',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));

            //register this widget area only if top bar layout is three columns
            if($top_bar_layout === 'three-columns') {
                register_sidebar(array(
                    'name'          => esc_html__('Top Bar Center', 'goodwish'),
                    'id'            => 'edgtf-top-bar-center',
                    'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                    'after_widget'  => '</div>'
                ));
            }

            register_sidebar(array(
                'name'          => esc_html__('Top Bar Right', 'goodwish'),
                'id'            => 'edgtf-top-bar-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-top-bar-widget">',
                'after_widget'  => '</div>'
            ));
    }

    add_action('widgets_init', 'goodwish_edge_register_top_header_areas');
}

if(!function_exists('goodwish_edge_header_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function goodwish_edge_header_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Header Widget Area', 'goodwish'),
                'id'            => 'edgtf-header-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-header-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear in header', 'goodwish')
            ));

            register_sidebar(array(
                'name'          => esc_html__('Right From Logo', 'goodwish'),
                'id'            => 'edgtf-right-from-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-logo-widget"><div class="edgtf-right-from-logo-widget-inner">',
                'after_widget'  => '</div></div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the logo - Standard Extended header type only', 'goodwish')
            ));
    }

    add_action('widgets_init', 'goodwish_edge_header_widget_areas');
}

if(!function_exists('goodwish_edge_header_vertical_widget_areas')) {
    /**
     * Registers widget areas for vertical header
     */
    function goodwish_edge_header_vertical_widget_areas() {
            register_sidebar(array(
                'name'          => esc_html__('Vertical Area', 'goodwish'),
                'id'            => 'edgtf-vertical-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-vertical-area-widget">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'goodwish')
            ));
    }

    add_action('widgets_init', 'goodwish_edge_header_vertical_widget_areas');
}

if(!function_exists('goodwish_edge_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function goodwish_edge_register_mobile_header_areas() {
        if(goodwish_edge_is_responsive_on() && goodwish_edge_core_installed()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'goodwish'),
                'id'            => 'edgtf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'goodwish')
            ));
        }
    }

    add_action('widgets_init', 'goodwish_edge_register_mobile_header_areas');
}

if(!function_exists('goodwish_edge_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function goodwish_edge_register_sticky_header_areas() {
        if(in_array(goodwish_edge_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Header Widget Area', 'goodwish'),
                'id'            => 'edgtf-sticky-widget-area',
                'before_widget' => '<div id="%1$s" class="widget %2$s edgtf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the sticky menu', 'goodwish')
            ));
        }
    }

    add_action('widgets_init', 'goodwish_edge_register_sticky_header_areas');
}