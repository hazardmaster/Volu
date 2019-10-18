<?php

if(!function_exists('goodwish_edge_footer_top_styles')) {
	/**
	 * Generates styles for footer top
	 */
	function goodwish_edge_footer_top_styles() {

		$background_image = goodwish_edge_options()->getOptionValue('footer_top_background_image');
		$footer_top_styles = array();
		if($background_image !== '') {
			$footer_top_styles['background-image'] = 'url(' .$background_image . ')';
		}

		echo goodwish_edge_dynamic_css('.edgtf-footer-top-holder', $footer_top_styles);
	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_footer_top_styles');
}