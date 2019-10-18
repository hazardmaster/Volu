<?php

if(!function_exists('goodwish_edge_map_events_meta_fields')) {

	function goodwish_edge_map_events_meta_fields() {

		$event_meta_box = goodwish_edge_create_meta_box(
			array(
				'scope' => array('edge-event'),
				'title' => esc_html__('Event','goodwish'),
				'name' => 'event_meta'
			)
		);
		
		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_event_layout_meta',
				'type' => 'select',
				'label' => esc_html__('Layout', 'goodwish'),
				'description' => esc_html__('Choose layout', 'goodwish'),
				'parent' => $event_meta_box,
				'options'     => array(
					'' => esc_html__('Default','goodwish'),
					'custom' => esc_html__('Custom Layout','goodwish')
				)
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_event_subtitle',
				'type' => 'text',
				'label' => esc_html__('Subtitle', 'goodwish'),
				'description' => esc_html__('Enter the subtitle', 'goodwish'),
				'parent' => $event_meta_box,
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_event_location',
				'type' => 'text',
				'label' => esc_html__('Location', 'goodwish'),
				'description' => esc_html__('Enter the location of event', 'goodwish'),
				'parent' => $event_meta_box,
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_event_start_date',
				'type' => 'date',
				'label' => esc_html__('Start Date', 'goodwish'),
				'description' => esc_html__('Enter the start date for event', 'goodwish'),
				'parent' => $event_meta_box,
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_event_end_date',
				'type' => 'date',
				'label' => esc_html__('End Date', 'goodwish'),
				'description' => esc_html__('Enter the end date for event, if end date not set, start date is used instead', 'goodwish'),
				'parent' => $event_meta_box,
			)
		);

		goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_event_start_time',
                'type'        => 'text',
                'label'       => esc_html__('Start Time','goodwish'),
                'description' => esc_html__('Please input the time in a HH:MM format. If you are using a 12 hour time format, please also input AM or PM markers.','goodwish'),
                'parent'      => $event_meta_box
            )
        );

        goodwish_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_event_end_time',
                'type'        => 'text',
                'label'       => esc_html__('End Time','goodwish'),
                'description' => esc_html__('Please input the time in a HH:MM format. If you are using a 12 hour time format, please also input AM or PM markers.','goodwish'),
                'parent'      => $event_meta_box
            )
        );

		goodwish_edge_add_multiple_images_field(
			array(
				'name'        => 'edgtf_event_images',
				'label'       => esc_html__('Images', 'goodwish'),
				'description' => esc_html__('Choose images', 'goodwish'),
				'parent'      => $event_meta_box,
			)
		);

		goodwish_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_event_images_layout_meta',
				'type' => 'select',
				'label' => esc_html__('Images Layout', 'goodwish'),
				'description' => esc_html__('Choose images layout', 'goodwish'),
				'parent' => $event_meta_box,
				'options'     => array(
					'' => esc_html__('Default','goodwish'),
					'slider' => esc_html__('Slider','goodwish'),
					'gallery' => esc_html__('Gallery','goodwish')
				)
			)
		);

		goodwish_edge_add_admin_section_title(
			array(
				'name'   => 'event_additional_info_title',
				'parent' => $event_meta_box,
				'title'  => esc_html__('Additional Info','goodwish')
			)
		);

		goodwish_edge_add_repeater_field(array(
				'name'        => 'edgtf_event_additional_info',
				'parent'      => $event_meta_box,
				'button_text' => esc_html__('Add Event Info','goodwish'),
				'fields'      => array(
					array(
						'type'        => 'textsimple',
						'name'        => 'edgtf_event_title',
						'label'       => esc_html__('Info Title','goodwish')
					),
					array(
						'type'        => 'textsimple',
						'name'        => 'edgtf_event_description',
						'label'       => esc_html__('Info Description','goodwish')
					)
				)
			)
		);
	}
	
	add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_map_events_meta_fields');
}