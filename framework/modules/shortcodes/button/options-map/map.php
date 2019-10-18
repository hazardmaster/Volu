<?php

if(!function_exists('goodwish_edge_button_map')) {
    function goodwish_edge_button_map() {
        $panel = goodwish_edge_add_admin_panel(array(
            'title' => esc_html__('Button','goodwish'),
            'name'  => 'panel_button',
            'page'  => '_elements_page'
        ));

        //Typography options
        goodwish_edge_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Typography','goodwish'),
            'parent' => $panel
        ));

        $typography_group = goodwish_edge_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography','goodwish'),
            'description' => esc_html__('Setup typography for all button types','goodwish'),
            'parent' => $panel
        ));

        $typography_row = goodwish_edge_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family','goodwish'),
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform','goodwish'),
            'options'       => goodwish_edge_get_text_transform_array()
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style','goodwish'),
            'options'       => goodwish_edge_get_font_style_array()
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing','goodwish'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = goodwish_edge_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight','goodwish'),
            'options'       => goodwish_edge_get_font_weight_array()
        ));

        //Outline type options
        goodwish_edge_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types','goodwish'),
            'parent' => $panel
        ));

        $outline_group = goodwish_edge_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type','goodwish'),
            'description' => esc_html__('Setup outline button type','goodwish'),
            'parent' => $panel
        ));

        $outline_row = goodwish_edge_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','goodwish'),
            'description'   => ''
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','goodwish'),
            'description'   => ''
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','goodwish'),
            'description'   => ''
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','goodwish'),
            'description'   => ''
        ));

        $outline_row2 = goodwish_edge_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','goodwish'),
            'description'   => ''
        ));

	    //Outline Light type options
	    $outline_light_group = goodwish_edge_add_admin_group(array(
		    'name' => 'outline_light_group',
		    'title' => esc_html__('Outline Light Type','goodwish'),
		    'description' => esc_html__('Setup outline light button type','goodwish'),
		    'parent' => $panel
	    ));

	    $outline_light_row = goodwish_edge_add_admin_row(array(
		    'name' => 'outline_light_row',
		    'next' => true,
		    'parent' => $outline_light_group
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_hover_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Hover Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_hover_bg_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Background Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $outline_light_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Border Color','goodwish'),
		    'description'   => ''
	    ));

	    $outline_light_row2 = goodwish_edge_add_admin_row(array(
		    'name' => 'outline_light_row2',
		    'next' => true,
		    'parent' => $outline_light_group
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $outline_light_row2,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_outline_light_hover_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Border Color','goodwish'),
		    'description'   => ''
	    ));

        //Solid type options
        $solid_group = goodwish_edge_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type','goodwish'),
            'description' => esc_html__('Setup solid button type','goodwish'),
            'parent' => $panel
        ));

        $solid_row = goodwish_edge_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','goodwish'),
            'description'   => ''
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','goodwish'),
            'description'   => ''
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color','goodwish'),
            'description'   => ''
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','goodwish'),
            'description'   => ''
        ));

        $solid_row2 = goodwish_edge_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','goodwish'),
            'description'   => ''
        ));

        goodwish_edge_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Border Color','goodwish'),
            'description'   => ''
        ));

	    //Solid dark type options
	    $solid_dark_group = goodwish_edge_add_admin_group(array(
		    'name' => 'solid_dark_group',
		    'title' => esc_html__('Solid Dark Type','goodwish'),
		    'description' => esc_html__('Setup Solid Dark button type','goodwish'),
		    'parent' => $panel
	    ));

	    $solid_dark_row = goodwish_edge_add_admin_row(array(
		    'name' => 'solid_dark_row',
		    'next' => true,
		    'parent' => $solid_dark_group
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_hover_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Hover Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_bg_color',
		    'default_value' => '',
		    'label'         => esc_html__('Background Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_hover_bg_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Background Color','goodwish'),
		    'description'   => ''
	    ));

	    $solid_dark_row2 = goodwish_edge_add_admin_row(array(
		    'name' => 'solid_dark_row2',
		    'next' => true,
		    'parent' => $solid_dark_group
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row2,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Border Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $solid_dark_row2,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_solid_dark_hover_border_color',
		    'default_value' => '',
		    'label'         => esc_html__('Hover Border Color','goodwish'),
		    'description'   => ''
	    ));

	    //Transparent type options
	    $transparent_group = goodwish_edge_add_admin_group(array(
		    'name' => 'transparent_group',
		    'title' => esc_html__('Transparent Type','goodwish'),
		    'description' => esc_html__('Setup Transparent button type','goodwish'),
		    'parent' => $panel
	    ));

	    $transparent_row = goodwish_edge_add_admin_row(array(
		    'name' => 'transparent_row',
		    'next' => true,
		    'parent' => $transparent_group
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $transparent_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_transparent_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Color','goodwish'),
		    'description'   => ''
	    ));

	    goodwish_edge_add_admin_field(array(
		    'parent'        => $transparent_row,
		    'type'          => 'colorsimple',
		    'name'          => 'btn_transparent_hover_text_color',
		    'default_value' => '',
		    'label'         => esc_html__('Text Hover Color','goodwish'),
		    'description'   => ''
	    ));
    }

    add_action('goodwish_edge_options_elements_map', 'goodwish_edge_button_map');
}

