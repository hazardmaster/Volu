<?php

if(!function_exists('goodwish_edge_map_sidebar')) {
    function goodwish_edge_map_sidebar()
    {

        $custom_sidebars = goodwish_edge_get_custom_sidebars();

        $sidebar_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post','give_forms'),
                'title' => esc_html__('Sidebar', 'goodwish'),
                'name' => 'sidebar_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_sidebar_meta',
                'type' => 'select',
                'label' => esc_html__('Layout', 'goodwish'),
                'description' => esc_html__('Choose the sidebar layout', 'goodwish'),
                'parent' => $sidebar_meta_box,
                'options' => array(
                    '' => 'Default',
                    'no-sidebar' => esc_html__('No Sidebar', 'goodwish'),
                    'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'goodwish'),
                    'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'goodwish'),
                    'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'goodwish'),
                    'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'goodwish'),
                )
            )
        );

        if (count($custom_sidebars) > 0) {
            goodwish_edge_create_meta_box_field(array(
                'name' => 'edgtf_custom_sidebar_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Choose Widget Area in Sidebar', 'goodwish'),
                'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'goodwish'),
                'parent' => $sidebar_meta_box,
                'options' => $custom_sidebars
            ));
        }
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_sidebar');
}
