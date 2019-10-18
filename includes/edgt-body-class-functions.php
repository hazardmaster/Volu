<?php

if(!function_exists('goodwish_edge_boxed_class')) {
    /**
     * Function that adds classes on body for boxed layout
     */
    function goodwish_edge_boxed_class($classes) {

        //is boxed layout turned on?
        if(goodwish_edge_get_meta_field_intersect('boxed') == 'yes' && goodwish_edge_get_meta_field_intersect('header_type') !== 'header-vertical') {
            $classes[] = 'edgtf-boxed';
        }

        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_boxed_class');
}

if(!function_exists('goodwish_edge_theme_version_class')) {
    /**
     * Function that adds classes on body for version of theme
     */
    function goodwish_edge_theme_version_class($classes) {
        $current_theme = wp_get_theme();

        //is child theme activated?
        if($current_theme->parent()) {
            //add child theme version
            $classes[] = strtolower($current_theme->get('Name')).'-child-ver-'.$current_theme->get('Version');

            //get parent theme
            $current_theme = $current_theme->parent();
        }

        if($current_theme->exists() && $current_theme->get('Version') != '') {
            $classes[] = strtolower($current_theme->get('Name')).'-ver-'.$current_theme->get('Version');
        }

        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_theme_version_class');
}

if(!function_exists('goodwish_edge_smooth_scroll_class')) {
    /**
     * Function that adds classes on body for smooth scroll
     */
    function goodwish_edge_smooth_scroll_class($classes) {

        //is smooth scroll enabled enabled?
        if(goodwish_edge_options()->getOptionValue('smooth_scroll') == 'yes') {
            $classes[] = 'edgtf-smooth-scroll';
        } else {
            $classes[] = '';
        }

        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_smooth_scroll_class');
}

if(!function_exists('goodwish_edge_smooth_page_transitions_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function goodwish_edge_smooth_page_transitions_class($classes) {

        $id = goodwish_edge_get_page_id();

        if(goodwish_edge_get_meta_field_intersect('smooth_page_transitions',$id) == 'yes') {
            $classes[] = 'edgtf-smooth-page-transitions';
            //$classes[] = 'edgtf-mimic-ajax';

            if(goodwish_edge_get_meta_field_intersect('page_transition_preloader',$id) == 'yes') {
                $classes[] = 'edgtf-smooth-page-transitions-preloader';
            }

            if(goodwish_edge_get_meta_field_intersect('page_transition_fadeout',$id) == 'yes') {
                $classes[] = 'edgtf-smooth-page-transitions-fadeout';
            }

        }

        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_smooth_page_transitions_class');
}

if(!function_exists('goodwish_edge_content_initial_width_body_class')) {
    /**
     * Function that adds transparent content class to body.
     *
     * @param $classes array of body classes
     *
     * @return array with transparent content body class added
     */
    function goodwish_edge_content_initial_width_body_class($classes) {

        if(goodwish_edge_options()->getOptionValue('initial_content_width')) {
            $classes[] = 'edgtf-'.goodwish_edge_options()->getOptionValue('initial_content_width');
        }

        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_content_initial_width_body_class');
}

if(!function_exists('goodwish_edge_set_blog_body_class')) {
    /**
     * Function that adds blog class to body if blog template, shortcodes or widgets are used on site.
     *
     * @param $classes array of body classes
     *
     * @return array with blog body class added
     */
    function goodwish_edge_set_blog_body_class($classes) {

        if(goodwish_edge_load_blog_assets()) {
            $classes[] = 'edgtf-blog-installed';
        }

        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_set_blog_body_class');
}


if(!function_exists('goodwish_edge_set_portfolio_single_info_follow_body_class')) {
    /**
     * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single small images or small slider
     *
     * @param $classes array of body classes
     *
     * @return array with follow portfolio info class body class added
     */

    function goodwish_edge_set_portfolio_single_info_follow_body_class($classes) {

        if(is_singular('portfolio-item')){
            if(goodwish_edge_options()->getOptionValue('portfolio_single_sticky_sidebar') == 'yes'){
                $classes[] = 'edgtf-follow-portfolio-info';
            }
        }


        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_set_portfolio_single_info_follow_body_class');
}