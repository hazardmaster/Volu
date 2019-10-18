<?php

if ( ! function_exists('goodwish_edge_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function goodwish_edge_parallax_options_map()
	{
		$panel_parallax = goodwish_edge_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax', 'goodwish')
			)
		);

		goodwish_edge_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> esc_html__('Parallax on touch devices', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow parallax on touch devices', 'goodwish'),
			'parent'		=> $panel_parallax
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> esc_html__('Parallax Min Height', 'goodwish'),
			'description'	=> esc_html__('Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'goodwish'),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

	add_action( 'goodwish_edge_options_elements_map', 'goodwish_edge_parallax_options_map');

}