<?php

if (!function_exists('goodwish_edge_side_area_slide_from_right_type_style')) {

	function goodwish_edge_side_area_slide_from_right_type_style()
	{

		if (goodwish_edge_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

			if (goodwish_edge_options()->getOptionValue('side_area_width') !== '' && goodwish_edge_options()->getOptionValue('side_area_width') >= 20) {
				echo goodwish_edge_dynamic_css('.edgtf-side-menu-slide-from-right .edgtf-side-menu', array(
					'right' => '-'.goodwish_edge_options()->getOptionValue('side_area_width') . '%',
					'width' => goodwish_edge_options()->getOptionValue('side_area_width') . '%'
				));
			}

			if (goodwish_edge_options()->getOptionValue('side_area_content_overlay_color') !== '') {

				echo goodwish_edge_dynamic_css('.edgtf-side-menu-slide-from-right .edgtf-wrapper .edgtf-cover', array(
					'background-color' => goodwish_edge_options()->getOptionValue('side_area_content_overlay_color')
				));

			}
			if (goodwish_edge_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

				echo goodwish_edge_dynamic_css('.edgtf-side-menu-slide-from-right.edgtf-right-side-menu-opened .edgtf-wrapper .edgtf-cover', array(
					'opacity' => goodwish_edge_options()->getOptionValue('side_area_content_overlay_opacity')
				));

			}
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_slide_from_right_type_style');

}

if (!function_exists('goodwish_edge_side_area_icon_color_styles')) {

	function goodwish_edge_side_area_icon_color_styles()
	{

		if (goodwish_edge_options()->getOptionValue('side_area_icon_font_size') !== '') {

			echo goodwish_edge_dynamic_css('a.edgtf-side-menu-button-opener', array(
				'font-size' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_icon_font_size')) . 'px'
			));

			if (goodwish_edge_options()->getOptionValue('side_area_icon_font_size') > 30) {
				echo '@media only screen and (max-width: 480px) {
						a.edgtf-side-menu-button-opener {
						font-size: 30px;
						}
					}';
			}

		}

		if (goodwish_edge_options()->getOptionValue('side_area_icon_color') !== '') {

			echo goodwish_edge_dynamic_css('a.edgtf-side-menu-button-opener', array(
				'color' => goodwish_edge_options()->getOptionValue('side_area_icon_color')
			));

		}
		if (goodwish_edge_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo goodwish_edge_dynamic_css('a.edgtf-side-menu-button-opener:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('side_area_icon_hover_color')
			));

		}
		if (goodwish_edge_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo goodwish_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener,
			.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener', array(
				'color' => goodwish_edge_options()->getOptionValue('side_area_light_icon_color') . ' !important'
			));

		}
		if (goodwish_edge_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo goodwish_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener:hover,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener:hover,
			.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
			));

		}
		if (goodwish_edge_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo goodwish_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener,
			.edgtf-dark-header .edgtf-top-bar .edgtf-side-menu-button-opener', array(
				'color' => goodwish_edge_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
			));

		}
		if (goodwish_edge_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo goodwish_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-side-menu-button-opener:hover,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-side-menu-button-opener:hover,
			.edgtf-dark-header .edgtf-top-bar .edgtf-side-menu-button-opener:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
			));

		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_icon_color_styles');

}

