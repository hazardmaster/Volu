<?php

add_action('after_setup_theme', 'goodwish_edge_meta_boxes_map_init', 1);
function goodwish_edge_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('goodwish_edge_before_meta_boxes_map');

	global $goodwish_edge_options;
	global $goodwish_edge_Framework;


    foreach(glob(EDGE_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('goodwish_edge_meta_boxes_map');

	do_action('goodwish_edge_after_meta_boxes_map');
}