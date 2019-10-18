<?php

/*** Link Post Format ***/

if(!function_exists('goodwish_edge_map_post_format_link')) {
    function goodwish_edge_map_post_format_link()
    {

        $link_post_format_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Link Post Format', 'goodwish'),
                'name' => 'post_format_link_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_link_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'goodwish'),
                'description' => esc_html__('Enter link', 'goodwish'),
                'parent' => $link_post_format_meta_box,

            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_post_format_link');
}

