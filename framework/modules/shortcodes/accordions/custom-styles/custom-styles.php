<?php 

if(!function_exists('goodwish_edge_accordions_typography_styles')){
	function goodwish_edge_accordions_typography_styles(){
		$selector = '.edgtf-accordion-holder .edgtf-title-holder';
		$styles = array();
		
		$font_family = goodwish_edge_options()->getOptionValue('accordions_font_family');
		if(goodwish_edge_is_font_option_valid($font_family)){
			$styles['font-family'] = goodwish_edge_get_font_option_val($font_family);
		}
		
		$text_transform = goodwish_edge_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = goodwish_edge_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = goodwish_edge_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = goodwish_edge_filter_px($letter_spacing).'px';
       }

       $font_weight = goodwish_edge_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

       echo goodwish_edge_dynamic_css($selector, $styles);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_accordions_typography_styles');
}

if(!function_exists('goodwish_edge_accordions_inital_title_color_styles')){
	function goodwish_edge_accordions_inital_title_color_styles(){
		$selector = '.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder';
		$styles = array();
		
		if(goodwish_edge_options()->getOptionValue('accordions_title_color')) {
           $styles['color'] = goodwish_edge_options()->getOptionValue('accordions_title_color');
       }
		echo goodwish_edge_dynamic_css($selector, $styles);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_accordions_inital_title_color_styles');
}

if(!function_exists('goodwish_edge_accordions_active_title_color_styles')){
	
	function goodwish_edge_accordions_active_title_color_styles(){
		$selector = array(
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-active',
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(goodwish_edge_options()->getOptionValue('accordions_title_color_active')) {
           $styles['color'] = goodwish_edge_options()->getOptionValue('accordions_title_color_active');
       }
		
		echo goodwish_edge_dynamic_css($selector, $styles);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_accordions_active_title_color_styles');
}
if(!function_exists('goodwish_edge_accordions_inital_icon_color_styles')){
	
	function goodwish_edge_accordions_inital_icon_color_styles(){
		$selector = '.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder .edgtf-accordion-mark';
		$styles = array();
		
		if(goodwish_edge_options()->getOptionValue('accordions_icon_color')) {
           $styles['color'] = goodwish_edge_options()->getOptionValue('accordions_icon_color');
       }
		echo goodwish_edge_dynamic_css($selector, $styles);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_accordions_inital_icon_color_styles');
}
if(!function_exists('goodwish_edge_accordions_active_icon_color_styles')){
	
	function goodwish_edge_accordions_active_icon_color_styles(){
		$selector = array(
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-active  .edgtf-accordion-mark',
			'.edgtf-accordion-holder.edgtf-initial .edgtf-title-holder.ui-state-hover  .edgtf-accordion-mark'
		);
		$styles = array();
		
		if(goodwish_edge_options()->getOptionValue('accordions_icon_color_active')) {
           $styles['color'] = goodwish_edge_options()->getOptionValue('accordions_icon_color_active');
       }
		echo goodwish_edge_dynamic_css($selector, $styles);
	}
	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_accordions_active_icon_color_styles');
}