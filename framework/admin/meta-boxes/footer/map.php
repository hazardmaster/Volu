<?php

if(!function_exists('goodwish_edge_map_footer')) {
    function goodwish_edge_map_footer()
    {
        $footer_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post','edge-event'),
                'title' => esc_html__('Footer', 'goodwish'),
                'name' => 'footer_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_footer_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Footer for this Page', 'goodwish'),
                'description' => esc_html__('Enabling this option will hide footer on this page', 'goodwish'),
                'parent' => $footer_meta_box,
            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_footer');
}