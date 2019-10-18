<?php

if ( ! function_exists('goodwish_edge_blog_options_map') ) {

	function goodwish_edge_blog_options_map() {

		goodwish_edge_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog','goodwish'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = goodwish_edge_get_custom_sidebars();

		$panel_blog_lists = goodwish_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists','goodwish')
			)
		);

		goodwish_edge_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages','goodwish'),
			'description' => esc_html__('Choose a default blog layout','goodwish'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'				=> esc_html__('Blog: Standard','goodwish'),
				'split-column'			=> esc_html__('Blog: Split Column','goodwish'),
				'masonry' 				=> esc_html__('Blog: Masonry','goodwish'),
				'masonry-full-width' 	=> esc_html__('Blog: Masonry Full Width','goodwish'),
				'standard-whole-post' 	=> esc_html__('Blog: Standard Whole Post','goodwish'),
			)
		));

		goodwish_edge_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar','goodwish'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists','goodwish'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar','goodwish'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right','goodwish'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right','goodwish'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left','goodwish'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left','goodwish'),
			)
		));


		if(count($custom_sidebars) > 0) {
			goodwish_edge_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display','goodwish'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"','goodwish'),
				'parent' => $panel_blog_lists,
				'options' => goodwish_edge_get_custom_sidebars()
			));
		}

		goodwish_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination','goodwish'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List','goodwish'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_pagination_container'
				)
			)
		);

		$pagination_container = goodwish_edge_add_admin_container(
			array(
				'name' => 'edgtf_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__('Pagination Range limit','goodwish'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label'       => esc_html__('Pagination on Masonry','goodwish'),
			'description' => esc_html__('Choose a pagination style for Masonry Blog List','goodwish'),
			'parent'      => $pagination_container,
			'options'     => array(
				'standard'			=> esc_html__('Standard','goodwish'),
				'load-more'			=> esc_html__('Load More','goodwish'),
				'infinite-scroll' 	=> esc_html__('Infinite Scroll','goodwish')
			),
			
		));
		goodwish_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__('Load More Pagination on Other Lists','goodwish'),
				'parent' => $pagination_container,
				'description' => esc_html__('Enable Load More Pagination on other lists','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__('Masonry Filter','goodwish'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);		
		goodwish_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt','goodwish'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		goodwish_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt','goodwish'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		goodwish_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt','goodwish'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		goodwish_edge_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'split_column_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Split Column Type Number of Words in Excerpt','goodwish'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)','goodwish'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = goodwish_edge_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single','goodwish')
			)
		);


		goodwish_edge_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout','goodwish'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages','goodwish'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar','goodwish'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right','goodwish'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right','goodwish'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left','goodwish'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left','goodwish'),
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			goodwish_edge_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display','goodwish'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"','goodwish'),
				'parent' => $panel_blog_single,
				'options' => goodwish_edge_get_custom_sidebars()
			));
		}

		goodwish_edge_add_admin_field(array(
            'name'          => 'blog_single_title_in_title_area',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Post Title in Title Area','goodwish'),
            'description'   => esc_html__('Enabling this option will show post title in title area on single post pages','goodwish'),
            'parent'        => $panel_blog_single,
            'default_value' => 'yes'
        ));

        goodwish_edge_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments','goodwish'),
			'description'   => esc_html__('Enabling this option will show comments on your page.','goodwish'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		goodwish_edge_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts','goodwish'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.','goodwish'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		goodwish_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links','goodwish'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)','goodwish'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = goodwish_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category','goodwish'),
				'description' => esc_html__('Limit your navigation only through current category','goodwish'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'no',
				'label' => esc_html__('Show Author Info Box','goodwish'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages','goodwish'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_edgtf_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = goodwish_edge_add_admin_container(
			array(
				'name' => 'edgtf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		goodwish_edge_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email','goodwish'),
				'description' => esc_html__('Enabling this option will show author email','goodwish'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_blog_options_map', 12);

}





