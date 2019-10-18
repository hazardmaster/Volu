<?php

if(!function_exists('goodwish_edge_map_portfolio_settings')) {
    function goodwish_edge_map_portfolio_settings() {
        $meta_box = goodwish_edge_create_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'goodwish'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        goodwish_edge_create_meta_box_field(array(
            'name'        => 'edgtf_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'goodwish'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'goodwish'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'goodwish'),
                'small-images'      => esc_html__('Portfolio small images', 'goodwish'),
                'small-slider'      => esc_html__('Portfolio small slider', 'goodwish'),
                'big-images'        => esc_html__('Portfolio big images', 'goodwish'),
                'big-slider'        => esc_html__('Portfolio big slider', 'goodwish'),
                'gallery'           => esc_html__('Portfolio gallery', 'goodwish'),
                'small-masonry'     => esc_html__('Portfolio small masonry', 'goodwish'),
                'big-masonry'       => esc_html__('Portfolio big masonry', 'goodwish'),
                'custom'            => esc_html__('Portfolio custom', 'goodwish'),
                'full-width-custom' => esc_html__('Portfolio full width custom', 'goodwish')
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        goodwish_edge_create_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'selectblank',
            'label'       => esc_html__('"Back To" Link', 'goodwish'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'goodwish'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        goodwish_edge_create_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'goodwish'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'goodwish'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        goodwish_edge_create_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'goodwish'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'goodwish'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'goodwish'),
                'large_width'        => esc_html__('Large width', 'goodwish'),
                'large_height'       => esc_html__('Large height', 'goodwish'),
                'large_width_height' => esc_html__('Large width/height', 'goodwish')
            )
        ));
    }

    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_portfolio_settings');
}