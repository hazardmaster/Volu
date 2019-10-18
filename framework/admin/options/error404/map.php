<?php

if ( ! function_exists('goodwish_edge_error_404_options_map') ) {

	function goodwish_edge_error_404_options_map() {

		goodwish_edge_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'goodwish'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = goodwish_edge_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Option', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'goodwish'),
			'description' => esc_html__('Enter title for 404 page', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'goodwish'),
			'description' => esc_html__('Enter text for 404 page', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__('Back to Home Button Label', 'goodwish'),
			'description' => esc_html__('Enter label for "Back to Home" button', 'goodwish')
		));

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_error_404_options_map', 18);

}