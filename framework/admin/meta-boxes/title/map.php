<?php


if(!function_exists('goodwish_edge_map_title')) {
    function goodwish_edge_map_title()
    {
        $title_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post','edge-event','give_forms'),
                'title' => esc_html__('Title', 'goodwish'),
                'name' => 'title_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'goodwish'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'goodwish'),
                'parent' => $title_meta_box,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "#edgtf_edgtf_show_title_area_meta_container",
                        "yes" => ""
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_show_title_area_meta_container",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_show_title_area_meta_container"
                    )
                )
            )
        );

        $show_title_area_meta_container = goodwish_edge_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'edgtf_show_title_area_meta_container',
                'hidden_property' => 'edgtf_show_title_area_meta',
                'hidden_value' => 'no'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'goodwish'),
                'description' => esc_html__('Choose title type', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__('Standard', 'goodwish'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'goodwish')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "breadcrumb" => "#edgtf_edgtf_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_type_meta_container",
                        "standard" => "#edgtf_edgtf_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = goodwish_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_title_area_type_meta_container',
                'hidden_property' => 'edgtf_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_enable_breadcrumbs_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Breadcrumbs', 'goodwish'),
                'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'goodwish'),
                'parent' => $title_area_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                ),
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_enable_separator_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Separator', 'goodwish'),
                'description' => esc_html__('This option will display Separator in Title Area', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Animations', 'goodwish'),
                'description' => esc_html__('Choose an animation for Title Area', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No Animation', 'goodwish'),
                    'right-left' => esc_html__('Text right to left', 'goodwish'),
                    'left-right' => esc_html__('Text left to right', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'goodwish'),
                'description' => esc_html__('Specify title vertical alignment', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__('From Bottom of Header', 'goodwish'),
                    'window_top' => esc_html__('From Window Top', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Horizontal Alignment', 'goodwish'),
                'description' => esc_html__('Specify title horizontal alignment', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__('Left', 'goodwish'),
                    'center' => esc_html__('Center', 'goodwish'),
                    'right' => esc_html__('Right', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_text_size_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Text Size', 'goodwish'),
                'description' => esc_html__('Choose a default Title size', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'large' => esc_html__('Large', 'goodwish'),
                    'medium' => esc_html__('Medium', 'goodwish'),
                    'small' => esc_html__('Small', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'goodwish'),
                'description' => esc_html__('Choose a color for title text', 'goodwish'),
                'parent' => $show_title_area_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__('Breadcrumb Color', 'goodwish'),
                'description' => esc_html__('Choose a color for breadcrumb text', 'goodwish'),
                'parent' => $show_title_area_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'goodwish'),
                'description' => esc_html__('Choose a background color for Title Area', 'goodwish'),
                'parent' => $show_title_area_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'goodwish'),
                'description' => esc_html__('Enable this option to hide background image in Title Area', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#edgtf_edgtf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = goodwish_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_hide_background_image_meta_container',
                'hidden_property' => 'edgtf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'goodwish'),
                'description' => esc_html__('Choose an Image for Title Area', 'goodwish'),
                'parent' => $hide_background_image_meta_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'goodwish'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'goodwish'),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "no" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = goodwish_edge_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'edgtf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'edgtf_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_parallax_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image in Parallax', 'goodwish'),
                'description' => esc_html__('Enabling this option will make Title background image parallax', 'goodwish'),
                'parent' => $title_area_background_image_responsive_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish'),
                    'yes_zoom' => esc_html__('Yes, with zoom out', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'goodwish'),
            'description' => esc_html__('Set a height for Title Area', 'goodwish'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_border_bottom_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Border Bottom', 'goodwish'),
                'description' => esc_html__('This option will display Border Bottom in Title Area', 'goodwish'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'goodwish'),
                    'yes' => esc_html__('Yes', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text', 'goodwish'),
            'description' => esc_html__('Enter your subtitle text', 'goodwish'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'goodwish'),
                'description' => esc_html__('Choose a color for subtitle text', 'goodwish'),
                'parent' => $show_title_area_meta_container
            )
        );
    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_title');
}