if (!function_exists('goodwish_edge_side_area_icon_spacing_styles')) {

	function goodwish_edge_side_area_icon_spacing_styles()
	{
		$icon_spacing = array();

		if (goodwish_edge_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
		}

		if (!empty($icon_spacing)) {

			echo goodwish_edge_dynamic_css('a.edgtf-side-menu-button-opener', $icon_spacing);

		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_icon_spacing_styles');
}

if (!function_exists('goodwish_edge_side_area_icon_border_styles')) {

	function goodwish_edge_side_area_icon_border_styles()
	{
		if (goodwish_edge_options()->getOptionValue('side_area_icon_border_yesno') == 'yes') {

			$side_area_icon_border = array();

			if (goodwish_edge_options()->getOptionValue('side_area_icon_border_color') !== '') {
				$side_area_icon_border['border-color'] = goodwish_edge_options()->getOptionValue('side_area_icon_border_color');
			}

			if (goodwish_edge_options()->getOptionValue('side_area_icon_border_width') !== '') {
				$side_area_icon_border['border-width'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_icon_border_width')) . 'px';
			} else {
				$side_area_icon_border['border-width'] = '1px';
			}

			if (goodwish_edge_options()->getOptionValue('side_area_icon_border_radius') !== '') {
				$side_area_icon_border['border-radius'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_icon_border_radius')) . 'px';
			}

			if (goodwish_edge_options()->getOptionValue('side_area_icon_border_style') !== '') {
				$side_area_icon_border['border-style'] = goodwish_edge_options()->getOptionValue('side_area_icon_border_style');
			} else {
				$side_area_icon_border['border-style'] = 'solid';
			}

			if (!empty($side_area_icon_border)) {
				$side_area_icon_border['-webkit-transition'] = 'all 0.15s ease-out';
				$side_area_icon_border['transition'] = 'all 0.15s ease-out';
				echo goodwish_edge_dynamic_css('a.edgtf-side-menu-button-opener', $side_area_icon_border);
			}

			if (goodwish_edge_options()->getOptionValue('side_area_icon_border_hover_color') !== '') {
				$side_area_icon_border_hover['border-color'] = goodwish_edge_options()->getOptionValue('side_area_icon_border_hover_color');
                echo goodwish_edge_dynamic_css('a.edgtf-side-menu-button-opener:hover', $side_area_icon_border_hover);
			}


		}
	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_icon_border_styles');

}

if (!function_exists('goodwish_edge_side_area_alignment')) {

	function goodwish_edge_side_area_alignment()
	{

		if (goodwish_edge_options()->getOptionValue('side_area_aligment')) {

			echo goodwish_edge_dynamic_css('.edgtf-side-menu-slide-from-right .edgtf-side-menu, .edgtf-side-menu-slide-with-content .edgtf-side-menu, .edgtf-side-area-uncovered-from-content .edgtf-side-menu', array(
				'text-align' => goodwish_edge_options()->getOptionValue('side_area_aligment')
			));

		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_alignment');

}

if (!function_exists('goodwish_edge_side_area_styles')) {

	function goodwish_edge_side_area_styles()
	{

		$side_area_styles = array();

		if (goodwish_edge_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = goodwish_edge_options()->getOptionValue('side_area_background_color');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_padding_top')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_padding_right')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_padding_bottom')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_padding_left')) . 'px';
		}

		if (!empty($side_area_styles)) {
			echo goodwish_edge_dynamic_css('.edgtf-side-menu, .edgtf-side-area-uncovered-from-content .edgtf-side-menu, .edgtf-side-menu-slide-from-right .edgtf-side-menu', $side_area_styles);
		}

		if (goodwish_edge_options()->getOptionValue('side_area_close_icon') == 'dark') {
			echo goodwish_edge_dynamic_css('.edgtf-side-menu a.edgtf-close-side-menu span, .edgtf-side-menu a.edgtf-close-side-menu i', array(
				'color' => '#000000'
			));
		}

		if (goodwish_edge_options()->getOptionValue('side_area_close_icon_size') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-side-menu a.edgtf-close-side-menu', array(
				'height' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'padding' => 0,
			));
			echo goodwish_edge_dynamic_css('.edgtf-side-menu a.edgtf-close-side-menu span, .edgtf-side-menu a.edgtf-close-side-menu i', array(
				'font-size' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'height' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_close_icon_size')) . 'px',
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_styles');

}

if (!function_exists('goodwish_edge_side_area_title_styles')) {

	function goodwish_edge_side_area_title_styles()
	{

		$title_styles = array();

		if (goodwish_edge_options()->getOptionValue('side_area_title_color') !== '') {
			$title_styles['color'] = goodwish_edge_options()->getOptionValue('side_area_title_color');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_title_fontsize') !== '') {
			$title_styles['font-size'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_title_fontsize')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_title_lineheight') !== '') {
			$title_styles['line-height'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_title_lineheight')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_title_texttransform') !== '') {
			$title_styles['text-transform'] = goodwish_edge_options()->getOptionValue('side_area_title_texttransform');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_title_fontstyle') !== '') {
			$title_styles['font-style'] = goodwish_edge_options()->getOptionValue('side_area_title_fontstyle');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_title_fontweight') !== '') {
			$title_styles['font-weight'] = goodwish_edge_options()->getOptionValue('side_area_title_fontweight');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_title_letterspacing') !== '') {
			$title_styles['letter-spacing'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
		}

		if (!empty($title_styles)) {

			echo goodwish_edge_dynamic_css('.edgtf-side-menu-title h4, .edgtf-side-menu-title h5', $title_styles);

		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_title_styles');

}

if (!function_exists('goodwish_edge_side_area_text_styles')) {

	function goodwish_edge_side_area_text_styles()
	{
		$text_styles = array();

		if (goodwish_edge_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_text_fontsize') !== '') {
			$text_styles['font-size'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_text_fontsize')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_text_lineheight') !== '') {
			$text_styles['line-height'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_text_lineheight')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('side_area_text_fontweight') !== '') {
			$text_styles['font-weight'] = goodwish_edge_options()->getOptionValue('side_area_text_fontweight');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_text_fontstyle') !== '') {
			$text_styles['font-style'] = goodwish_edge_options()->getOptionValue('side_area_text_fontstyle');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_text_texttransform') !== '') {
			$text_styles['text-transform'] = goodwish_edge_options()->getOptionValue('side_area_text_texttransform');
		}

		if (goodwish_edge_options()->getOptionValue('side_area_text_color') !== '') {
			$text_styles['color'] = goodwish_edge_options()->getOptionValue('side_area_text_color');
		}

		if (!empty($text_styles)) {

			echo goodwish_edge_dynamic_css('.edgtf-side-menu .widget, .edgtf-side-menu .widget.widget_search form, .edgtf-side-menu .widget.widget_search form input[type="text"], .edgtf-side-menu .widget.widget_search form input[type="submit"], .edgtf-side-menu .widget h6, .edgtf-side-menu .widget h6 a, .edgtf-side-menu .widget p, .edgtf-side-menu .widget li a, .edgtf-side-menu .widget.widget_rss li a.rsswidget, .edgtf-side-menu #wp-calendar caption,.edgtf-side-menu .widget li, .edgtf-side-menu h3, .edgtf-side-menu .widget.widget_archive select, .edgtf-side-menu .widget.widget_categories select, .edgtf-side-menu .widget.widget_text select, .edgtf-side-menu .widget.widget_search form input[type="submit"], .edgtf-side-menu #wp-calendar th, .edgtf-side-menu #wp-calendar td, .edgtf-side-menu .q_social_icon_holder i.simple_social', $text_styles);

		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_text_styles');

}

if (!function_exists('goodwish_edge_side_area_link_styles')) {

	function goodwish_edge_side_area_link_styles()
	{
		$link_styles = array();

		if (goodwish_edge_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
			$link_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_font_size') !== '') {
			$link_styles['font-size'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('sidearea_link_font_size')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_line_height') !== '') {
			$link_styles['line-height'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('sidearea_link_line_height')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
			$link_styles['letter-spacing'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_font_weight') !== '') {
			$link_styles['font-weight'] = goodwish_edge_options()->getOptionValue('sidearea_link_font_weight');
		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_font_style') !== '') {
			$link_styles['font-style'] = goodwish_edge_options()->getOptionValue('sidearea_link_font_style');
		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_text_transform') !== '') {
			$link_styles['text-transform'] = goodwish_edge_options()->getOptionValue('sidearea_link_text_transform');
		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_color') !== '') {
			$link_styles['color'] = goodwish_edge_options()->getOptionValue('sidearea_link_color');
		}

		if (!empty($link_styles)) {

			echo goodwish_edge_dynamic_css('.edgtf-side-menu .widget li a, .edgtf-side-menu .widget a:not(.qbutton)', $link_styles);

		}

		if (goodwish_edge_options()->getOptionValue('sidearea_link_hover_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-side-menu .widget a:hover, .edgtf-side-menu .widget.widget_archive li:hover, .edgtf-side-menu .widget.widget_categories li:hover,  .edgtf-side-menu .widget_rss li a.rsswidget:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('sidearea_link_hover_color')
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_link_styles');

}

if (!function_exists('goodwish_edge_side_area_border_styles')) {

	function goodwish_edge_side_area_border_styles()
	{

		if (goodwish_edge_options()->getOptionValue('side_area_enable_bottom_border') == 'yes') {

			if (goodwish_edge_options()->getOptionValue('side_area_bottom_border_color') !== '') {

				echo goodwish_edge_dynamic_css('.edgtf-side-menu .widget', array(
					'border-bottom' => '1px solid ' . goodwish_edge_options()->getOptionValue('side_area_bottom_border_color'),
					'margin-bottom' => '10px',
					'padding-bottom' => '10px',
				));

			}

		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_side_area_border_styles');

}