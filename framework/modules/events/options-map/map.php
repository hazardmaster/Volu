<?php

if ( ! function_exists('goodwish_edge_event_options_map') ) {

	function goodwish_edge_event_options_map() {

		goodwish_edge_add_admin_page(array(
			'slug'  => '_event',
			'title' => esc_html__('Event','goodwish'),
			'icon'  => 'fa fa-calendar-o'
		));

		$panel = goodwish_edge_add_admin_panel(array(
			'title' => esc_html__('Event Single','goodwish'),
			'name'  => 'panel_event_single',
			'page'  => '_event'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'event_single_show_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Categories in Info','goodwish'),
			'description'   => esc_html__('Enabling this option will enable category meta description on Single Events.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'event_single_show_location',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Location','goodwish'),
			'description'   => esc_html__('Enabling this option will enable location meta on Single Event.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'event_single_date_showing',
			'type'          => 'select',
			'label'         => esc_html__('Date Showing','goodwish'),
			'description'   => esc_html__('Choose how will date info be shown on Single Event','goodwish'),
			'parent'        => $panel,
			'default_value' => 'start_duration',
			'options'		=> array(
				'start_duration' => esc_html__('Start Date and Duration','goodwish'),
				'start_end' => esc_html__('Start and End Date','goodwish'),
				'none' => esc_html__('None','goodwish'),
			)
		));

		goodwish_edge_add_admin_field(array(
			'name' => 'event_images_layout',
			'type' => 'select',
			'label' => esc_html__('Images Layout', 'goodwish'),
			'description' => esc_html__('Choose images layout', 'goodwish'),
			'parent' => $panel,
			'default_value' => 'gallery',
			'options'     => array(
				'gallery' => esc_html__('Gallery','goodwish'),
				'slider' => esc_html__('Slider','goodwish'),
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'event_single_show_related',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Related Event','goodwish'),
			'description'   => esc_html__('Enabling this option will show related events on your page.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

        goodwish_edge_add_admin_field(array(
            'name'          => 'event_single_comments',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Comments','goodwish'),
            'description'   => esc_html__('Enabling this option will show comments on your event.','goodwish'),
            'parent'        => $panel,
            'default_value' => 'no'
        ));

		goodwish_edge_add_admin_field(array(
			'name'          => 'event_single_show_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Pagination','goodwish'),
			'description'   => esc_html__('Enabling this option will turn on event pagination functionality.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_show_on_yes' => '#edgtf_navigate_same_category_container',
				'dependence_hide_on_yes' => ''
			)
		));

		$container_navigate_category = goodwish_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'event_single_show_pagination',
			'hidden_value'    => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'            => 'event_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category','goodwish'),
			'description'     => esc_html__('Enabling this option will make event pagination sort through current category.','goodwish'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'event_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Event Single Slug','goodwish'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)','goodwish'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_event_options_map', 13);

}