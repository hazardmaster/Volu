<?php 
if(!function_exists('goodwish_edge_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function goodwish_edge_accordions_map() {
		
       $panel = goodwish_edge_add_admin_panel(array(
           'title' => esc_html__('Accordions', 'goodwish' ),
           'name'  => 'panel_accordions',
           'page'  => '_elements_page'
       ));

       //Typography options
       goodwish_edge_add_admin_section_title(array(
           'name' => 'typography_section_title',
           'title' => esc_html__('Typography', 'goodwish' ),
           'parent' => $panel
       ));

       $typography_group = goodwish_edge_add_admin_group(array(
           'name' => 'typography_group',
           'title' => esc_html__('Typography', 'goodwish' ),
			'description' => esc_html__('Setup typography for accordions navigation', 'goodwish' ),
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
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family', 'goodwish' ),
       ));

       goodwish_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform', 'goodwish' ),
           'options'       => goodwish_edge_get_text_transform_array()
       ));

       goodwish_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style', 'goodwish' ),
           'options'       => goodwish_edge_get_font_style_array()
       ));

       goodwish_edge_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
           'default_value' => '',
           'label'         => esc_html__('Letter Spacing', 'goodwish' ),
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
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight', 'goodwish' ),
           'options'       => goodwish_edge_get_font_weight_array()
       ));
		
		//Initial Accordion Color Styles
		
		goodwish_edge_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Basic Accordions Color Styles', 'goodwish' ),
           'parent' => $panel
       ));
		
		$accordions_color_group = goodwish_edge_add_admin_group(array(
           'name' => 'accordions_color_group',
           'title' => esc_html__('Accordion Color Styles', 'goodwish' ),
			'description' => esc_html__('Set color styles for accordion title', 'goodwish' ),
           'parent' => $panel
       ));
		$accordions_color_row = goodwish_edge_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
       ));
		goodwish_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title Color', 'goodwish' )
       ));
		goodwish_edge_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color',
           'default_value' => '',
           'label'         => esc_html__('Icon Color', 'goodwish' )
       ));
		
		$active_accordions_color_group = goodwish_edge_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html__('Active and Hover Accordion Color Styles', 'goodwish' ),
			'description' => esc_html__('Set color styles for active and hover accordions', 'goodwish' ),
           'parent' => $panel
       ));
		$active_accordions_color_row = goodwish_edge_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
       ));
		goodwish_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title Color', 'goodwish' )
       ));
		goodwish_edge_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color_active',
           'default_value' => '',
           'label'         => esc_html__('Icon Color', 'goodwish' )
       ));
   }
   add_action('goodwish_edge_options_elements_map', 'goodwish_edge_accordions_map');
}