<?php

/*** Audio Post Format ***/

if(!function_exists('goodwish_edge_map_post_format_audio')) {
    function goodwish_edge_map_post_format_audio()
    {

        $audio_post_format_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Audio Post Format', 'goodwish'),
                'name' => 'post_format_audio_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_audio_link_meta',
                'type' => 'text',
                'label' => esc_html__('Link', 'goodwish'),
                'description' => esc_html__('Enter audion link', 'goodwish'),
                'parent' => $audio_post_format_meta_box,

            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_post_format_audio');
}
