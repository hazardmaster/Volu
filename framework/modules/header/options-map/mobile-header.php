<?php

if ( ! function_exists('goodwish_edge_mobile_header_options_map') ) {

	function goodwish_edge_mobile_header_options_map() {

		goodwish_edge_add_admin_page(array(
			'slug'  => '_mobile_header',
			'title' => esc_html__('Mobile Header','goodwish'),
			'icon'  => 'fa fa-mobile'
		));

		$panel_mobile_header = goodwish_edge_add_admin_panel(array(
			'title' => esc_html__('Mobile header','goodwish'),
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header'
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Header Height','goodwish'),
			'description' => esc_html__('Enter height for mobile header in pixels','goodwish'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Header Background Color','goodwish'),
			'description' => esc_html__('Choose color for mobile header','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Background Color','goodwish'),
			'description' => esc_html__('Choose color for mobile menu','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Item Separator Color','goodwish'),
			'description' => esc_html__('Choose color for mobile menu horizontal separators','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Header','goodwish'),
			'description' => esc_html__('Define logo height for screen size smaller than 1000px','goodwish'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Devices','goodwish'),
			'description' => esc_html__('Define logo height for screen size smaller than 480px','goodwish'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		goodwish_edge_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => esc_html__('Typography','goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Text Color','goodwish'),
			'description' => esc_html__('Define color for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Hover/Active Color','goodwish'),
			'description' => esc_html__('Define hover/active color for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'font',
			'label'       => esc_html__('Navigation Font Family','goodwish'),
			'description' => esc_html__('Define font family for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Font Size','goodwish'),
			'description' => esc_html__('Define font size for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Line Height','goodwish'),
			'description' => esc_html__('Define line height for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Text Transform','goodwish'),
			'description' => esc_html__('Define text transform for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header,
			'options'     => goodwish_edge_get_text_transform_array(true)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Style','goodwish'),
			'description' => esc_html__('Define font style for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header,
			'options'     => goodwish_edge_get_font_style_array(true)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Weight','goodwish'),
			'description' => esc_html__('Define font weight for mobile navigation text','goodwish'),
			'parent'      => $panel_mobile_header,
			'options'     => goodwish_edge_get_font_weight_array(true)
		));

		goodwish_edge_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => esc_html__('Mobile Menu Opener','goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_icon_pack',
			'type'        => 'select',
			'label'       => esc_html__('Mobile Navigation Icon Pack','goodwish'),
			'default_value' => 'font_awesome',
			'description' => esc_html__('Choose icon pack for mobile navigation icon','goodwish'),
			'parent'      => $panel_mobile_header,
			'options'     => goodwish_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons'))
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Color','goodwish'),
			'description' => esc_html__('Choose color for icon header','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Hover Color','goodwish'),
			'description' => esc_html__('Choose hover color for mobile navigation icon ','goodwish'),
			'parent'      => $panel_mobile_header
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Navigation Icon size','goodwish'),
			'description' => esc_html__('Choose size for mobile navigation icon ','goodwish'),
			'parent'      => $panel_mobile_header,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_mobile_header_options_map', 5);

}