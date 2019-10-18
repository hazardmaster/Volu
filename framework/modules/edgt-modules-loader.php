<?php

if(!function_exists('goodwish_edge_load_modules')) {
    /**
     * Loades all modules by going through all folders that are placed directly in modules folder
     * and loads load.php file in each. Hooks to goodwish_edge_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function goodwish_edge_load_modules() {
        foreach(glob(EDGE_FRAMEWORK_ROOT_DIR.'/modules/*/load.php') as $module_load) {
            include_once $module_load;
        }
    }

    add_action('goodwish_edge_before_options_map', 'goodwish_edge_load_modules');
}

if(!function_exists('goodwish_edge_load_shortcode_interface')) {

    function goodwish_edge_load_shortcode_interface() {

        include_once EDGE_FRAMEWORK_MODULES_ROOT_DIR.'/shortcodes/lib/shortcode-interface.php';

    }

    add_action('goodwish_edge_before_options_map', 'goodwish_edge_load_shortcode_interface');

}

if(!function_exists('goodwish_edge_load_shortcodes')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     * and loads load.php file in each. Hooks to goodwish_edge_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function goodwish_edge_load_shortcodes() {
        foreach(glob(EDGE_FRAMEWORK_ROOT_DIR.'/modules/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }

        do_action('goodwish_edge_shortcode_loader');
    }

    add_action('goodwish_edge_before_options_map', 'goodwish_edge_load_shortcodes');
}