<?php

if(!function_exists('goodwish_edge_map_blog')) {
    function goodwish_edge_map_blog()
    {

        $edgt_blog_categories = array();
        $categories = get_categories();
        foreach ($categories as $category) {
            $edgt_blog_categories[$category->slug] = $category->name;
        }

        $blog_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'goodwish'),
                'name' => 'blog_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_blog_category_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Blog Category', 'goodwish'),
                'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'goodwish'),
                'parent' => $blog_meta_box,
                'options' => $edgt_blog_categories
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_show_posts_per_page_meta',
                'type' => 'text',
                'label' => esc_html__('Number of Posts', 'goodwish'),
                'description' => esc_html__('Enter the number of posts to display', 'goodwish'),
                'parent' => $blog_meta_box,
                'options' => $edgt_blog_categories,
                'args' => array("col_width" => 3)
            )
        );
    }

    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_blog');
}
	

