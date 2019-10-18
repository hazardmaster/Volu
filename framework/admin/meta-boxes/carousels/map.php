<?php

//Carousels
if(!function_exists('goodwish_edge_map_carousel')) {
    function goodwish_edge_map_carousel()
    {

        $carousel_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'goodwish'),
                'name' => 'carousel_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_carousel_image',
                'type' => 'image',
                'label' => esc_html__('Carousel Image', 'goodwish'),
                'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'goodwish'),
                'parent' => $carousel_meta_box
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_carousel_hover_image',
                'type' => 'image',
                'label' => esc_html__('Carousel Hover Image', 'goodwish'),
                'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'goodwish'),
                'parent' => $carousel_meta_box
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_carousel_item_link',
                'type' => 'text',
                'label' => esc_html__('Link', 'goodwish'),
                'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'goodwish'),
                'parent' => $carousel_meta_box
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_carousel_item_target',
                'type' => 'selectblank',
                'label' => esc_html__('Target', 'goodwish'),
                'description' => esc_html__('Specify where to open the linked document', 'goodwish'),
                'parent' => $carousel_meta_box,
                'options' => array(
                    '_self' => 'Self',
                    '_blank' => 'Blank'
                )
            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_carousel');
}