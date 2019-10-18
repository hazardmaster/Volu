<?php

if ( ! function_exists('goodwish_edge_contact_form_7_options_map') ) {

	function goodwish_edge_contact_form_7_options_map() {

		goodwish_edge_add_admin_page(array(
			'slug'	=> '_contact_form7_page',
			'title'	=> esc_html__('Contact Form 7','goodwish'),
			'icon'	=> 'fa fa-envelope-o'
		));

		$panel_contact_form_style_1 = goodwish_edge_add_admin_panel(array(
			'page'	=> '_contact_form7_page',
			'name'	=> 'panel_contact_form_style_1',
			'title'	=> esc_html__('Custom Style 1','goodwish'),
		));

		//Text Typography

		$typography_text_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'typography_text_group',
			'title'			=> esc_html__('Form Text Typography','goodwish'),
			'description'	=> esc_html__('Setup typography for form elements text','goodwish'),
			'parent'		=> $panel_contact_form_style_1
		));

		$typography_text_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row1',
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		$typography_text_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row2',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_text_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=>  goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_text_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		$typography_text_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row3',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_text_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Labels Typography

		$typography_label_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'typography_label_group',
			'title'			=> esc_html__('Form Label Typography','goodwish'),
			'description'	=> esc_html__('Setup typography for form elements label','goodwish'),
			'parent'		=> $panel_contact_form_style_1
		));

		$typography_label_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_label_row1',
			'parent'	=> $typography_label_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_label_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_label_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		$typography_label_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_label_row2',
			'next'		=> true,
			'parent'	=> $typography_label_group
		));


		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=>  goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_label_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_label_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Background and Border

		$background_border_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'background_border_group',
			'title'			=> esc_html__('Form Elements Background and Border','goodwish'),
			'description'	=> esc_html__('Setup form elements background and border style','goodwish'),
			'parent'		=> $panel_contact_form_style_1
		));

		$background_border_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row1',
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_focus_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Transparency','goodwish'),
		));

		$background_border_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row2',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_focus_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_focus_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Transparency','goodwish'),
		));

		$background_border_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row3',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Padding

		$padding_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'padding_group',
			'title'			=> esc_html__('Elements Padding','goodwish'),
			'description'	=> esc_html__('Setup form elements padding','goodwish'),
			'parent'		=> $panel_contact_form_style_1
		));

		$padding_row = goodwish_edge_add_admin_row(array(
			'name'		=> 'padding_row',
			'parent'	=> $padding_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Top','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Right','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Bottom','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Left','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Margin

		$margin_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'margin_group',
			'title'			=> esc_html__('Elements Margin','goodwish'),
			'description'	=> esc_html__('Setup form elements margin','goodwish'),
			'parent'		=> $panel_contact_form_style_1
		));

		$margin_row = goodwish_edge_add_admin_row(array(
			'name'		=> 'margin_row',
			'parent'	=> $margin_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_margin_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Top','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_margin_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Bottom','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Textarea

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_textarea_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Textarea Height','goodwish'),
			'description'	=> esc_html__('Enter height for textarea form element','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Typography

		$button_typography_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'button_typography_group',
			'title'			=> esc_html__('Button Typography','goodwish'),
			'description'	=> esc_html__('Setup button text typography','goodwish'),
			'parent'		=> $panel_contact_form_style_1
		));

		$button_typography_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_typography_row1',
			'parent'	=> $button_typography_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_1_button_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		$button_typography_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_typography_row2',
			'next'		=> true,
			'parent'	=> $button_typography_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=> goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_1_button_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Background and Border

		$button_background_border_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'button_background_border_group',
			'title'			=> esc_html__('Button Background and Border','goodwish'),
			'description'	=> esc_html__('Setup button background and border style','goodwish'),
			'parent'		=> $panel_contact_form_style_1
		));

		$button_background_border_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row1',
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_bckg_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_hover_bckg_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Transparency','goodwish'),
		));

		$button_background_border_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row2',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_1_button_hover_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_hover_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Transparency','goodwish'),
		));

		$button_background_border_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row3',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_1_button_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Height

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_button_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Height','goodwish'),
			'description'	=> esc_html__('Insert form button height','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Padding

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_1,
			'type'			=> 'text',
			'name'			=> 'cf7_style_1_button_padding',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Left/Right Padding','goodwish'),
			'description'	=> esc_html__('Enter value for button left and right padding','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		$panel_contact_form_style_2 = goodwish_edge_add_admin_panel(array(
			'page'	=> '_contact_form7_page',
			'name'	=> 'panel_contact_form_style_2',
			'title'	=> esc_html__('Custom Style 2','goodwish'),
		));

		//Text Typography

		$typography_text_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'typography_text_group',
			'title'			=> esc_html__('Form Text Typography','goodwish'),
			'description'	=> esc_html__('Setup typography for form elements text','goodwish'),
			'parent'		=> $panel_contact_form_style_2
		));

		$typography_text_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row1',
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		$typography_text_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row2',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_text_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=>  goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_text_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		$typography_text_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row3',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_text_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Labels Typography

		$typography_label_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'typography_label_group',
			'title'			=> esc_html__('Form Label Typography','goodwish'),
			'description'	=> esc_html__('Setup typography for form elements label','goodwish'),
			'parent'		=> $panel_contact_form_style_2
		));

		$typography_label_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_label_row1',
			'parent'	=> $typography_label_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_label_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_label_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		$typography_label_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_label_row2',
			'next'		=> true,
			'parent'	=> $typography_label_group
		));


		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=>  goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_label_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_label_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Background and Border

		$background_border_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'background_border_group',
			'title'			=> esc_html__('Form Elements Background and Border','goodwish'),
			'description'	=> esc_html__('Setup form elements background and border style','goodwish'),
			'parent'		=> $panel_contact_form_style_2
		));

		$background_border_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row1',
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_focus_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Transparency','goodwish'),
		));

		$background_border_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row2',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_focus_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_focus_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Transparency','goodwish'),
		));

		$background_border_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row3',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Padding

		$padding_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'padding_group',
			'title'			=> esc_html__('Elements Padding','goodwish'),
			'description'	=> esc_html__('Setup form elements padding','goodwish'),
			'parent'		=> $panel_contact_form_style_2
		));

		$padding_row = goodwish_edge_add_admin_row(array(
			'name'		=> 'padding_row',
			'parent'	=> $padding_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Top','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Right','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Bottom','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Left','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Margin

		$margin_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'margin_group',
			'title'			=> esc_html__('Elements Margin','goodwish'),
			'description'	=> esc_html__('Setup form elements margin','goodwish'),
			'parent'		=> $panel_contact_form_style_2
		));

		$margin_row = goodwish_edge_add_admin_row(array(
			'name'		=> 'margin_row',
			'parent'	=> $margin_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_margin_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Top','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_margin_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Bottom','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Textarea

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_textarea_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Textarea Height','goodwish'),
			'description'	=> esc_html__('Enter height for textarea form element','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Typography

		$button_typography_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'button_typography_group',
			'title'			=> esc_html__('Button Typography','goodwish'),
			'description'	=> esc_html__('Setup button text typography','goodwish'),
			'parent'		=> $panel_contact_form_style_2
		));

		$button_typography_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_typography_row1',
			'parent'	=> $button_typography_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_2_button_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		$button_typography_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_typography_row2',
			'next'		=> true,
			'parent'	=> $button_typography_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=> goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_2_button_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Background and Border

		$button_background_border_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'button_background_border_group',
			'title'			=> esc_html__('Button Background and Border','goodwish'),
			'description'	=> esc_html__('Setup button background and border style','goodwish'),
			'parent'		=> $panel_contact_form_style_2
		));

		$button_background_border_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row1',
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_bckg_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_hover_bckg_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Transparency','goodwish'),
		));

		$button_background_border_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row2',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_2_button_hover_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_hover_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Transparency','goodwish'),
		));

		$button_background_border_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row3',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_2_button_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Height

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_button_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Height','goodwish'),
			'description'	=> esc_html__('Insert form button height','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Padding

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_2,
			'type'			=> 'text',
			'name'			=> 'cf7_style_2_button_padding',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Left/Right Padding','goodwish'),
			'description'	=> esc_html__('Enter value for button left and right padding','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));


		$panel_contact_form_style_3 = goodwish_edge_add_admin_panel(array(
			'page'	=> '_contact_form7_page',
			'name'	=> 'panel_contact_form_style_3',
			'title'	=> esc_html__('Custom Style 3','goodwish'),
		));

		//Text Typography

		$typography_text_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'typography_text_group',
			'title'			=> esc_html__('Form Text Typography','goodwish'),
			'description'	=> esc_html__('Setup typography for form elements text','goodwish'),
			'parent'		=> $panel_contact_form_style_3
		));

		$typography_text_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row1',
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_focus_text_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_text_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_text_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		$typography_text_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row2',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_3_text_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_text_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=>  goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_text_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_text_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		$typography_text_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_text_row3',
			'next'		=> true,
			'parent'	=> $typography_text_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_text_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_text_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Labels Typography

		$typography_label_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'typography_label_group',
			'title'			=> esc_html__('Form Label Typography','goodwish'),
			'description'	=> esc_html__('Setup typography for form elements label','goodwish'),
			'parent'		=> $panel_contact_form_style_3
		));

		$typography_label_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_label_row1',
			'parent'	=> $typography_label_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_label_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_label_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_label_line_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_3_label_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		$typography_label_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'typography_label_row2',
			'next'		=> true,
			'parent'	=> $typography_label_group
		));


		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_label_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=>  goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_label_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_label_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $typography_label_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_label_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Background and Border

		$background_border_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'background_border_group',
			'title'			=> esc_html__('Form Elements Background and Border','goodwish'),
			'description'	=> esc_html__('Setup form elements background and border style','goodwish'),
			'parent'		=> $panel_contact_form_style_3
		));

		$background_border_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row1',
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_focus_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_focus_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Background Transparency','goodwish'),
		));

		$background_border_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row2',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_focus_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_focus_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Focus Border Transparency','goodwish'),
		));

		$background_border_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'background_border_row3',
			'next'		=> true,
			'parent'	=> $background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Padding

		$padding_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'padding_group',
			'title'			=> esc_html__('Elements Padding','goodwish'),
			'description'	=> esc_html__('Setup form elements padding','goodwish'),
			'parent'		=> $panel_contact_form_style_3
		));

		$padding_row = goodwish_edge_add_admin_row(array(
			'name'		=> 'padding_row',
			'parent'	=> $padding_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Top','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Right','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Bottom','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $padding_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Padding Left','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Form Elements Margin

		$margin_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'margin_group',
			'title'			=> esc_html__('Elements Margin','goodwish'),
			'description'	=> esc_html__('Setup form elements margin','goodwish'),
			'parent'		=> $panel_contact_form_style_3
		));

		$margin_row = goodwish_edge_add_admin_row(array(
			'name'		=> 'margin_row',
			'parent'	=> $margin_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_margin_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Top','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $margin_row,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_margin_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Margin Bottom','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Textarea

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_3,
			'type'			=> 'text',
			'name'			=> 'cf7_style_3_textarea_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Textarea Height','goodwish'),
			'description'	=> esc_html__('Enter height for textarea form element','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Typography

		$button_typography_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'button_typography_group',
			'title'			=> esc_html__('Button Typography','goodwish'),
			'description'	=> esc_html__('Setup button text typography','goodwish'),
			'parent'		=> $panel_contact_form_style_3
		));

		$button_typography_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_typography_row1',
			'parent'	=> $button_typography_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_button_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_button_hover_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_font_size',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row1,
			'type'			=> 'fontsimple',
			'name'			=> 'cf7_style_3_button_font_family',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Family','goodwish'),
		));

		$button_typography_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_typography_row2',
			'next'		=> true,
			'parent'	=> $button_typography_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_button_font_style',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','goodwish'),
			'options'		=> goodwish_edge_get_font_style_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_button_font_weight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight','goodwish'),
			'options'		=> goodwish_edge_get_font_weight_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'selectsimple',
			'name'			=> 'cf7_style_3_button_text_transform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','goodwish'),
			'options'		=> goodwish_edge_get_text_transform_array()
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_typography_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Background and Border

		$button_background_border_group = goodwish_edge_add_admin_group(array(
			'name'			=> 'button_background_border_group',
			'title'			=> esc_html__('Button Background and Border','goodwish'),
			'description'	=> esc_html__('Setup button background and border style','goodwish'),
			'parent'		=> $panel_contact_form_style_3
		));

		$button_background_border_row1 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row1',
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_button_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_background_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_button_hover_bckg_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row1,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_hover_bckg_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Background Hover Transparency','goodwish'),
		));

		$button_background_border_row2 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row2',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_button_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Transparency','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'colorsimple',
			'name'			=> 'cf7_style_3_button_hover_border_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Color','goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row2,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_hover_border_transparency',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Hover Transparency','goodwish'),
		));

		$button_background_border_row3 = goodwish_edge_add_admin_row(array(
			'name'		=> 'button_background_border_row3',
			'next'		=> true,
			'parent'	=> $button_background_border_group
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_border_width',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Width','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		goodwish_edge_add_admin_field(array(
			'parent'		=> $button_background_border_row3,
			'type'			=> 'textsimple',
			'name'			=> 'cf7_style_3_button_border_radius',
			'default_value'	=> '',
			'label'			=> esc_html__('Border Radius','goodwish'),
			'args'			=> array(
				'suffix' => 'px'
			)
		));

		// Button Height

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_3,
			'type'			=> 'text',
			'name'			=> 'cf7_style_3_button_height',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Height','goodwish'),
			'description'	=> esc_html__('Insert form button height','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));

		// Button Padding

		goodwish_edge_add_admin_field(array(
			'parent'		=> $panel_contact_form_style_3,
			'type'			=> 'text',
			'name'			=> 'cf7_style_3_button_padding',
			'default_value'	=> '',
			'label'			=> esc_html__('Button Left/Right Padding','goodwish'),
			'description'	=> esc_html__('Enter value for button left and right padding','goodwish'),
			'args'			=> array(
				'col_width' => '3',
				'suffix' => 'px'
			)
		));


	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_contact_form_7_options_map', 19);

}