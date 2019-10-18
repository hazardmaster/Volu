<?php

if(!function_exists('goodwish_edge_register_full_screen_menu_nav')) {
    function goodwish_edge_register_full_screen_menu_nav() {
	    register_nav_menus(
		    array(
			    'popup-navigation' => esc_html__('Fullscreen Navigation', 'goodwish')
		    )
	    );
    }

	add_action('after_setup_theme', 'goodwish_edge_register_full_screen_menu_nav');
}

if ( !function_exists('goodwish_edge_register_full_screen_menu_sidebars') ) {

	function goodwish_edge_register_full_screen_menu_sidebars() {

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Top','goodwish'),
			'id' => 'fullscreen_menu_above',
			'description' => esc_html__('This widget area is rendered above fullscreen menu','goodwish'),
			'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-above-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Bottom','goodwish'),
			'id' => 'fullscreen_menu_below',
			'description' => esc_html__('This widget area is rendered below fullscreen menu','goodwish'),
			'before_widget' => '<div class="%2$s edgtf-fullscreen-menu-below-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'goodwish_edge_register_full_screen_menu_sidebars');

}

if(!function_exists('goodwish_edge_fullscreen_menu_body_class')) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function goodwish_edge_fullscreen_menu_body_class($classes) {

		if ( is_active_widget( false, false, 'edgtf_full_screen_menu_opener' ) || goodwish_edge_get_meta_field_intersect('header_type', goodwish_edge_get_page_id()) == 'header-full-screen' ) {

			$classes[] = 'edgtf-' . goodwish_edge_options()->getOptionValue('fullscreen_menu_animation_style');

		}

		return $classes;
	}

	add_filter('body_class', 'goodwish_edge_fullscreen_menu_body_class');
}

if ( !function_exists('goodwish_edge_get_full_screen_menu') ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function goodwish_edge_get_full_screen_menu() {

		if ( is_active_widget( false, false, 'edgtf_full_screen_menu_opener' ) || goodwish_edge_get_meta_field_intersect('header_type', goodwish_edge_get_page_id()) == 'header-full-screen' ) {

			$parameters = array(
				'fullscreen_menu_in_grid' => goodwish_edge_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false
			);

			goodwish_edge_get_module_template_part('templates/fullscreen-menu', 'fullscreenmenu', '', $parameters);

		}

	}

}

if ( !function_exists('goodwish_edge_get_full_screen_menu_navigation') ) {
	/**
	 * Loads fullscreen menu navigation HTML template
	 */
	function goodwish_edge_get_full_screen_menu_navigation() {

		goodwish_edge_get_module_template_part('templates/parts/navigation', 'fullscreenmenu');

	}

}