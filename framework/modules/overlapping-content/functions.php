<?php

if(!function_exists('goodwish_edge_overlapping_content_enabled')) {
    /**
     * Checks if overlapping content is enabled
     *
     * @return bool
     */
    function goodwish_edge_overlapping_content_enabled() {
        $id = goodwish_edge_get_page_id();

        return get_post_meta($id, 'edgtf_overlapping_content_enable_meta', true) === 'yes';
    }
}

if(!function_exists('goodwish_edge_overlapping_content_class')) {
    /**
     * Adds overlapping content class to body tag
     * if overlapping content is enabled
     * @param $classes
     *
     * @return array
     */
    function goodwish_edge_overlapping_content_class($classes) {
        if(goodwish_edge_overlapping_content_enabled()) {
            $classes[] = 'edgtf-overlapping-content-enabled';
        }

        return $classes;
    }

    add_filter('body_class', 'goodwish_edge_overlapping_content_class');
}

if(!function_exists('goodwish_edge_overlapping_content_amount')) {
    /**
     * Returns amount of overlapping content
     *
     * @return int
     */
    function goodwish_edge_overlapping_content_amount() {
        return 75;
    }
}

if(!function_exists('goodwish_edge_oc_content_top_padding')) {
    function goodwish_edge_oc_content_top_padding($style) {
	    $id = goodwish_edge_get_page_id();

	    $class_prefix = goodwish_edge_get_unique_page_class();

	    $content_selector = array(
		    $class_prefix.' .edgtf-content .edgtf-content-inner > .edgtf-container .edgtf-overlapping-content'
	    );

	    $content_class = array();

	    $page_padding_top = get_post_meta($id, 'edgtf_page_content_top_padding', true);
		$page_padding_right = get_post_meta($id, "edgtf_page_content_right_padding", true);
		$page_padding_bottom = get_post_meta($id, "edgtf_page_content_bottom_padding", true);
		$page_padding_left = get_post_meta($id, "edgtf_page_content_left_padding", true);

	    if($page_padding_top !== '') {
		    if(get_post_meta($id, 'edgtf_page_content_top_padding_mobile', true) == 'yes') {
			    $content_class['padding-top'] = goodwish_edge_filter_px($page_padding_top).'px!important';
		    } else {
			    $content_class['padding-top'] = goodwish_edge_filter_px($page_padding_top).'px';
		    }

	    }

		if($page_padding_bottom !== '') {
			$content_class['padding-bottom'] = goodwish_edge_filter_px($page_padding_bottom).'px';
		}
		if($page_padding_left !== '') {
			$content_class['padding-left'] = goodwish_edge_filter_px($page_padding_left).'px';
		}
		if($page_padding_right !== '') {
			$content_class['padding-right'] = goodwish_edge_filter_px($page_padding_right).'px';
		}

		if(!empty ($content_class)) {
			$current_style =  goodwish_edge_dynamic_css($content_selector, $content_class);
			$style[] = $current_style;
		}

	    return $style;
    }

	add_filter('goodwish_edge_add_page_custom_style', 'goodwish_edge_oc_content_top_padding');
}