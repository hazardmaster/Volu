<?php

/*** Gallery Post Format ***/

if(!function_exists('goodwish_edge_map_post_format_gallery')) {
    function goodwish_edge_map_post_format_gallery()
    {

        $gallery_post_format_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Gallery Post Format', 'goodwish'),
                'name' => 'post_format_gallery_meta'
            )
        );

        goodwish_edge_add_multiple_images_field(
            array(
                'name' => 'edgtf_post_gallery_images_meta',
                'label' => esc_html__('Gallery Images', 'goodwish'),
                'description' => esc_html__('Choose your gallery images', 'goodwish'),
                'parent' => $gallery_post_format_meta_box,
            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_post_format_gallery');
}
