<?php
if (!function_exists('goodwish_edge_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function goodwish_edge_register_side_area_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Side Area','goodwish'),
			'id' => 'sidearea', //TODO Change name of sidebar
			'description' => esc_html__('Side Area','goodwish'),
			'before_widget' => '<div id="%1$s" class="widget edgtf-sidearea %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="edgtf-sidearea-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'goodwish_edge_register_side_area_sidebar');

}

if(!function_exists('goodwish_edge_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function goodwish_edge_side_menu_body_class($classes) {

		if (is_active_widget( false, false, 'edgtf_side_area_opener' )) {

			if (goodwish_edge_options()->getOptionValue('side_area_type')) {

				$classes[] = 'edgtf-' . goodwish_edge_options()->getOptionValue('side_area_type');

				if (goodwish_edge_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

					$classes[] = 'edgtf-' . goodwish_edge_options()->getOptionValue('side_area_slide_with_content_width');

				}

        	}

		}

		return $classes;

    }

    add_filter('body_class', 'goodwish_edge_side_menu_body_class');
}


if(!function_exists('goodwish_edge_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function goodwish_edge_get_side_area() {

		if (is_active_widget( false, false, 'edgtf_side_area_opener' )) {

			$parameters = array(
				'show_side_area_title' => goodwish_edge_options()->getOptionValue('side_area_title') !== '' ? true : false, //Dont show title if empty
			);

			goodwish_edge_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);

		}

	}

}

if (!function_exists('goodwish_edge_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function goodwish_edge_get_side_area_title() {

		$parameters = array(
			'side_area_title' => goodwish_edge_options()->getOptionValue('side_area_title')
		);

		goodwish_edge_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);

	}

}

if(!function_exists('goodwish_edge_get_side_menu_icon_html')) {
    /**
     * Function that outputs html for side area icon opener.
     * Uses $goodwish_edge_IconCollections global variable
     * @return string generated html
     */
    function goodwish_edge_get_side_menu_icon_html() {

        $icon_html = '';

		if (goodwish_edge_options()->getOptionValue('side_area_button_icon_pack') !== '') {
			$icon_pack = goodwish_edge_options()->getOptionValue('side_area_button_icon_pack');

			$icons = goodwish_edge_icon_collections()->getIconCollection($icon_pack);
			$icon_options_field = 'side_area_icon_' . $icons->param;

			if (goodwish_edge_options()->getOptionValue($icon_options_field) !== '') {

				$icon = goodwish_edge_options()->getOptionValue($icon_options_field);
				$icon_html = goodwish_edge_icon_collections()->renderIcon($icon, $icon_pack);

			}

		}

        return $icon_html;
    }
}