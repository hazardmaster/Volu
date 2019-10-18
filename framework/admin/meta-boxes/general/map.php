<?php

if(!function_exists('goodwish_edge_map_general')) {
    function goodwish_edge_map_general()
    {
        $general_meta_box = goodwish_edge_create_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post','edge-event'),
                'title' => esc_html__('General', 'goodwish'),
                'name' => 'general_meta'
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_smooth_page_transitions_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Smooth Page Transitions', 'goodwish' ),
                'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'goodwish' ),
                'parent'        => $general_meta_box,
                'options'     => array(
                    '' => '',
                    'yes' => esc_html__('Yes','goodwish'),
                    'no' => esc_html__('No','goodwish'),
                ),
                'args'          => array(
                    "dependence"             => true,
                    "hide"       => array(
                        ""    => "#edgtf_page_transitions_container_meta",
                        "no"  => "#edgtf_page_transitions_container_meta",
                        "yes" => ""
                    ),
                    "show"       => array(
                        ""    => "",
                        "no"  => "",
                        "yes" => "#edgtf_page_transitions_container_meta"
                    )
                )
            )
        );

        $page_transitions_container_meta = goodwish_edge_add_admin_container(
            array(
                'parent'          => $general_meta_box,
                'name'            => 'page_transitions_container_meta',
                'hidden_property' => 'edgtf_smooth_page_transitions_meta',
                'hidden_values'   => array('','no')
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_page_transition_preloader_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Enable Preloading Animation', 'goodwish' ),
                'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'goodwish' ),
                'parent'        => $page_transitions_container_meta,
                'options'       => array(
                    '' => '',
                    'yes' => esc_html__('Yes','goodwish'),
                    'no' => esc_html__('No','goodwish'),
                ),
                'args'          => array(
                    "dependence"             => true,
                    "hide"       => array(
                        ""    => "#edgtf_page_transition_preloader_container_meta",
                        "no"  => "#edgtf_page_transition_preloader_container_meta",
                        "yes" => ""
                    ),
                    "show"       => array(
                        ""    => "",
                        "no"  => "",
                        "yes" => "#edgtf_page_transition_preloader_container_meta"
                    )
                )
            )
        );

        $page_transition_preloader_container_meta = goodwish_edge_add_admin_container(
            array(
                'parent'          => $page_transitions_container_meta,
                'name'            => 'page_transition_preloader_container_meta',
                'hidden_property' => 'edgtf_page_transition_preloader_meta',
                'hidden_values'   => array('','no')
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'   => 'edgtf_smooth_pt_bgnd_color_meta',
                'type'   => 'color',
                'label'  => esc_html__( 'Page Loader Background Color', 'goodwish' ),
                'parent' => $page_transition_preloader_container_meta
            )
        );

        $group_pt_spinner_animation_meta = goodwish_edge_add_admin_group(
            array(
                'name'        => 'group_pt_spinner_animation_meta',
                'title'       => esc_html__( 'Loader Style', 'goodwish' ),
                'description' => esc_html__( 'Define styles for loader spinner animation', 'goodwish' ),
                'parent'      => $page_transition_preloader_container_meta
            )
        );

        $row_pt_spinner_animation_meta = goodwish_edge_add_admin_row(
            array(
                'name'   => 'row_pt_spinner_animation_meta',
                'parent' => $group_pt_spinner_animation_meta
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'type'          => 'selectsimple',
                'name'          => 'edgtf_smooth_pt_spinner_type_meta',
                'default_value' => '',
                'label'         => esc_html__( 'Spinner Type', 'goodwish' ),
                'parent'        => $row_pt_spinner_animation_meta,
                'options'       => array(
                    'heart'                 => esc_html__( 'Heart', 'goodwish' ),
                    'pulse'                 => esc_html__( 'Pulse', 'goodwish' ),
                    'double_pulse'          => esc_html__( 'Double Pulse', 'goodwish' ),
                    'cube'                  => esc_html__( 'Cube', 'goodwish' ),
                    'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'goodwish' ),
                    'stripes'               => esc_html__( 'Stripes', 'goodwish' ),
                    'wave'                  => esc_html__( 'Wave', 'goodwish' ),
                    'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'goodwish' ),
                    'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'goodwish' ),
                    'atom'                  => esc_html__( 'Atom', 'goodwish' ),
                    'clock'                 => esc_html__( 'Clock', 'goodwish' ),
                    'mitosis'               => esc_html__( 'Mitosis', 'goodwish' ),
                    'lines'                 => esc_html__( 'Lines', 'goodwish' ),
                    'fussion'               => esc_html__( 'Fussion', 'goodwish' ),
                    'wave_circles'          => esc_html__( 'Wave Circles', 'goodwish' ),
                    'pulse_circles'         => esc_html__( 'Pulse Circles', 'goodwish' )
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'type'          => 'colorsimple',
                'name'          => 'edgtf_smooth_pt_spinner_color_meta',
                'default_value' => '',
                'label'         => esc_html__( 'Spinner Color', 'goodwish' ),
                'parent'        => $row_pt_spinner_animation_meta
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_page_transition_fadeout_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Enable Fade Out Animation', 'goodwish' ),
                'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'goodwish' ),
                'options'       => array(
                    '' => '',
                    'yes' => esc_html__('Yes','goodwish'),
                    'no' => esc_html__('No','goodwish'),
                ),
                'parent'        => $page_transitions_container_meta

            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_background_color_meta',
                'type' => 'color',
                'default_value' => '',
                'label' => esc_html__('Page Background Color', 'goodwish'),
                'description' => esc_html__('Choose background color for page content', 'goodwish'),
                'parent' => $general_meta_box
            )
        );

        $edgtf_content_padding_group = goodwish_edge_add_admin_group(array(
            'name' => 'content_padding_group',
            'title' => esc_html__('Content Style', 'goodwish'),
            'description' => esc_html__('Define styles for Content area', 'goodwish'),
            'parent' => $general_meta_box
        ));

        $edgtf_content_padding_row = goodwish_edge_add_admin_row(array(
            'name' => 'edgtf_content_padding_row',
            'next' => true,
            'parent' => $edgtf_content_padding_group
        ));

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Top Padding', 'goodwish'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );
        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_right_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Right Padding', 'goodwish'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );
        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_bottom_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Bottom Padding', 'goodwish'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );
        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_left_padding',
                'type' => 'textsimple',
                'default_value' => '',
                'label' => esc_html__('Content Left Padding', 'goodwish'),
                'parent' => $edgtf_content_padding_row,
                'args' => array(
                    'suffix' => 'px'
                )
            )
        );

        $edgtf_content_padding_row2 = goodwish_edge_add_admin_row(array(
            'name' => 'edgtf_content_padding_row2',
            'next' => true,
            'parent' => $edgtf_content_padding_group
        ));

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_content_top_padding_mobile',
                'type' => 'selectblanksimple',
                'label' => esc_html__('Set this top padding for mobile header', 'goodwish'),
                'parent' => $edgtf_content_padding_row2,
                'options' => array(
                    'yes' => esc_html__('Yes', 'goodwish'),
                    'no' => esc_html__('No', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(array(
            'name' => 'edgtf_overlapping_content_enable_meta',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__('Enable Overlapping Content', 'goodwish'),
            'description' => esc_html__('Enabling this option will make content overlap title area', 'goodwish'),
            'parent' => $general_meta_box
        ));

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_slider_meta',
                'type' => 'text',
                'default_value' => '',
                'label' => esc_html__('Slider Shortcode', 'goodwish'),
                'description' => esc_html__('Paste your slider shortcode here', 'goodwish'),
                'parent' => $general_meta_box
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_transition_type',
                'type' => 'selectblank',
                'label' => esc_html__('Page Transition', 'goodwish'),
                'description' => esc_html__('Choose the type of transition to this page', 'goodwish'),
                'parent' => $general_meta_box,
                'default_value' => '',
                'options' => array(
                    'no-animation' => esc_html__('No animation', 'goodwish'),
                    'fade' => esc_html__('Fade', 'goodwish')
                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_page_comments_meta',
                'type' => 'selectblank',
                'label' => esc_html__('Show Comments', 'goodwish'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'goodwish'),
                'parent' => $general_meta_box,
                'options' => array(
                    'yes' => esc_html__('Yes', 'goodwish'),
                    'no' => esc_html__('No', 'goodwish')
                )
            )
        );

        $boxed_option      = goodwish_edge_options()->getOptionValue('boxed');
        $boxed_default_dependency = array(
            '' => '#edgtf_boxed_container'
        );

        $boxed_show_array = array(
            'yes' => '#edgtf_boxed_container'
        );

        $boxed_hide_array = array(
            'no' => '#edgtf_boxed_container'
        );

        if($boxed_option === 'yes') {
            $boxed_show_array = array_merge($boxed_show_array, $boxed_default_dependency);
            $temp_boxed_no = array(
                'hidden_value' => 'no'
            );
        } else {
            $boxed_hide_array = array_merge($boxed_hide_array, $boxed_default_dependency);
            $temp_boxed_no = array(
                'hidden_values'   => array('','no')
            );
        }

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_meta',
                'type'          => 'select',
                'label'         => esc_html__('Boxed Layout', 'goodwish'),
                'description'   => '',
                'parent'        => $general_meta_box,
                'default_value' => '',
                'options'     => array(
                    ''      => esc_html__('Default', 'goodwish'),
                    'yes'   => esc_html__('Yes', 'goodwish'),
                    'no'    => esc_html__('No', 'goodwish')
                ),
                'args' => array(
                    "dependence" => true,
                    'show'       => $boxed_show_array,
                    'hide'       => $boxed_hide_array
                )
            )
        );

        $boxed_container = goodwish_edge_add_admin_container(
            array_merge(
                array(
                    'parent'            => $general_meta_box,
                    'name'              => 'boxed_container',
                    'hidden_property'   => 'edgtf_boxed_meta'
                ),
                $temp_boxed_no
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_page_background_color_in_box_meta',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'goodwish'),
                'description'   => esc_html__('Choose the page background color outside box.', 'goodwish'),
                'parent'        => $boxed_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_background_image_meta',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'goodwish'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'goodwish'),
                'parent'        => $boxed_container
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_background_image_repeating_meta',
                'type'          => 'select',
                'default_value' => 'no',
                'label'         => esc_html__('Use Background Image as Pattern', 'goodwish'),
                'description'   => esc_html__('Set this option to "yes" to use the background image as repeating pattern', 'goodwish'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'no'    =>  esc_html__('No', 'goodwish'),
                    'yes'   =>  esc_html__('Yes', 'goodwish')

                )
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_boxed_background_image_attachment_meta',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Behaviour', 'goodwish'),
                'description'   => esc_html__('Choose background image behaviour', 'goodwish'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => esc_html__('Fixed', 'goodwish'),
                    'scroll'    => esc_html__('Scroll', 'goodwish')
                )
            )
        );

    }
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_general');
}