<?php

/*** Quote Post Format ***/
if(!function_exists('goodwish_edge_map_post_format_quote')) {
    function goodwish_edge_map_post_format_quote()
    {

        $quote_post_format_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Quote Post Format', 'goodwish'),
                'name' => 'post_format_quote_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_quote_text_meta',
                'type' => 'text',
                'label' => esc_html__('Quote Text', 'goodwish'),
                'description' => esc_html__('Enter Quote text', 'goodwish'),
                'parent' => $quote_post_format_meta_box,

            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_post_format_quote');
}
