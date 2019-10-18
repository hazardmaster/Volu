<?php
if(!function_exists('goodwish_edge_tabs_typography_styles')){
	function goodwish_edge_tabs_typography_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = goodwish_edge_options()->getOptionValue('tabs_font_family');
		
		if(goodwish_edge_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = goodwish_edge_get_font_option_val($font_family);
		}
		
		$text_transform = goodwish_edge_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = goodwish_edge_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = goodwish_edge_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = goodwish_edge_filter_px($letter_spacing).'px';
        }

        $font_weight = goodwish_edge_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        echo goodwish_edge_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_tabs_typography_styles');
}

if(!function_exists('goodwish_edge_tabs_inital_color_styles')){
	function goodwish_edge_tabs_inital_color_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li a';
		$styles = array();
		
		if(goodwish_edge_options()->getOptionValue('tabs_color')) {
            $styles['color'] = goodwish_edge_options()->getOptionValue('tabs_color');
        }
		if(goodwish_edge_options()->getOptionValue('tabs_back_color')) {
            $styles['background-color'] = goodwish_edge_options()->getOptionValue('tabs_back_color');
        }
		if(goodwish_edge_options()->getOptionValue('tabs_border_color')) {
            $styles['border-color'] = goodwish_edge_options()->getOptionValue('tabs_border_color');
        }
		
		echo goodwish_edge_dynamic_css($selector, $styles);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_tabs_inital_color_styles');
}
if(!function_exists('goodwish_edge_tabs_active_color_styles')){
	function goodwish_edge_tabs_active_color_styles(){
		$selector = '.edgtf-tabs .edgtf-tabs-nav li.ui-state-active a, .edgtf-tabs .edgtf-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(goodwish_edge_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = goodwish_edge_options()->getOptionValue('tabs_color_active');
        }
		if(goodwish_edge_options()->getOptionValue('tabs_back_color_active')) {
            $styles['background-color'] = goodwish_edge_options()->getOptionValue('tabs_back_color_active');
        }
		if(goodwish_edge_options()->getOptionValue('tabs_border_color_active')) {
            $styles['border-color'] = goodwish_edge_options()->getOptionValue('tabs_border_color_active');
        }
		
		echo goodwish_edge_dynamic_css($selector, $styles);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_tabs_active_color_styles');
}