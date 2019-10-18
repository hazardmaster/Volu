<?php

if ( ! function_exists('goodwish_edge_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function goodwish_edge_woocommerce_options_map() {

		goodwish_edge_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce','goodwish'),
				'icon' => 'fa fa-header'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = goodwish_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_products_list_full_width',
			'type'        	=> 'yesno',
			'label'       	=> esc_html__('Enable Full Width Template','goodwish'),
			'default_value'	=> 'no',
			'description' 	=> esc_html__('Enabling this option will enable full width template for shop page','goodwish'),
			'parent'      	=> $panel_product_list,
		));

		goodwish_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns','goodwish'),
			'default_value'	=> 'edgtf-woocommerce-columns-3',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product','goodwish'),
			'options'		=> array(
				'edgtf-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)','goodwish'),
				'edgtf-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)','goodwish')
			),
			'parent'      	=> $panel_product_list,
		));

		goodwish_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page','goodwish'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page','goodwish'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'        	=> 'edgtf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag','goodwish'),
			'default_value'	=> 'h4',
			'description' 	=> '',
			'options'		=> array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = goodwish_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product','goodwish'),
			)
		);

		goodwish_edge_add_admin_field(array(
			'name'        	=> 'edgtf_single_product_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Single Product Title Tag','goodwish'),
			'default_value'	=> 'h2',
			'description' 	=> '',
			'options'		=> array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6',
			),
			'parent'      	=> $panel_single_product,
		));

		goodwish_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'product_single_navigation',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Prev/Next Single Product Navigation Links','goodwish'),
				'parent' => $panel_single_product,
				'description' => esc_html__('Enable navigation links through the products','goodwish'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_product_single_navigation_container'
				)
			)
		);

		$product_single_navigation_container = goodwish_edge_add_admin_container(
			array(
				'name' => 'edgtf_product_single_navigation_container',
				'hidden_property' => 'product_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_single_product,
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'product_navigation_through_same_category',
				'default_value' => 'yes',
				'label'       => esc_html__('Enable Navigation Only in Current Category','goodwish'),
				'description' => esc_html__('Limit your navigation only through current category','goodwish'),
				'parent'      => $product_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_woocommerce_options_map', 20);

}