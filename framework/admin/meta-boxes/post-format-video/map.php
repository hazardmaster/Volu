<?php

/*** Video Post Format ***/

if(!function_exists('goodwish_edge_map_post_format_video')) {
    function goodwish_edge_map_post_format_video()
    {

        $video_post_format_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('post'),
                'title' => esc_html__('Video Post Format', 'goodwish'),
                'name' => 'post_format_video_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_video_type_meta',
                'type' => 'select',
                'label' => esc_html__('Video Type', 'goodwish'),
                'description' => esc_html__('Choose video type', 'goodwish'),
                'parent' => $video_post_format_meta_box,
                'default_value' => 'youtube',
                'options' => array(
                    'youtube' => esc_html__('Youtube', 'goodwish'),
                    'vimeo' => esc_html__('Vimeo', 'goodwish'),
                    'self' => esc_html__('Self Hosted', 'goodwish')
                ),
                'args' => array(
                    'dependence' => true,
                    'hide' => array(
                        'youtube' => '#edgtf_edgtf_video_self_hosted_container',
                        'vimeo' => '#edgtf_edgtf_video_self_hosted_container',
                        'self' => '#edgtf_edgtf_video_embedded_container'
                    ),
                    'show' => array(
                        'youtube' => '#edgtf_edgtf_video_embedded_container',
                        'vimeo' => '#edgtf_edgtf_video_embedded_container',
                        'self' => '#edgtf_edgtf_video_self_hosted_container')
                )
            )
        );

        $edgtf_video_embedded_container = goodwish_edge_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_embedded_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_value' => 'self'
            )
        );

        $edgtf_video_self_hosted_container = goodwish_edge_add_admin_container(
            array(
                'parent' => $video_post_format_meta_box,
                'name' => 'edgtf_video_self_hosted_container',
                'hidden_property' => 'edgtf_video_type_meta',
                'hidden_values' => array('youtube', 'vimeo')
            )
        );


        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_id_meta',
                'type' => 'text',
                'label' => esc_html__('Video ID', 'goodwish'),
                'description' => esc_html__('Enter Video ID', 'goodwish'),
                'parent' => $edgtf_video_embedded_container,

            )
        );


        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_image_meta',
                'type' => 'image',
                'label' => esc_html__('Video Image', 'goodwish'),
                'description' => esc_html__('Upload video image', 'goodwish'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_webm_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video WEBM', 'goodwish'),
                'description' => esc_html__('Enter video URL for WEBM format', 'goodwish'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_mp4_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video MP4', 'goodwish'),
                'description' => esc_html__('Enter video URL for MP4 format', 'goodwish'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_post_video_ogv_link_meta',
                'type' => 'text',
                'label' => esc_html__('Video OGV', 'goodwish'),
                'description' => esc_html__('Enter video URL for OGV format', 'goodwish'),
                'parent' => $edgtf_video_self_hosted_container,

            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_post_format_video');
}