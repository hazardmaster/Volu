<?php
if (!function_exists('goodwish_edge_search_opener_icon_size')) {

	function goodwish_edge_search_opener_icon_size()
	{

		if (goodwish_edge_options()->getOptionValue('header_search_icon_size')) {
			echo goodwish_edge_dynamic_css('.edgtf-search-opener, .edgtf-header-standard .edgtf-search-opener', array(
				'font-size' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_opener_icon_size');

}

if (!function_exists('goodwish_edge_search_opener_icon_colors')) {

	function goodwish_edge_search_opener_icon_colors()
	{

		if (goodwish_edge_options()->getOptionValue('header_search_icon_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-opener', array(
				'color' => goodwish_edge_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (goodwish_edge_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (goodwish_edge_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => goodwish_edge_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (goodwish_edge_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-light-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-light-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-light-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (goodwish_edge_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener', array(
				'color' => goodwish_edge_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (goodwish_edge_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-dark-header .edgtf-page-header > div:not(.edgtf-sticky-header) .edgtf-search-opener:hover,
			.edgtf-dark-header.edgtf-header-style-on-scroll .edgtf-page-header .edgtf-search-opener:hover,
			.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_opener_icon_colors');

}

if (!function_exists('goodwish_edge_search_opener_icon_background_colors')) {

	function goodwish_edge_search_opener_icon_background_colors()
	{

		if (goodwish_edge_options()->getOptionValue('search_icon_background_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-opener', array(
				'background-color' => goodwish_edge_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (goodwish_edge_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-opener:hover', array(
				'background-color' => goodwish_edge_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_opener_icon_background_colors');
}

if (!function_exists('goodwish_edge_search_opener_text_styles')) {

	function goodwish_edge_search_opener_text_styles()
	{
		$text_styles = array();

		if (goodwish_edge_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = goodwish_edge_options()->getOptionValue('search_icon_text_color');
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = goodwish_edge_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = goodwish_edge_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = goodwish_edge_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo goodwish_edge_dynamic_css('.edgtf-search-icon-text', $text_styles);
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-opener:hover .edgtf-search-icon-text', array(
				'color' => goodwish_edge_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_opener_text_styles');
}

if (!function_exists('goodwish_edge_search_opener_spacing')) {

	function goodwish_edge_search_opener_spacing()
	{
		$spacing_styles = array();

		if (goodwish_edge_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (goodwish_edge_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (goodwish_edge_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (goodwish_edge_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo goodwish_edge_dynamic_css('.edgtf-header-standard .edgtf-search-opener, .edgtf-search-opener', $spacing_styles);
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_opener_spacing');
}

if (!function_exists('goodwish_edge_search_bar_background')) {

	function goodwish_edge_search_bar_background()
	{

		if (goodwish_edge_options()->getOptionValue('search_background_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-cover, .edgtf-search-fade .edgtf-fullscreen-search-holder .edgtf-fullscreen-search-table, .edgtf-fullscreen-search-overlay', array(
				'background-color' => goodwish_edge_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_bar_background');
}

if (!function_exists('goodwish_edge_search_text_styles')) {

	function goodwish_edge_search_text_styles()
	{
		$text_styles = array();

		if (goodwish_edge_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = goodwish_edge_options()->getOptionValue('search_text_color');
		}
		if (goodwish_edge_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (goodwish_edge_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = goodwish_edge_options()->getOptionValue('search_text_texttransform');
		}
		if (goodwish_edge_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (goodwish_edge_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = goodwish_edge_options()->getOptionValue('search_text_fontstyle');
		}
		if (goodwish_edge_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = goodwish_edge_options()->getOptionValue('search_text_fontweight');
		}
		if (goodwish_edge_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo goodwish_edge_dynamic_css('.edgtf-search-cover input[type="text"], .edgtf-fullscreen-search-holder .edgtf-form-holder .edgtf-search-field', $text_styles);
			echo goodwish_edge_dynamic_css('.edgtf-search-cover input[type="text"]::-webkit-input-placeholder', $text_styles);
			echo goodwish_edge_dynamic_css('.edgtf-search-cover input[type="text"]::-moz-input-placeholder', $text_styles);
		}
	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_text_styles');
}

if (!function_exists('goodwish_edge_search_label_styles')) {

	function goodwish_edge_search_label_styles()
	{
		$text_styles = array();

		if (goodwish_edge_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = goodwish_edge_options()->getOptionValue('search_label_text_color');
		}
		if (goodwish_edge_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_label_text_fontsize')) . 'px';
		}
		if (goodwish_edge_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = goodwish_edge_options()->getOptionValue('search_label_text_texttransform');
		}
		if (goodwish_edge_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('search_label_text_google_fonts')) . ', sans-serif';
		}
		if (goodwish_edge_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = goodwish_edge_options()->getOptionValue('search_label_text_fontstyle');
		}
		if (goodwish_edge_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = goodwish_edge_options()->getOptionValue('search_label_text_fontweight');
		}
		if (goodwish_edge_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_label_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo goodwish_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-label', $text_styles);
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_label_styles');
}

if (!function_exists('goodwish_edge_search_icon_styles')) {

	function goodwish_edge_search_icon_styles()
	{

		if (goodwish_edge_options()->getOptionValue('search_icon_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'color' => goodwish_edge_options()->getOptionValue('search_icon_color')
			));
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (goodwish_edge_options()->getOptionValue('search_icon_size') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-fullscreen-search-holder .edgtf-search-submit', array(
				'font-size' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_icon_styles');
}

if (!function_exists('goodwish_edge_search_close_icon_styles')) {

	function goodwish_edge_search_close_icon_styles()
	{

		if (goodwish_edge_options()->getOptionValue('search_close_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close i, .edgtf-fullscreen-search-close i', array(
				'color' => goodwish_edge_options()->getOptionValue('search_close_color')
			));
		}
		if (goodwish_edge_options()->getOptionValue('search_close_hover_color') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close i:hover, .edgtf-fullscreen-search-close i:hover', array(
				'color' => goodwish_edge_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (goodwish_edge_options()->getOptionValue('search_close_size') !== '') {
			echo goodwish_edge_dynamic_css('.edgtf-search-cover .edgtf-search-close i, .edgtf-fullscreen-search-close i', array(
				'font-size' => goodwish_edge_filter_px(goodwish_edge_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_search_close_icon_styles');
}

?>
