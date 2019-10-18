<?php

if ( ! function_exists('goodwish_edge_page_options_map') ) {

    function goodwish_edge_page_options_map() {

        goodwish_edge_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'goodwish'),
                'icon'  => 'fa fa-file-o'
            )
        );

        $custom_sidebars = goodwish_edge_get_custom_sidebars();

        $panel_sidebar = goodwish_edge_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'goodwish')
            )
        );

        goodwish_edge_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'goodwish'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'goodwish'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'goodwish'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'goodwish'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'goodwish'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'goodwish'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'goodwish')
            )
        ));


        if(count($custom_sidebars) > 0) {
            goodwish_edge_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'goodwish'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'goodwish'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

        goodwish_edge_add_admin_field(array(
            'name'        => 'page_show_comments',
            'type'        => 'yesno',
            'label'       => esc_html__('Show Comments', 'goodwish'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'goodwish'),
            'default_value' => 'yes',
            'parent'      => $panel_sidebar
        ));

    }

    add_action( 'goodwish_edge_options_map', 'goodwish_edge_page_options_map', 8);

}