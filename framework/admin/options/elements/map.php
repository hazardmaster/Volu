<?php

if ( ! function_exists('goodwish_edge_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function goodwish_edge_load_elements_map() {

		goodwish_edge_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__('Elements', 'goodwish'),
				'icon' => 'fa fa-header'
			)
		);

		do_action( 'goodwish_edge_options_elements_map' );

	}

	add_action('goodwish_edge_options_map', 'goodwish_edge_load_elements_map', 11);

}