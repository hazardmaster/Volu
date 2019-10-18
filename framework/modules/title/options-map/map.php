<?php

if ( ! function_exists('goodwish_edge_title_options_map') ) {

	function goodwish_edge_title_options_map() {

		goodwish_edge_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title','goodwish'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = goodwish_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area','goodwish'),
				'description' => esc_html__('This option will enable/disable Title Area','goodwish'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_show_title_area_container"
				)
			)
		);

		$show_title_area_container = goodwish_edge_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Title Area Type','goodwish'),
				'description' => esc_html__('Choose title type','goodwish'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__('Standard','goodwish'),
					'breadcrumb' => esc_html__('Breadcrumb','goodwish'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#edgtf_title_area_type_container"
					),
					"show" => array(
						"standard" => "#edgtf_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = goodwish_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Breadcrumbs','goodwish'),
				'description' => esc_html__('This option will display Breadcrumbs in Title Area','goodwish'),
				'parent' => $title_area_type_container,
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_enable_separator',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Separator','goodwish'),
				'description' => esc_html__('This option will display Separator in Title Area','goodwish'),
				'parent' => $show_title_area_container
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_animation',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Animations','goodwish'),
				'description' => esc_html__('Choose an animation for Title Area','goodwish'),
				'parent' => $show_title_area_container,
				'options' => array(
					'no' => esc_html__('No Animation','goodwish'),
					'right-left' => esc_html__('Text right to left','goodwish'),
					'left-right' => esc_html__('Text left to right','goodwish'),
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__('Vertical Alignment','goodwish'),
				'description' => esc_html__('Specify title vertical alignment','goodwish'),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__('From Bottom of Header','goodwish'),
					'window_top' => esc_html__('From Window Top','goodwish'),
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__('Horizontal Alignment','goodwish'),
				'description' => esc_html__('Specify title horizontal alignment','goodwish'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left','goodwish'),
					'center' => esc_html__('Center','goodwish'),
					'right' => esc_html__('Right','goodwish'),
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_text_size',
				'type' => 'select',
				'default_value' => 'medium',
				'label' => esc_html__('Text Size','goodwish'),
				'description' => esc_html__('Choose a default Title size','goodwish'),
				'parent' => $show_title_area_container,
				'options' => array(
					'large'     => esc_html__('Large','goodwish'),
					'medium'    => esc_html__('Medium','goodwish'),
					'small'     => esc_html__('Small','goodwish'),


				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color','goodwish'),
				'description' => esc_html__('Choose a background color for Title Area','goodwish'),
				'parent' => $show_title_area_container
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image','goodwish'),
				'description' => esc_html__('Choose an Image for Title Area','goodwish'),
				'parent' => $show_title_area_container
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image','goodwish'),
				'description' => esc_html__('Enabling this option will make Title background image responsive','goodwish'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = goodwish_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax','goodwish'),
				'description' => esc_html__('Enabling this option will make Title background image parallax','goodwish'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No','goodwish'),
					'yes' => esc_html__('Yes','goodwish'),
					'yes_zoom' => esc_html__('Yes, with zoom out','goodwish'),
				)
			)
		);

		goodwish_edge_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height','goodwish'),
			'description' => esc_html__('Set a height for Title Area','goodwish'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(
			array(
				'name' => 'title_area_border_bottom',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Border Bottom','goodwish'),
				'description' => esc_html__('This option will display Border Bottom in Title Area','goodwish'),
				'parent' => $show_title_area_container
			)
		);


		$panel_typography = goodwish_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography','goodwish'),
			)
		);

		$group_page_title_styles = goodwish_edge_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Title','goodwish'),
			'description'	=> esc_html__('Define styles for page title','goodwish'),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
			'parent'		=> $row_page_title_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family','goodwish'),
			'parent'		=> $row_page_title_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=> goodwish_edge_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

		$group_page_subtitle_styles = goodwish_edge_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title'			=> esc_html__('Subtitle','goodwish'),
			'description'	=> esc_html__('Define styles for page subtitle','goodwish'),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
			'parent'		=> $row_page_subtitle_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family','goodwish'),
			'parent'		=> $row_page_subtitle_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=> goodwish_edge_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = goodwish_edge_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title'			=> esc_html__('Breadcrumbs','goodwish'),
			'description'	=> esc_html__('Define styles for page breadcrumbs','goodwish'),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family','goodwish'),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=> goodwish_edge_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color','goodwish'),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_title_options_map', 6);

}