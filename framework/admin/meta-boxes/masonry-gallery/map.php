<?php

//Masonry Gallery

if(!function_exists('goodwish_edge_map_masonry_gallery')) {
    function goodwish_edge_map_masonry_gallery()
    {

		$masonry_gallery_meta_box = goodwish_edge_create_meta_box(
			array(
				'scope' => array('masonry-gallery'),
				'title' => esc_html__('Masonry Gallery General', 'goodwish'),
				'name' => 'masonry_gallery_meta'
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_subtitle',
				'type' => 'text',
				'label' => esc_html__('Subtitle', 'goodwish'),
				'parent' => $masonry_gallery_meta_box
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_link',
				'type' => 'text',
				'label' => esc_html__('Link', 'goodwish'),
				'parent' => $masonry_gallery_meta_box
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_link_target',
				'type' => 'select',
				'default_value' => '_self',
				'label' => esc_html__('Link target', 'goodwish'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'_self' => esc_html__('Self', 'goodwish'),
					'_blank' => esc_html__('Blank', 'goodwish')
				)
			)
		);

		goodwish_edge_add_admin_section_title(array(
			'name'   => 'edgtf_section_style_title',
			'parent' => $masonry_gallery_meta_box,
			'title'  => esc_html__('Masonry Gallery Item Style', 'goodwish')
		));

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_size',
				'type' => 'select',
				'default_value' => 'square-small',
				'label' => esc_html__('Size', 'goodwish'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'square-small'			=> esc_html__('Square Small', 'goodwish'),
					'square-big'			=> esc_html__('Square Big', 'goodwish'),
					'rectangle-portrait'	=> esc_html__('Rectangle Portrait', 'goodwish'),
					'rectangle-landscape'	=> esc_html__('Rectangle Landscape', 'goodwish')
				)
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Type', 'goodwish'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'standard'		=> esc_html__('Standard', 'goodwish'),
					'text-info'	=> esc_html__('Text Info', 'goodwish'),
					'simple'		=> esc_html__('Simple', 'goodwish')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'text-info' => '#edgtf_masonry_gallery_item_standard_type_container, #edgtf_masonry_gallery_item_simple_type_container',
						'simple' => '#edgtf_masonry_gallery_item_standard_type_container, #edgtf_masonry_gallery_item_text_info_type_container',
						'standard' => '#edgtf_masonry_gallery_item_simple_type_container, #edgtf_masonry_gallery_item_text_info_type_container',
					),
					'show' => array(
						'text-info' => '#edgtf_masonry_gallery_item_text_info_type_container',
						'simple' => '#edgtf_masonry_gallery_item_simple_type_container',
						'standard' => '#edgtf_masonry_gallery_item_standard_type_container'
					)
				)
			)
		);

		$masonry_gallery_item_text_info_type_container = goodwish_edge_add_admin_container_no_style(array(
			'name'				=> 'masonry_gallery_item_text_info_type_container',
			'parent'			=> $masonry_gallery_meta_box,
			'hidden_property'	=> 'edgtf_masonry_gallery_item_type',
			'hidden_values'		=> array('standard', 'simple')
		));

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_item_text',
				'type' => 'text',
				'label' => esc_html__('Text', 'goodwish'),
				'parent' => $masonry_gallery_item_text_info_type_container
			)
		);
		$masonry_gallery_item_standard_type_container = goodwish_edge_add_admin_container_no_style(array(
			'name'				=> 'masonry_gallery_item_standard_type_container',
			'parent'			=> $masonry_gallery_meta_box,
			'hidden_property'	=> 'edgtf_masonry_gallery_item_type',
			'hidden_values'		=> array('text-info', 'simple')
		));

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_enable_hover',
				'type' => 'select',
				'label' => esc_html__('Enable Hover', 'goodwish'),
				'options' => array(
					'yes'		=> esc_html__('Yes', 'goodwish'),
					'no'		=> esc_html__('No', 'goodwish')
				),
				'parent' => $masonry_gallery_item_standard_type_container,
				'description' => esc_html__('Enable this option if you would like to display text content on hover', 'goodwish')
			)
		);

		$masonry_gallery_item_simple_type_container = goodwish_edge_add_admin_container_no_style(array(
			'name'				=> 'masonry_gallery_item_simple_type_container',
			'parent'			=> $masonry_gallery_meta_box,
			'hidden_property'	=> 'edgtf_masonry_gallery_item_type',
			'hidden_values'		=> array('text-info', 'standard')
		));

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_masonry_gallery_text_alignment',
				'type' => 'select',
				'label' => esc_html__('Text Alignment', 'goodwish'),
				'options' => array(
					'left'		=> esc_html__('Left', 'goodwish'),
					'center'	=> esc_html__('Center', 'goodwish'),
					'right'		=> esc_html__('Right', 'goodwish')
				),
				'parent' => $masonry_gallery_item_simple_type_container
			)
		);

		}
    add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_masonry_gallery');
}