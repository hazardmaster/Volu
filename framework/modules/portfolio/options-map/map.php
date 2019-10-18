<?php

if ( ! function_exists('goodwish_edge_portfolio_options_map') ) {

	function goodwish_edge_portfolio_options_map() {

		goodwish_edge_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio','goodwish'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = goodwish_edge_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single','goodwish'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type','goodwish'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages','goodwish'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio small images','goodwish'),
				'small-slider' => esc_html__('Portfolio small slider','goodwish'),
				'big-images' => esc_html__('Portfolio big images','goodwish'),
				'big-slider' => esc_html__('Portfolio big slider','goodwish'),
				'small-masonry' => esc_html__('Portfolio small masonry','goodwish'),
				'big-masonry' => esc_html__('Portfolio big masonry','goodwish'),
				'gallery' => esc_html__('Portfolio gallery','goodwish'),
				'custom' => esc_html__('Portfolio custom','goodwish'),
				'full-width-custom' => esc_html__('Portfolio full width custom','goodwish'),
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images','goodwish'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos','goodwish'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_title',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Portfolio Title','goodwish'),
			'description'   => esc_html__('Enabling this option will disable title on Single Projects.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories','goodwish'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date','goodwish'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','goodwish'),
			'description'   => esc_html__('Enabling this option will show comments on your page.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text','goodwish'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages','goodwish'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		goodwish_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination','goodwish'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.','goodwish'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#edgtf_navigate_same_category_container'
			)
		));

		$container_navigate_category = goodwish_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		goodwish_edge_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category','goodwish'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category.','goodwish'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns','goodwish'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for Portfolio Gallery type','goodwish'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 columns','goodwish'),
				'three-columns' => esc_html__('3 columns','goodwish'),
				'four-columns' => esc_html__('4 columns','goodwish'),
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug','goodwish'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)','goodwish'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_portfolio_options_map', 13);

}