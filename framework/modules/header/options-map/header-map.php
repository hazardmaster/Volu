<?php

if ( ! function_exists('goodwish_edge_header_options_map') ) {

	function goodwish_edge_header_options_map() {

		goodwish_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header','goodwish'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = goodwish_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type','goodwish'),
				'description' => esc_html__('Select the type of header you would like to use','goodwish'),
				'options' => array(
					'header-standard' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-standard.png'
					),
					'header-standard-extended' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-standard-extended.png',
					),
                    'header-vertical' => array(
	                    'image' => EDGE_ROOT . '/framework/admin/assets/img/header-vertical.png'
                    ),
					'header-full-screen' => array(
						'image' => EDGE_ROOT . '/framework/admin/assets/img/header-fullscreen.png'
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-standard-extended' => '#edgtf_panel_header_standard_extended,#edgtf_header_behaviour,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
                        'header-vertical' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu',
                        'header-full-screen' => '#edgtf_panel_header_full_screen,#edgtf_panel_header_full_screen_menu',
					),
					'hide' => array(
						'header-standard' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_full_screen,#edgtf_panel_header_full_screen_menu,#edgtf_panel_header_standard_extended',
						'header-standard-extended' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_standard,#edgtf_panel_header_full_screen,#edgtf_panel_header_full_screen_menu,#edgtf_panel_fixed_header',
                        'header-vertical' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_full_screen,#edgtf_panel_header_full_screen_menu,#edgtf_panel_header_standard_extended',
                        'header-full-screen' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_standard_extended',
					)
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__('Choose Header behaviour','goodwish'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page','goodwish'),
				'options' => array(
					'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up','goodwish'),
					'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down','goodwish'),
					'fixed-on-scroll' => esc_html__('Fixed on scroll','goodwish'),
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical', 'header-full-screen'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header',
					)
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Top Bar','goodwish'),
				'description'   => esc_html__('Enabling this option will show top bar area','goodwish'),
				'parent'        => $panel_header,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_container"
				)
			)
		);

		$top_bar_container = goodwish_edge_add_admin_container(array(
			'name'            => 'top_bar_container',
			'parent'          => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value'    => 'no'
		));

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $top_bar_container,
				'type'          => 'select',
				'name'          => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label'         => esc_html__('Choose top bar layout','goodwish'),
				'description'   => esc_html__('Select the layout for top bar','goodwish'),
				'options'       => array(
					'two-columns'   => esc_html__('Two columns','goodwish'),
					'three-columns' => esc_html__('Three columns','goodwish'),
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'two-columns'   => '#edgtf_top_bar_layout_container',
						'three-columns' => '#edgtf_top_bar_two_columns_layout_container'
					),
					'show'       => array(
						'two-columns'   => '#edgtf_top_bar_two_columns_layout_container',
						'three-columns' => '#edgtf_top_bar_layout_container'
					)
				)
			)
		);

		$top_bar_layout_container = goodwish_edge_add_admin_container(array(
			'name'            => 'top_bar_layout_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value'    => '',
			'hidden_values'   => array('two-columns'),
		));

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $top_bar_layout_container,
				'type'          => 'select',
				'name'          => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label'         => esc_html__('Choose column widths','goodwish'),
				'description'   => '',
				'options'       => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		$top_bar_two_columns_layout = goodwish_edge_add_admin_container(array(
			'name'            => 'top_bar_two_columns_layout_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value'    => '',
			'hidden_values'   => array('three-columns'),
		));

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $top_bar_two_columns_layout,
				'type'          => 'select',
				'name'          => 'top_bar_two_column_widths',
				'default_value' => '50-50',
				'label'         => esc_html__('Choose column widths','goodwish'),
				'description'   => '',
				'options'       => array(
					'50-50' => '50% - 50%',
					'33-66' => '33% - 66%',
					'66-33' => '66% - 33%'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__('Top Bar in grid','goodwish'),
				'description'   => esc_html__('Set top bar content to be in grid','goodwish'),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = goodwish_edge_add_admin_container(array(
			'name'            => 'top_bar_in_grid_container',
			'parent'          => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value'    => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'top_bar_grid_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Grid Background Color','goodwish'),
			'description' => esc_html__('Set grid background color for top bar','goodwish'),
			'parent'      => $top_bar_in_grid_container
		));


		goodwish_edge_add_admin_field(array(
			'name'        => 'top_bar_grid_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Grid Background Transparency','goodwish'),
			'description' => esc_html__('Set grid background transparency for top bar','goodwish'),
			'parent'      => $top_bar_in_grid_container,
			'args'        => array('col_width' => 3)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'top_bar_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Background Color','goodwish'),
			'description' => esc_html__('Set background color for top bar','goodwish'),
			'parent'      => $top_bar_container
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'top_bar_background_transparency',
			'type'        => 'text',
			'label'       => esc_html__('Background Transparency','goodwish'),
			'description' => esc_html__('Set background transparency for top bar','goodwish'),
			'parent'      => $top_bar_container,
			'args'        => array('col_width' => 3)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'top_bar_height',
			'type'        => 'text',
			'label'       => esc_html__('Top bar height','goodwish'),
			'description' => esc_html__('Enter top bar height (Default is 40px)','goodwish'),
			'parent'      => $top_bar_container,
			'args'        => array(
				'col_width' => 2,
				'suffix'    => 'px'
			)
		));

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin','goodwish'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style','goodwish'),
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light','goodwish'),
					'dark-header' => esc_html__('Dark','goodwish'),
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__('Enable Header Style on Scroll','goodwish'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style','goodwish'),
			)
		);

		$panel_header_standard = goodwish_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard','goodwish'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-full-screen',
                    'header-vertical',
                    'header-standard-extended'
				)
			)
		);

		goodwish_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid','goodwish'),
				'description' => esc_html__('Set header content to be in grid','goodwish'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = goodwish_edge_add_admin_container(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value' => 'no'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid Background color','goodwish'),
				'description' => esc_html__('Set grid background color for header area','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid background transparency','goodwish'),
				'description' => esc_html__('Set grid background transparency for header','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background color','goodwish'),
				'description' => esc_html__('Set background color for header','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background transparency','goodwish'),
				'description' => esc_html__('Set background transparency for header','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height','goodwish'),
				'description' => esc_html__('Enter header height (default is 70px)','goodwish'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'always_put_content_below_header',
				'default_value' => 'no',
				'label' => esc_html__('Always put content below header','goodwish'),
			)
		);

		/***************** Standard Extended Header Layout - start ****************/

		$panel_header_standard_extended = goodwish_edge_add_admin_panel(
			array(
				'page'            => '_header_page',
				'name'            => 'panel_header_standard_extended',
				'title'           => esc_html__('Header Standard Extended', 'goodwish'),
				'hidden_property' => 'header_type',
				'hidden_value'    => '',
				'hidden_values'   => array(
					'header-vertical',
					'header-standard',
					'header-full-screen'
				)
			)
		);

		goodwish_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard_extended,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__('Logo Area', 'goodwish')
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_header_standard_extended',
				'default_value' => 'yes',
				'label'         => esc_html__('Logo Area In Grid', 'goodwish'),
				'description'   => esc_html__('Set menu area content to be in grid', 'goodwish'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_logo_area_in_grid_header_standard_extended_container'
				)
			)
		);

		$logo_area_in_grid_header_standard_extended_container = goodwish_edge_add_admin_container(
			array(
				'parent'          => $panel_header_standard_extended,
				'name'            => 'logo_area_in_grid_header_standard_extended_container',
				'hidden_property' => 'logo_area_in_grid_header_standard_extended',
				'hidden_value'    => 'no'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_header_standard_extended_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Color', 'goodwish'),
				'description'   => esc_html__('Set grid background color for logo area', 'goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_header_standard_extended_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Transparency', 'goodwish'),
				'description'   => esc_html__('Set grid background transparency', 'goodwish'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_header_standard_extended_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border_header_standard_extended',
				'default_value' => 'no',
				'label'         => esc_html__('Grid Area Border', 'goodwish'),
				'description'   => esc_html__('Set border on grid area', 'goodwish'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_logo_area_in_grid_border_header_standard_extended_container'
				)
			)
		);

		$logo_area_in_grid_border_header_standard_extended_container = goodwish_edge_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_header_standard_extended_container,
				'name'            => 'logo_area_in_grid_border_header_standard_extended_container',
				'hidden_property' => 'logo_area_in_grid_border_header_standard_extended',
				'hidden_value'    => 'no'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_border_header_standard_extended_container,
				'type'          => 'color',
				'name'          => 'logo_area_in_grid_border_color_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'goodwish'),
				'description'   => esc_html__('Set border color for grid area', 'goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'color',
				'name'          => 'logo_area_background_color_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Background color', 'goodwish'),
				'description'   => esc_html__('Set background color for logo area', 'goodwish')
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Background transparency', 'goodwish'),
				'description'   => esc_html__('Set background transparency for logo area', 'goodwish'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'yesno',
				'name'          => 'logo_area_border_header_standard_extended',
				'default_value' => 'yes',
				'label'         => esc_html__('Logo Area Border', 'goodwish'),
				'description'   => esc_html__('Set border on logo area', 'goodwish'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_logo_area_border_header_standard_extended_container'
				)
			)
		);

		$logo_area_border_header_standard_extended_container = goodwish_edge_add_admin_container(
			array(
				'parent'          => $panel_header_standard_extended,
				'name'            => 'logo_area_border_header_standard_extended_container',
				'hidden_property' => 'logo_area_border_header_standard_extended',
				'hidden_value'    => 'no'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $logo_area_border_header_standard_extended_container,
				'type'          => 'color',
				'name'          => 'logo_area_border_color_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Border Color', 'goodwish'),
				'description'   => esc_html__('Set border color for logo area', 'goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'text',
				'name'          => 'logo_area_height_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Height', 'goodwish'),
				'description'   => esc_html__('Enter logo area height (default is 90px)', 'goodwish'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);


		goodwish_edge_add_admin_section_title(
			array(
				'parent' => $panel_header_standard_extended,
				'name'   => 'main_menu_area_title',
				'title'  => esc_html__('Menu Area', 'goodwish')
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_header_standard_extended',
				'default_value' => 'yes',
				'label'         => esc_html__('Menu Area In Grid', 'goodwish'),
				'description'   => esc_html__('Set menu area content to be in grid', 'goodwish'),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_menu_area_in_grid_header_standard_extended_container'
				)
			)
		);

		$menu_area_in_grid_header_standard_extended_container = goodwish_edge_add_admin_container(
			array(
				'parent'          => $panel_header_standard_extended,
				'name'            => 'menu_area_in_grid_header_standard_extended_container',
				'hidden_property' => 'menu_area_in_grid_header_standard_extended',
				'hidden_value'    => 'no'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_extended_container,
				'type'          => 'color',
				'name'          => 'menu_area_grid_background_color_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Color', 'goodwish'),
				'description'   => esc_html__('Set grid background color for menu area', 'goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_extended_container,
				'type'          => 'text',
				'name'          => 'menu_area_grid_background_transparency_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Grid Background Transparency', 'goodwish'),
				'description'   => esc_html__('Set grid background transparency', 'goodwish'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $menu_area_in_grid_header_standard_extended_container,
				'type'          => 'yesno',
				'name'          => 'menu_area_in_grid_shadow_header_standard_extended',
				'default_value' => 'no',
				'label'         => esc_html__('Grid Area Shadow', 'goodwish'),
				'description'   => esc_html__('Set shadow on grid area', 'goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'color',
				'name'          => 'menu_area_background_color_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Background color', 'goodwish'),
				'description'   => esc_html__('Set background color for menu area', 'goodwish')
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'text',
				'name'          => 'menu_area_background_transparency_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Background transparency', 'goodwish'),
				'description'   => esc_html__('Set background transparency for menu area', 'goodwish'),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'yesno',
				'name'          => 'menu_area_shadow_header_standard_extended',
				'default_value' => 'yes',
				'label'         => esc_html__('Menu Area Shadow', 'goodwish'),
				'description'   => esc_html__('Set shadow on menu area', 'goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent'        => $panel_header_standard_extended,
				'type'          => 'text',
				'name'          => 'menu_area_height_header_standard_extended',
				'default_value' => '',
				'label'         => esc_html__('Height', 'goodwish'),
				'description'   => esc_html__('Enter menu area height (default is 7070px)', 'goodwish'),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		/***************** Standard Extended Header Layout - end ****************/

        $panel_header_vertical = goodwish_edge_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical','goodwish'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-full-screen',
                    'header-standard',
                    'header-standard-extended'
                )
            )
        );

            goodwish_edge_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color','goodwish'),
                'description' => esc_html__('Set background color for vertical menu','goodwish'),
                'parent' => $panel_header_vertical
            ));

            goodwish_edge_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__('Transparency','goodwish'),
                'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)','goodwish'),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            goodwish_edge_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__('Background Image','goodwish'),
                    'description' => esc_html__('Set background image for vertical menu','goodwish'),
                    'parent' => $panel_header_vertical
                )
            );

		$panel_header_full_screen = goodwish_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen','goodwish'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-standard-extended'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_full_screen',
				'default_value' => 'yes',
				'label' => esc_html__('Header in grid','goodwish'),
				'description' => esc_html__('Set header content to be in grid','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background color','goodwish'),
				'description' => esc_html__('Set background color for header','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Background transparency','goodwish'),
				'description' => esc_html__('Set background transparency for header','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height','goodwish'),
				'description' => esc_html__('Enter header height (default is 70px)','goodwish'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_full_screen_menu = goodwish_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen_menu',
				'title' => esc_html__('Full Screen Menu','goodwish'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-standard-extended'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen_menu,
				'type' => 'select',
				'name' => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label' => esc_html__('Fullscreen Menu Overlay Animation','goodwish'),
				'description' => esc_html__('Choose animation type for fullscreen menu overlay','goodwish'),
				'options' => array(
					'fade-push-text-right' => esc_html__('Fade Push Text Right','goodwish'),
					'fade-push-text-top' => esc_html__('Fade Push Text Top','goodwish'),
					'fade-text-scaledown' => esc_html__('Fade Text Scaledown','goodwish'),
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen_menu,
				'type' => 'yesno',
				'name' => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Fullscreen Menu in Grid','goodwish'),
				'description' => esc_html__('Enabling this option will put fullscreen menu content in grid','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen_menu,
				'type' => 'selectblank',
				'name' => 'fullscreen_alignment',
				'default_value' => '',
				'label' => esc_html__('Fullscreen Menu Alignment','goodwish'),
				'description' => esc_html__('Choose alignment for fullscreen menu content','goodwish'),
				'options' => array(
					"left" => esc_html__("Left",'goodwish'),
					"center" => esc_html__("Center",'goodwish'),
					"right" => esc_html__("Right",'goodwish'),
				)
			)
		);

		$background_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_header_full_screen_menu,
				'name' => 'background_group',
				'title' => esc_html__('Background','goodwish'),
				'description' => esc_html__('Select a background color and transparency for Fullscreen Menu (0 = fully transparent, 1 = opaque)','goodwish'),

			)
		);

		$background_group_row = goodwish_edge_add_admin_row(
			array(
				'parent' => $background_group,
				'name' => 'background_group_row'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency (values:0-1)','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen_menu,
				'type' => 'image',
				'name' => 'fullscreen_menu_background_image',
				'default_value' => '',
				'label' => esc_html__('Background Image','goodwish'),
				'description' => esc_html__('Choose a background image for Fullscreen Menu background','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen_menu,
				'type' => 'image',
				'name' => 'fullscreen_menu_pattern_image',
				'default_value' => '',
				'label' => esc_html__('Pattern Background Image','goodwish'),
				'description' => esc_html__('Choose a pattern image for Fullscreen Menu background','goodwish'),
			)
		);

//1st level style group
		$first_level_style_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_header_full_screen_menu,
				'name' => 'first_level_style_group',
				'title' => esc_html__('1st Level Style','goodwish'),
				'description' => esc_html__('Define styles for 1st level in Fullscreen Menu','goodwish'),
			)
		);

		$first_level_style_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Color','goodwish'),
			)
		);

		$first_level_style_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row2'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Active Color','goodwish'),
			)
		);

		$first_level_style_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row3'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_style_row4 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row4'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);

