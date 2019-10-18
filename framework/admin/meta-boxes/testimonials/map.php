<?php

//Testimonials

if(!function_exists('goodwish_edge_map_testimonials')) {
    function goodwish_edge_map_testimonials()
    {

        $testimonial_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('testimonials'),
                'title' => esc_html__('Testimonial', 'goodwish'),
                'name' => 'testimonial_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_title',
                'type' => 'text',
                'label' => esc_html__('Title', 'goodwish'),
                'description' => esc_html__('Enter testimonial title', 'goodwish'),
                'parent' => $testimonial_meta_box,
            )
        );


        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_author',
                'type' => 'text',
                'label' => esc_html__('Author', 'goodwish'),
                'description' => esc_html__('Enter author name', 'goodwish'),
                'parent' => $testimonial_meta_box,
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_author_position',
                'type' => 'text',
                'label' => esc_html__('Job Position', 'goodwish'),
                'description' => esc_html__('Enter job position', 'goodwish'),
                'parent' => $testimonial_meta_box,
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_testimonial_text',
                'type' => 'text',
                'label' => esc_html__('Text', 'goodwish'),
                'description' => esc_html__('Enter testimonial text', 'goodwish'),
                'parent' => $testimonial_meta_box,
            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_testimonials');
}