<?php

if(!function_exists('goodwish_edge_map_header')) {
    function goodwish_edge_map_header()
    {

        $header_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post','edge-event','give_forms'),
                'title' => esc_html__('Header', 'goodwish'),
                'name' => 'header_meta'
            )
        );
        $temp_holder_show = '';
        $temp_holder_hide = '';
        $temp_array_standard = array();
        $temp_array_standard_extended = array();
        $temp_array_vertical = array();
        $temp_array_full_screen = array();
        switch (goodwish_edge_options()->getOptionValue('header_type')) {

            case 'header-standard':
                $temp_holder_show = '#edgtf_edgtf_header_standard_type_meta_container';
                $temp_holder_hide = '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_standard_extended_type_meta_container';

                $temp_array_standard = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-vertical','header-standard-extended', 'header-full-screen')
                );

                $temp_array_standard_extended = array(
                    'hidden_value'  => 'default',
                    'hidden_values' => array('','header-standard','header-vertical', 'header-full-screen'
                    )
                );

                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-standard', 'header-standard-extended','header-full-screen')
                );

                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-standard', 'header-standard-extended','header-vertical')
                );
                
                break;

        case 'header-standard-extended':
            $temp_holder_show = '#edgtf_edgtf_header_standard_extended_type_meta_container';
            $temp_holder_hide = '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_standard_type_meta_container';

            $temp_array_standard = array(
                'hidden_value'  => 'default',
                'hidden_values' => array('header-vertical','header-standard-extended', 'header-full-screen')
            );

            $temp_array_standard_extended = array(
                'hidden_value'  => 'default',
                'hidden_values' => array('','header-standard','header-vertical', 'header-full-screen'
                )
            );

            $temp_array_vertical = array(
                'hidden_values' => array('', 'header-standard', 'header-standard-extended','header-full-screen')
            );
            
            $temp_array_full_screen = array(
                'hidden_values' => array('', 'header-standard', 'header-standard-extended','header-vertical')
            );


            break;


            case 'header-vertical':
                $temp_holder_show = '#edgtf_edgtf_header_vertical_type_meta_container';
                $temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_standard_extended_type_meta_container';

                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-vertical','header-standard-extended', 'header-full-screen')
                );
                $temp_array_vertical = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-standard', 'header-standard-extended','header-full-screen')
                );
                $temp_array_full_screen = array(
                    'hidden_values' => array('', 'header-standard','header-standard-extended', 'header-vertical')
                );
                break;
            case 'header-full-screen':
                $temp_holder_show = '#edgtf_edgtf_header_full_screen_type_meta_container';
                $temp_holder_hide = '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_standard_extended_type_meta_container';
                $temp_array_standard = array(
                    'hidden_values' => array('', 'header-vertical', 'header-standard','header-standard-extended')
                );

                $temp_array_vertical = array(
                    'hidden_values' => array('', 'header-standard', 'header-standard-extended','header-full-screen')
                );

                $temp_array_full_screen = array(
                    'hidden_value' => 'default',
                    'hidden_values' => array('header-vertical', 'header-standard-extended','header-full-screen')
                );

                break;
        }

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_header_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Choose Header Type', 'goodwish'),
                'description' => esc_html__('Select header type layout', 'goodwish'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => 'Default',
                    'header-standard' => esc_html__('Standard Header Layout', 'goodwish'),
                    'header-standard-extended' => esc_html__('Standard Extended Header', 'goodwish'),
                    'header-vertical' => esc_html__('Vertical Header Layout', 'goodwish'),
                    'header-full-screen' => esc_html__('Full Screen Header Layout', 'goodwish')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => $temp_holder_hide,
                        'header-standard' => '#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_standard_extended_type_meta_container',
                        'header-standard-extended' => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_vertical_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container',
                        'header-vertical' => '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_full_screen_type_meta_container,#edgtf_edgtf_header_standard_extended_type_meta_container',
                        'header-full-screen' => '#edgtf_edgtf_header_standard_type_meta_container,#edgtf_edgtf_header_vertical_type_meta_container,#edgtf_edgtf_header_standard_extended_type_meta_container'
                    ),
                    "show" => array(
                        "" => $temp_holder_show,
                        "header-standard" => '#edgtf_edgtf_header_standard_type_meta_container',
                        "header-standard-extended" => '#edgtf_edgtf_header_standard_extended_type_meta_container',
                        "header-vertical" => '#edgtf_edgtf_header_vertical_type_meta_container',
                        "header-full-screen" => '#edgtf_edgtf_header_full_screen_type_meta_container'
                    )
                )
            )
        );
        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_header_style_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Header Skin', 'goodwish'),
                'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'goodwish'),
                'parent' => $header_meta_box,
                'options' => array(
                    '' => '',
                    'light-header' => esc_html__('Light', 'goodwish'),
                    'dark-header' => esc_html__('Dark', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'parent' => $header_meta_box,
                'type' => 'select',
                'name' => 'edgtf_enable_header_style_on_scroll_meta',
                'default_value' => '',
                'label' => esc_html__('Enable Header Style on Scroll', 'goodwish'),
                'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'goodwish'),
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                )
            )
        );


        $header_standard_type_meta_container = goodwish_edge_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'edgtf_header_standard_type_meta_container',
                    'hidden_property' => 'edgtf_header_type_meta',

                ),
                $temp_array_standard
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'goodwish'),
                'description' => esc_html__('Choose a background color for header area', 'goodwish'),
                'parent' => $header_standard_type_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'goodwish'),
                'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__('Border Bottom Color', 'goodwish'),
                'description' => esc_html__('Choose a border bottom color for header area', 'goodwish'),
                'parent' => $header_standard_type_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'goodwish'),
                'description' => esc_html__('Choose a transparency for the header border bottom color (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'parent' => $header_standard_type_meta_container,
                'type' => 'select',
                'name' => 'edgtf_menu_area_in_grid_header_standard_meta',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'goodwish'),
                'description' => esc_html__('Set header content to be in grid', 'goodwish'),
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_scroll_amount_for_sticky_meta',
                'type' => 'text',
                'label' => esc_html__('Scroll amount for sticky header appearance', 'goodwish'),
                'description' => esc_html__('Define scroll amount for sticky header appearance', 'goodwish'),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                ),
                'hidden_property' => 'edgtf_header_behaviour',
                'hidden_values' => array("sticky-header-on-scroll-up", "fixed-on-scroll")
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_sticky_header_in_grid_meta',
                'type' => 'select',
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish'),
                    'no' => esc_html__('No', 'goodwish')
                ),
                'label' => esc_html__('Sticky Header in grid','goodwish'),
                'description' => esc_html__('Set sticky header content to be in grid','goodwish'),
                'parent' => $header_standard_type_meta_container,
                'hidden_property' => 'edgtf_header_behaviour',
                'hidden_values' => array("sticky-header-on-scroll-up", "fixed-on-scroll")
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'parent' => $header_standard_type_meta_container,
                'type' => 'select',
                'name' => 'edgtf_always_put_content_below_header_meta',
                'default_value' => '',
                'options' => array(
                    '' => esc_html__('Default', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish'),
                    'no' => esc_html__('No', 'goodwish')
                ),
                'label' => esc_html__('Always put content below header','goodwish'),
            )
        );

        $header_standard_extended_type_meta_container = goodwish_edge_add_admin_container(
            array_merge(
                array(
                    'parent'          => $header_meta_box,
                    'name'            => 'edgtf_header_standard_extended_type_meta_container',
                    'hidden_property' => 'edgtf_header_type_meta',

                ),
                $temp_array_standard_extended
            )
        );

        goodwish_edge_add_admin_section_title(array(
            'name'   => 'logo_area_standard_extended_title',
            'parent' => $header_standard_extended_type_meta_container,
            'title'  => esc_html__('Logo Area', 'goodwish')
        ));

        goodwish_edge_create_meta_box_field(array(
            'name'          => 'edgtf_logo_area_in_grid_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Logo Area In Grid', 'goodwish'),
            'description'   => esc_html__('Set logo area content to be in grid', 'goodwish'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'goodwish'),
                'no'  => esc_html__('No', 'goodwish'),
                'yes' => esc_html__('Yes', 'goodwish')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#edgtf_logo_area_in_grid_header_standard_extended_container',
                    'no'  => '#edgtf_logo_area_in_grid_header_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#edgtf_logo_area_in_grid_header_standard_extended_container'
                )
            )
        ));

        $logo_area_in_grid_header_standard_extended_container = goodwish_edge_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_area_in_grid_header_standard_extended_container',
            'parent'          => $header_standard_extended_type_meta_container,
            'hidden_property' => 'edgtf_logo_area_in_grid_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_logo_area_grid_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'goodwish'),
                'description' => esc_html__('Set grid background color for logo area', 'goodwish'),
                'parent'      => $logo_area_in_grid_header_standard_extended_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_logo_area_grid_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'goodwish'),
                'description' => esc_html__('Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent'      => $logo_area_in_grid_header_standard_extended_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name'          => 'edgtf_logo_area_in_grid_border_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Border', 'goodwish'),
            'description'   => esc_html__('Set border on grid area', 'goodwish'),
            'parent'        => $logo_area_in_grid_header_standard_extended_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'goodwish'),
                'yes' => esc_html__('Yes', 'goodwish')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#edgtf_logo_area_in_grid_border_header_standard_extended_container',
                    'no'  => '#edgtf_logo_area_in_grid_border_header_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#edgtf_logo_area_in_grid_border_header_standard_extended_container'
                )
            )
        ));

        $logo_area_in_grid_border_header_standard_extended_container = goodwish_edge_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_area_in_grid_border_header_standard_extended_container',
            'parent'          => $logo_area_in_grid_header_standard_extended_container,
            'hidden_property' => 'edgtf_logo_area_in_grid_border_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        goodwish_edge_create_meta_box_field(array(
            'name'        => 'edgtf_logo_area_in_grid_border_color_header_standard_extended_meta',
            'type'        => 'color',
            'label'       => esc_html__('Border Color', 'goodwish'),
            'description' => esc_html__('Set border color for grid area', 'goodwish'),
            'parent'      => $logo_area_in_grid_border_header_standard_extended_container
        ));


        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_logo_area_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'goodwish'),
                'description' => esc_html__('Choose a background color for logo area', 'goodwish'),
                'parent'      => $header_standard_extended_type_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_logo_area_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'goodwish'),
                'description' => esc_html__('Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent'      => $header_standard_extended_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name'          => 'edgtf_logo_area_border_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Logo Area Border', 'goodwish'),
            'description'   => esc_html__('Set border on logo area', 'goodwish'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'goodwish'),
                'yes' => esc_html__('Yes', 'goodwish')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#edgtf_logo_border_bottom_color_standard_extended_container',
                    'no'  => '#edgtf_logo_border_bottom_color_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#edgtf_logo_border_bottom_color_standard_extended_container'
                )
            )
        ));

        $border_bottom_color_standard_extended_container = goodwish_edge_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'logo_border_bottom_color_standard_extended_container',
            'parent'          => $header_standard_extended_type_meta_container,
            'hidden_property' => 'edgtf_logo_area_border_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        goodwish_edge_create_meta_box_field(array(
            'name'        => 'edgtf_logo_area_border_color_header_standard_extended_meta',
            'type'        => 'color',
            'label'       => esc_html__('Border Color', 'goodwish'),
            'description' => esc_html__('Choose color of logo area bottom border', 'goodwish'),
            'parent'      => $border_bottom_color_standard_extended_container
        ));

        goodwish_edge_add_admin_section_title(array(
            'name'   => 'menu_area_standard_extended_title',
            'parent' => $header_standard_extended_type_meta_container,
            'title'  => esc_html__('Menu Area', 'goodwish')
        ));

        goodwish_edge_create_meta_box_field(array(
            'name'          => 'edgtf_menu_area_in_grid_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Menu Area In Grid', 'goodwish'),
            'description'   => esc_html__('Set menu area content to be in grid', 'goodwish'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => esc_html__('Default', 'goodwish'),
                'no'  => esc_html__('No', 'goodwish'),
                'yes' => esc_html__('Yes', 'goodwish')
            ),
            'args'          => array(
                'dependence' => true,
                'hide'       => array(
                    ''    => '#edgtf_menu_area_in_grid_header_standard_extended_container',
                    'no'  => '#edgtf_menu_area_in_grid_header_standard_extended_container',
                    'yes' => ''
                ),
                'show'       => array(
                    ''    => '',
                    'no'  => '',
                    'yes' => '#edgtf_menu_area_in_grid_header_standard_extended_container'
                )
            )
        ));

        $menu_area_in_grid_header_standard_extended_container = goodwish_edge_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'menu_area_in_grid_header_standard_extended_container',
            'parent'          => $header_standard_extended_type_meta_container,
            'hidden_property' => 'edgtf_menu_area_in_grid_header_standard_extended_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));


        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_menu_area_grid_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Grid Background Color', 'goodwish'),
                'description' => esc_html__('Set grid background color for menu area', 'goodwish'),
                'parent'      => $menu_area_in_grid_header_standard_extended_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_menu_area_grid_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Grid Background Transparency', 'goodwish'),
                'description' => esc_html__('Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent'      => $menu_area_in_grid_header_standard_extended_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name'          => 'edgtf_menu_area_in_grid_shadow_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Grid Area Shadow', 'goodwish'),
            'description'   => esc_html__('Set shadow on grid area', 'goodwish'),
            'parent'        => $menu_area_in_grid_header_standard_extended_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'goodwish'),
                'yes' => esc_html__('Yes', 'goodwish')
            )
        ));

        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_menu_area_background_color_header_standard_extended_meta',
                'type'        => 'color',
                'label'       => esc_html__('Background Color', 'goodwish'),
                'description' => esc_html__('Choose a background color for menu area', 'goodwish'),
                'parent'      => $header_standard_extended_type_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_menu_area_background_transparency_header_standard_extended_meta',
                'type'        => 'text',
                'label'       => esc_html__('Transparency', 'goodwish'),
                'description' => esc_html__('Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent'      => $header_standard_extended_type_meta_container,
                'args'        => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name'          => 'edgtf_menu_area_shadow_header_standard_extended_meta',
            'type'          => 'select',
            'label'         => esc_html__('Menu Area Shadow', 'goodwish'),
            'description'   => esc_html__('Set shadow on menu area', 'goodwish'),
            'parent'        => $header_standard_extended_type_meta_container,
            'default_value' => '',
            'options'       => array(
                ''    => '',
                'no'  => esc_html__('No', 'goodwish'),
                'yes' => esc_html__('Yes', 'goodwish')
            )
        ));

        $header_vertical_type_meta_container = goodwish_edge_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'edgtf_header_vertical_type_meta_container',
                    'hidden_property' => 'edgtf_header_type_meta',
                    'hidden_values' => array('header-standard','header-standard-extended')
                ),
                $temp_array_vertical
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_vertical_header_background_color_meta',
            'type' => 'color',
            'label' => esc_html__('Background Color', 'goodwish'),
            'description' => esc_html__('Set background color for vertical menu', 'goodwish'),
            'parent' => $header_vertical_type_meta_container
        ));

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_vertical_header_transparency_meta',
            'type' => 'text',
            'label' => esc_html__('Transparency', 'goodwish'),
            'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'goodwish'),
            'parent' => $header_vertical_type_meta_container,
            'args' => array(
                'col_width' => 1
            )
        ));

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_background_image_meta',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Background Image', 'goodwish'),
                'description' => esc_html__('Set background image for vertical menu', 'goodwish'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_vertical_header_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Background Image', 'goodwish'),
                'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'goodwish'),
                'parent' => $header_vertical_type_meta_container
            )
        );

        $header_full_screen_type_meta_container = goodwish_edge_add_admin_container(
            array_merge(
                array(
                    'parent' => $header_meta_box,
                    'name' => 'edgtf_header_full_screen_type_meta_container',
                    'hidden_property' => 'edgtf_header_type_meta',

                ),
                $temp_array_full_screen
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'goodwish'),
                'description' => esc_html__('Choose a background color for Full Screen header area', 'goodwish'),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'goodwish'),
                'description' => esc_html__('Choose a transparency for the Full Screen header background color (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__('Border Bottom Color', 'goodwish'),
                'description' => esc_html__('Choose a border bottom color for Full Screen header area', 'goodwish'),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'goodwish'),
                'description' => esc_html__('Choose a transparency for the Full Screen header border bottom color (0 = fully transparent, 1 = opaque)', 'goodwish'),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'parent' => $header_full_screen_type_meta_container,
                'type' => 'select',
                'name' => 'edgtf_menu_area_in_grid_header_full_screen_meta',
                'default_value' => '',
                'label' => esc_html__('Header in grid', 'goodwish'),
                'description' => esc_html__('Set header content to be in grid', 'goodwish'),
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_show_header_widget_area_meta',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Show Header Widget Area', 'goodwish'),
                'description' => esc_html__('Enabling this option will show widget area in header', 'goodwish'),
                'parent' => $header_meta_box
            )
        );

        $goodwish_custom_sidebars = goodwish_edge_get_custom_sidebars();
        if(count($goodwish_custom_sidebars) > 0) {
            goodwish_edge_create_meta_box_field(array(
                'name' => 'edgtf_custom_header_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Custom Widget Area in Header', 'goodwish'),
                'description' => esc_html__('Choose custom widget area to display in header area"', 'goodwish'),
                'parent' => $header_meta_box,
                'options' => $goodwish_custom_sidebars
            ));
        }
        if(count($goodwish_custom_sidebars) > 0) {
            goodwish_edge_create_meta_box_field(array(
                'name' => 'edgtf_custom_sticky_header_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Custom Widget Area in Sticky Header', 'goodwish'),
                'description' => esc_html__('Choose custom widget area to display in sticky header area"', 'goodwish'),
                'parent' => $header_meta_box,
                'options' => $goodwish_custom_sidebars
            ));
        }

        goodwish_edge_add_admin_section_title(array(
            'name' => 'top_bar_section_title',
            'parent' => $header_meta_box,
            'title' => esc_html__('Top Bar', 'goodwish')
        ));

        $top_bar_global_option = goodwish_edge_options()->getOptionValue('top_bar');
        $top_bar_default_dependency = array(
            '' => '#edgtf_top_bar_container_no_style'
        );

        $top_bar_show_array = array(
            'yes' => '#edgtf_top_bar_container_no_style'
        );

        $top_bar_hide_array = array(
            'no' => '#edgtf_top_bar_container_no_style'
        );

        if ($top_bar_global_option === 'yes') {
            $top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_value' => 'no'
            );
        } else {
            $top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
            $temp_top_no = array(
                'hidden_values' => array('', 'no')
            );
        }


        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_meta',
            'type' => 'select',
            'label' => esc_html__('Enable Top Bar on This Page', 'goodwish'),
            'description' => esc_html__('Enabling this option will enable top bar on this page', 'goodwish'),
            'parent' => $header_meta_box,
            'default_value' => '',
            'options' => array(
                '' => esc_html__('Default', 'goodwish'),
                'yes' => esc_html__('Yes', 'goodwish'),
                'no' => esc_html__('No', 'goodwish')
            ),
            'args' => array(
                "dependence" => true,
                'show' => $top_bar_show_array,
                'hide' => $top_bar_hide_array
            )
        ));

        $top_bar_container = goodwish_edge_add_admin_container_no_style(array_merge(array(
            'name' => 'top_bar_container_no_style',
            'parent' => $header_meta_box,
            'hidden_property' => 'edgtf_top_bar_meta'
        ),
            $temp_top_no));

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_skin_meta',
            'type' => 'select',
            'label' => esc_html__('Top Bar Skin', 'goodwish'),
            'options' => array(
                '' => esc_html__('Default', 'goodwish'),
                'light' => esc_html__('Light', 'goodwish'),
                'dark' => esc_html__('Dark', 'goodwish')
            ),
            'parent' => $top_bar_container
        ));

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_background_color_meta',
            'type' => 'color',
            'label' => esc_html__('Top Bar Background Color', 'goodwish'),
            'parent' => $top_bar_container
        ));

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_top_bar_background_transparency_meta',
            'type' => 'text',
            'label' => esc_html__('Top Bar Background Color Transparency', 'goodwish'),
            'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'goodwish'),
            'parent' => $top_bar_container,
            'args' => array(
                'col_width' => 3
            )
        ));
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_header');
}