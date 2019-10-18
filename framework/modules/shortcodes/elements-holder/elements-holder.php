<?php
namespace GoodwishEdge\Modules\Shortcodes\ElementsHolder;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Edge Elements Holder', 'goodwish'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => esc_html__('by EDGE', 'goodwish'),
			'as_parent' => array('only' => 'edgtf_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__('Background Color', 'goodwish'),
					'param_name' => 'background_color',
					'value' => '',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Columns', 'goodwish'),
					'admin_label' => true,
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('1 Column', 'goodwish')      => 'one-column',
						esc_html__('2 Columns', 'goodwish')    	=> 'two-columns',
						esc_html__('3 Columns', 'goodwish')     => 'three-columns',
						esc_html__('4 Columns', 'goodwish')     => 'four-columns',
						esc_html__('5 Columns', 'goodwish')     => 'five-columns',
						esc_html__('6 Columns', 'goodwish')     => 'six-columns'
					),
					'description' => ''
				),
				array(
					'type' => 'checkbox',
					'class' => '',
					'heading' => esc_html__('Items Float Left', 'goodwish'),
					'param_name' => 'items_float_left',
					'value' => array(esc_html__('Make Items Float Left?', 'goodwish') => 'yes'),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'goodwish'),
					'heading' => esc_html__('Switch to One Column', 'goodwish'),
					'param_name' => 'switch_to_one_column',
					'value' => array(
						esc_html__('Default', 'goodwish')    		=> '',
						esc_html__('Below 1280px', 'goodwish') 	=> '1280',
						esc_html__('Below 1024px', 'goodwish')    	=> '1024',
						esc_html__('Below 768px', 'goodwish')     	=> '768',
						esc_html__('Below 600px', 'goodwish')    	=> '600',
						esc_html__('Below 480px', 'goodwish')    	=> '480',
						esc_html__('Never', 'goodwish')    		=> 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column', 'goodwish')
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness', 'goodwish'),
					'heading' => esc_html__('Choose Alignment In Responsive Mode', 'goodwish'),
					'param_name' => 'alignment_one_column',
					'value' => array(
						esc_html__('Default', 'goodwish')    	=> '',
						esc_html__('Left', 'goodwish') 			=> 'left',
						esc_html__('Center', 'goodwish')    	=> 'center',
						esc_html__('Right', 'goodwish')     	=> 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column', 'goodwish')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_columns' 		=> '',
			'switch_to_one_column'		=> '',
			'alignment_one_column' 		=> '',
			'items_float_left' 			=> '',
			'background_color' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'edgtf-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'edgtf-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'edgtf-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'edgtf-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'edgtf-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'edgtf-elements-items-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . goodwish_edge_get_class_attribute($elements_holder_class) . ' ' . goodwish_edge_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}
}
