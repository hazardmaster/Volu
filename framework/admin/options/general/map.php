<?php

if ( ! function_exists('goodwish_edge_general_options_map') ) {
    /**
     * General options page
     */
    function goodwish_edge_general_options_map() {

        goodwish_edge_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'goodwish'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = goodwish_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'goodwish')
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'goodwish'),
                'description'   => esc_html__('Choose a default Google font for your site (default is Montserrat)', 'goodwish'),
                'parent' => $panel_design_style
            )
        );

	    goodwish_edge_add_admin_field(
		    array(
			    'name'          => 'google_fonts_second',
			    'type'          => 'font',
			    'default_value' => '-1',
			    'label'         => esc_html__('Second Font Family', 'goodwish'),
			    'description'   => esc_html__('Choose a default Google font for your site (default is Open Sans)', 'goodwish'),
			    'parent' => $panel_design_style
		    )
	    );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'goodwish'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = goodwish_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'goodwish'),
                'description'   => esc_html__('Choose additional Google font for your site', 'goodwish'),
                'parent'        => $additional_google_fonts_container
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'goodwish'),
                'description'   => esc_html__('Choose additional Google font for your site', 'goodwish'),
                'parent'        => $additional_google_fonts_container
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'goodwish'),
                'description'   => esc_html__('Choose additional Google font for your site', 'goodwish'),
                'parent'        => $additional_google_fonts_container
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'goodwish'),
                'description'   => esc_html__('Choose additional Google font for your site', 'goodwish'),
                'parent'        => $additional_google_fonts_container
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'goodwish'),
                'description'   => esc_html__('Choose additional Google font for your site', 'goodwish'),
                'parent'        => $additional_google_fonts_container
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'goodwish'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #69c5d3', 'goodwish'),
                'parent'        => $panel_design_style
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'second_color',
                'type'          => 'color',
                'label'         => esc_html__('Second Main Color', 'goodwish'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #cde422', 'goodwish'),
                'parent'        => $panel_design_style
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'goodwish'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'goodwish'),
                'parent'        => $panel_design_style
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'goodwish'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'goodwish'),
                'parent'        => $panel_design_style
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'goodwish'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = goodwish_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'goodwish'),
                'description'   => esc_html__('Choose the page background color outside box.', 'goodwish'),
                'parent'        => $boxed_container
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'goodwish'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'goodwish'),
                'parent'        => $boxed_container
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_repeating',
                'type'          => 'select',
                'default_value' => 'no',
                'label'         => esc_html__('Use Background Image as Pattern', 'goodwish'),
                'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'goodwish'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'no'    =>  esc_html__('No', 'goodwish'),
                    'yes'   =>  esc_html__('Yes', 'goodwish')
                )
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Behaviour', 'goodwish'),
                'description'   => esc_html__('Choose background image behaviour', 'goodwish'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => esc_html__('Fixed', 'goodwish'),
                    'scroll'    => esc_html__('Scroll', 'goodwish')
                )
            )
        );
        goodwish_edge_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Initial Width of Content', 'goodwish'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to Default Template and rows set to In Grid)', 'goodwish'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    ""          => "1300px - default",
                    "grid-1300" => "1300px",
                    "grid-1200" => "1200px",
                    "grid-1000" => "1000px",
                    "grid-800"  => "800px"
                )
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => esc_html__('Preload Pattern Image', 'goodwish'),
                'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'goodwish'),
                'parent'        => $panel_design_style
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'goodwish'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'goodwish'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = goodwish_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'goodwish')
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'goodwish'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'goodwish'),
                'parent'        => $panel_settings
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'goodwish'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'goodwish'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container"
                )
            )
        );

       $page_transitions_container = goodwish_edge_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'page_transition_preloader',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Enable Preloading Animation', 'goodwish' ),
                'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'goodwish' ),
                'parent'        => $page_transitions_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transition_preloader_container"
                )
            )
        );

        $page_transition_preloader_container = goodwish_edge_add_admin_container(
            array(
                'parent'          => $page_transitions_container,
                'name'            => 'page_transition_preloader_container',
                'hidden_property' => 'page_transition_preloader',
                'hidden_value'    => 'no'
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'goodwish'),
                'parent'        => $page_transition_preloader_container
            )
        );

        $group_pt_spinner_animation = goodwish_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'goodwish'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'goodwish'),
            'parent'        => $page_transition_preloader_container
        ));

        $row_pt_spinner_animation = goodwish_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        goodwish_edge_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'goodwish'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "heart" => esc_html__( "Heart", 'goodwish' ),
                "pulse" => esc_html__("Pulse", 'goodwish'),
                "double_pulse" => esc_html__("Double Pulse", 'goodwish'),
                "cube" => esc_html__("Cube", 'goodwish'),
                "rotating_cubes" => esc_html__("Rotating Cubes", 'goodwish'),
                "stripes" => esc_html__("Stripes", 'goodwish'),
                "wave" => esc_html__("Wave", 'goodwish'),
                "two_rotating_circles" => esc_html__("2 Rotating Circles", 'goodwish'),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", 'goodwish'),
                "atom" => esc_html__("Atom", 'goodwish'),
                "clock" => esc_html__("Clock", 'goodwish'),
                "mitosis" => esc_html__("Mitosis", 'goodwish'),
                "lines" => esc_html__("Lines", 'goodwish'),
                "fussion" => esc_html__("Fussion", 'goodwish'),
                "wave_circles" => esc_html__("Wave Circles", 'goodwish'),
                "pulse_circles" => esc_html__("Pulse Circles", 'goodwish')
            ),
        ));

        goodwish_edge_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'goodwish'),
            'parent'        => $row_pt_spinner_animation
        ));

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'page_transition_fadeout',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Enable Fade Out Animation', 'goodwish' ),
                'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'goodwish' ),
                'parent'        => $page_transitions_container
            )
        );
    
        goodwish_edge_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'goodwish'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'goodwish'),
                'parent'        => $panel_settings
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'goodwish'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'goodwish'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = goodwish_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'goodwish')
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'goodwish'),
                'description'   => esc_html__('Enter your custom CSS here', 'goodwish'),
                'parent'        => $panel_custom_code
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'goodwish'),
                'description'   => esc_html__('Enter your custom Javascript here', 'goodwish'),
                'parent'        => $panel_custom_code
            )
        );

        $panel_google_maps_api_key = goodwish_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'google_maps_api_key',
                'title' => esc_html__('Google Maps API key', 'goodwish')
            )
        );

        goodwish_edge_add_admin_field(
            array(
                'name'          => 'google_maps_api_key',
                'type'          => 'text',
                'label'         => esc_html__('Google Maps API key', 'goodwish'),
                'description'   => esc_html__('Enter your Google Maps API key here', 'goodwish'),
                'parent'        => $panel_google_maps_api_key
            )
        );

    }

    add_action( 'goodwish_edge_options_map', 'goodwish_edge_general_options_map', 1);

}