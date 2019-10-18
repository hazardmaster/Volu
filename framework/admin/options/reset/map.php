<?php

if ( ! function_exists('goodwish_edge_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function goodwish_edge_reset_options_map() {

		goodwish_edge_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'goodwish'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = goodwish_edge_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'goodwish')
			)
		);

		goodwish_edge_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'goodwish'),
			'description'	=> esc_html__('This option will reset all Edge Options values to defaults', 'goodwish'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_reset_options_map', 21 );

}