//2nd level style group
		$second_level_style_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_header_full_screen_menu,
				'name' => 'second_level_style_group',
				'title' => esc_html__('2nd Level Style','goodwish'),
				'description' => esc_html__('Define styles for 2nd level in Fullscreen Menu','goodwish'),
			)
		);

		$second_level_style_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color','goodwish'),
			)
		);

		$second_level_style_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_2nd',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_style_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_2nd',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);

		$third_level_style_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_header_full_screen_menu,
				'name' => 'third_level_style_group',
				'title' => esc_html__('3rd Level Style','goodwish'),
				'description' => esc_html__('Define styles for 3rd level in Fullscreen Menu','goodwish'),
			)
		);

		$third_level_style_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'third_level_style_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color','goodwish'),
			)
		);

		$third_level_style_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_3rd',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_style_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_3rd',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_header_full_screen_menu,
				'type' => 'select',
				'name' => 'fullscreen_menu_icon_size',
				'label' => esc_html__('Fullscreen Menu Icon Size','goodwish'),
				'description' => esc_html__('Choose predefined size for Fullscreen Menu icon','goodwish'),
				'default_value' => 'normal',
				'options' => array(
					'normal' => esc_html__('Normal','goodwish'),
					'medium' => esc_html__('Medium','goodwish'),
					'large' => esc_html__('Large','goodwish'),
				)

			)
		);

		$icon_colors_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_header_full_screen_menu,
				'name' => 'fullscreen_menu_icon_colors_group',
				'title' => esc_html__('Full Screen Menu Icon Style','goodwish'),
				'description' => esc_html__('Define styles for Fullscreen Menu Icon','goodwish'),
			)
		);

		$icon_colors_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_color',
				'label' => esc_html__('Color','goodwish'),
			)
		);
		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_hover_color',
				'label' => esc_html__('Hover Color','goodwish'),
			)
		);
		$icon_colors_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row2',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_color',
				'label' => esc_html__('Light Menu Icon Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_hover_color',
				'label' => esc_html__('Light Menu Icon Hover Color','goodwish'),
			)
		);

		$icon_colors_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row3',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_color',
				'label' => esc_html__('Dark Menu Icon Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_hover_color',
				'label' => esc_html__('Dark Menu Icon Hover Color','goodwish'),
			)
		);

		$icon_colors_row4 = goodwish_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row4',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_color',
				'label' => esc_html__('Background Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_hover_color',
				'label' => esc_html__('Background Hover Color','goodwish'),
			)
		);

		$icon_spacing_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_header_full_screen_menu,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Full Screen Menu Icon Spacing','goodwish'),
				'description' => esc_html__('Define padding and margin for full screen menu icon','goodwish'),
			)
		);

		$icon_spacing_row = goodwish_edge_add_admin_row(
			array(
				'parent' => $icon_spacing_group,
				'name' => 'icon_spacing_row'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__('Padding Left','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__('Padding Right','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__('Margin Left','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_sticky_header = goodwish_edge_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header','goodwish'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky','goodwish'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)','goodwish'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Sticky Header in grid','goodwish'),
				'description' => esc_html__('Set sticky header content to be in grid','goodwish'),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = goodwish_edge_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color','goodwish'),
			'description' => esc_html__('Set grid background color for sticky header','goodwish'),
			'parent' => $sticky_header_in_grid_container
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Grid Transparency','goodwish'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)','goodwish'),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color','goodwish'),
			'description' => esc_html__('Set background color for sticky header','goodwish'),
			'parent' => $panel_sticky_header
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Transparency','goodwish'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)','goodwish'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height','goodwish'),
			'description' => esc_html__('Enter height for sticky header (default is 70px)','goodwish'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = goodwish_edge_add_admin_group(array(
			'title' => esc_html__('Sticky Header Menu','goodwish'),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items','goodwish'),
		));

		$row1_sticky_header_menu = goodwish_edge_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color','goodwish'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__('Hover/Active color','goodwish'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = goodwish_edge_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		goodwish_edge_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family','goodwish'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__('Font Size','goodwish'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__('Line height','goodwish'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__('Text transform','goodwish'),
				'default_value' => '',
				'options' => goodwish_edge_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = goodwish_edge_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		goodwish_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style','goodwish'),
				'options' => goodwish_edge_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__('Letter Spacing','goodwish'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = goodwish_edge_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header','goodwish'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		goodwish_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Grid Background Color','goodwish'),
			'description' => esc_html__('Set grid background color for fixed header','goodwish'),
			'parent' => $panel_fixed_header
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__('Header Transparency Grid','goodwish'),
			'description' => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)','goodwish'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color','goodwish'),
			'description' => esc_html__('Set background color for fixed header','goodwish'),
			'parent' => $panel_fixed_header
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Header Transparency','goodwish'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)','goodwish'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = goodwish_edge_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu','goodwish'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-vertical',
					'header-full-screen'
				)
			)
		);

		goodwish_edge_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings','goodwish'),
			)
		);


		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_icon_position',
				'default_value' => 'left',
				'label' => esc_html__('Icon Position in 1st Level Menu','goodwish'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure','goodwish'),
				'options' => array(
					'left' => esc_html__('Left','goodwish'),
					'top' => esc_html__('Top','goodwish'),
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'left' => '#edgtf_menu_item_icon_position_container'
					),
					'show' => array(
						'top' => '#edgtf_menu_item_icon_position_container'
					)
				)
			)
		);

		$menu_item_icon_position_container = goodwish_edge_add_admin_container(
			array(
				'parent' => $panel_main_menu,
				'name' => 'menu_item_icon_position_container',
				'hidden_property' => 'menu_item_icon_position',
				'hidden_value' => 'left'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $menu_item_icon_position_container,
				'type' => 'text',
				'name' => 'menu_item_icon_size',
				'default_value' => '',
				'label' => esc_html__('Icon Size','goodwish'),
				'description' => esc_html__('Choose position of icon selected in Appearance->Menu->Menu Structure','goodwish'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_item_style',
				'default_value' => 'small_item',
				'label' => esc_html__('Item Height in 1st Level Menu','goodwish'),
				'description' => esc_html__('Choose menu item height','goodwish'),
				'options' => array(
					'small_item' => esc_html__('Small','goodwish'),
					'large_item' => esc_html__('Big','goodwish'),
				)
			)
		);

		$drop_down_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_group',
				'title' => esc_html__('Main Dropdown Menu','goodwish'),
				'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)','goodwish'),
			)
		);

		$drop_down_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name' => 'drop_down_row1',
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'textsimple',
				'name' => 'dropdown_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_separator_color',
				'default_value' => '',
				'label' => esc_html__('Item Bottom Separator Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $drop_down_row1,
				'type' => 'yesnosimple',
				'name' => 'enable_dropdown_separator_full_width',
				'default_value' => 'no',
				'label' => esc_html__('Item Separator Full Width','goodwish'),
			)
		);

		$drop_down_padding_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'drop_down_padding_group',
				'title' => esc_html__('Main Dropdown Menu Padding','goodwish'),
				'description' => esc_html__('Choose a top/bottom padding for dropdown menu','goodwish'),
			)
		);

		$drop_down_padding_row = goodwish_edge_add_admin_row(
			array(
				'parent' => $drop_down_padding_group,
				'name' => 'drop_down_padding_row',
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_top_padding',
				'default_value' => '',
				'label' => esc_html__('Top Padding','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $drop_down_padding_row,
				'type' => 'textsimple',
				'name' => 'dropdown_bottom_padding',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => esc_html__('Main Dropdown Menu Appearance','goodwish'),
				'description' => esc_html__('Choose appearance for dropdown menu','goodwish'),
				'options' => array(
					'dropdown-default' => esc_html__('Default','goodwish'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom','goodwish'),
					'dropdown-slide-from-top' => esc_html__('Slide From Top','goodwish'),
					'dropdown-animate-height' => esc_html__('Animate Height','goodwish'),
					'dropdown-slide-from-left' => esc_html__('Slide From Left','goodwish'),
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'text',
				'name' => 'dropdown_top_position',
				'default_value' => '',
				'label' => esc_html__('Dropdown position','goodwish'),
				'description' => esc_html__('Enter value in percentage of entire header height','goodwish'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'yesno',
				'name' => 'enable_wide_manu_background',
				'default_value' => 'no',
				'label' => esc_html__('Enable Full Width Background for Wide Dropdown Type','goodwish'),
				'description' => esc_html__('Enabling this option will show full width background  for wide dropdown type','goodwish'),
			)
		);

		$first_level_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'first_level_group',
				'title' => esc_html__('1st Level Menu','goodwish'),
				'description' => esc_html__('Define styles for 1st level in Top Navigation Menu','goodwish'),
			)
		);

		$first_level_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => 'menu_activecolor',
				'default_value' => '',
				'label' => esc_html__('Active Text Color','goodwish'),
			)
		);

		$first_level_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_text_background_color',
				'default_value' => '',
				'label' => esc_html__('Text Background Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Background Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'colorsimple',
				'name' => 'menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Background Color','goodwish'),
			)
		);

		$first_level_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row3',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Hover Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_activecolor',
				'default_value' => '',
				'label' => esc_html__('Light Menu Active Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row3,
				'type' => 'colorsimple',
				'name' => 'menu_light_border_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Border Hover/Active Color','goodwish'),
			)
		);

		$first_level_row4 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row4',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Hover Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_activecolor',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Active Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row4,
				'type' => 'colorsimple',
				'name' => 'menu_dark_border_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Border Hover/Active Color','goodwish'),
			)
		);

		$first_level_row5 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row5',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'fontsimple',
				'name' => 'menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_hover_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Hover Background Color Transparency','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row5,
				'type' => 'textsimple',
				'name' => 'menu_active_background_color_transparency',
				'default_value' => '',
				'label' => esc_html__('Active Background Color Transparency','goodwish'),
			)
		);

		$first_level_row6 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row6',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'textsimple',
				'name' => 'menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row6,
				'type' => 'selectblanksimple',
				'name' => 'menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);

		$first_level_row7 = goodwish_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row7',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_padding_left_right',
				'default_value' => '',
				'label' => esc_html__('Padding Left/Right','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $first_level_row7,
				'type' => 'textsimple',
				'name' => 'menu_margin_left_right',
				'default_value' => '',
				'label' => esc_html__('Margin Left/Right','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_group',
				'title' => esc_html__('2nd Level Menu','goodwish'),
				'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu','goodwish'),
			)
		);

		$second_level_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','goodwish'),
			)
		);

		$second_level_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row3',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);

		$second_level_wide_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'second_level_wide_group',
				'title' => esc_html__('2nd Level Wide Menu','goodwish'),
				'description' => esc_html__('Define styles for 2nd level in Wide Menu','goodwish'),
			)
		);

		$second_level_wide_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','goodwish'),
			)
		);

		$second_level_wide_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row2',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_padding_top_bottom',
				'default_value' => '',
				'label' => esc_html__('Padding Top/Bottom','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_wide_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name' => 'second_level_wide_row3',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $second_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);

		$third_level_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_group',
				'title' => esc_html__('3nd Level Menu','goodwish'),
				'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu','goodwish'),
			)
		);

		$third_level_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','goodwish'),
			)
		);

		$third_level_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row2',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => 'third_level_row3',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);


		/***********************************************************/
		$third_level_wide_group = goodwish_edge_add_admin_group(
			array(
				'parent' => $panel_main_menu,
				'name' => 'third_level_wide_group',
				'title' => esc_html__('3rd Level Wide Menu','goodwish'),
				'description' => esc_html__('Define styles for 3rd level in Wide Menu','goodwish'),
			)
		);

		$third_level_wide_row1 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row1'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Color','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row1,
				'type' => 'colorsimple',
				'name' => 'dropdown_wide_background_hovercolor_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Background Color','goodwish'),
			)
		);

		$third_level_wide_row2 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row2',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'fontsimple',
				'name' => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label' => esc_html__('Font Family','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_fontsize_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font Size','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row2,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_lineheight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Line Height','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_wide_row3 = goodwish_edge_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name' => 'third_level_wide_row3',
				'next' => true
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontstyle_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font style','goodwish'),
				'options' => goodwish_edge_get_font_style_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_fontweight_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Font weight','goodwish'),
				'options' => goodwish_edge_get_font_weight_array()
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'textsimple',
				'name' => 'dropdown_wide_letterspacing_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Letter spacing','goodwish'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $third_level_wide_row3,
				'type' => 'selectblanksimple',
				'name' => 'dropdown_wide_texttransform_thirdlvl',
				'default_value' => '',
				'label' => esc_html__('Text Transform','goodwish'),
				'options' => goodwish_edge_get_text_transform_array()
			)
		);

        $panel_vertical_main_menu = goodwish_edge_add_admin_panel(
            array(
                'title' => esc_html__('Vertical Main Menu','goodwish'),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
					'header-full-screen',
					'header-standard',
					'header-standard-extended')
            )
        );

        $drop_down_group = goodwish_edge_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__('Main Dropdown Menu','goodwish'),
                'description' => esc_html__('Set a style for dropdown menu','goodwish'),
            )
        );

        $vertical_drop_down_row1 = goodwish_edge_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'edgtf_drop_down_row1',
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Background Color','goodwish'),
            )
        );

        $group_vertical_first_level = goodwish_edge_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title'			=> esc_html__('1st level','goodwish'),
            'description'	=> esc_html__('Define styles for 1st level menu','goodwish'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color','goodwish'),
                'parent'		=> $row_vertical_first_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color','goodwish'),
                'parent'		=> $row_vertical_first_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform','goodwish'),
                'options'		=> goodwish_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family','goodwish'),
                'parent'		=> $row_vertical_first_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style','goodwish'),
                'options'		=> goodwish_edge_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight','goodwish'),
                'options'		=> goodwish_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = goodwish_edge_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title'			=> esc_html__('2nd level','goodwish'),
            'description'	=> esc_html__('Define styles for 2nd level menu','goodwish'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color','goodwish'),
                'parent'		=> $row_vertical_second_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color','goodwish'),
                'parent'		=> $row_vertical_second_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform','goodwish'),
                'options'		=> goodwish_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family','goodwish'),
                'parent'		=> $row_vertical_second_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style','goodwish'),
                'options'		=> goodwish_edge_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight','goodwish'),
                'options'		=> goodwish_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = goodwish_edge_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title'			=> esc_html__('3rd level','goodwish'),
            'description'	=> esc_html__('Define styles for 3rd level menu','goodwish'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color','goodwish'),
                'parent'		=> $row_vertical_third_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color','goodwish'),
                'parent'		=> $row_vertical_third_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform','goodwish'),
                'options'		=> goodwish_edge_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family','goodwish'),
                'parent'		=> $row_vertical_third_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style','goodwish'),
                'options'		=> goodwish_edge_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight','goodwish'),
                'options'		=> goodwish_edge_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = goodwish_edge_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            goodwish_edge_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing','goodwish'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));
	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_header_options_map', 4);

}