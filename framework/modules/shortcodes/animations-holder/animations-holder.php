<?php
namespace GoodwishEdge\Modules\Shortcodes\AnimationsHolder;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class AnimationsHolder implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_animations_holder';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(
			array(
				'name'                    => esc_html__('Animations Holder', 'goodwish'),
				'base'                    => $this->base,
				'as_parent'               => array('except' => 'vc_row, vc_accordion, vc_tabs, edgtf_elements_holder, edgtf_pricing_tables, edgtf_text_slider_holder, edgtf_info_card_slider, edgtf_icon_slider'),
				'content_element'         => true,
				'category'                => esc_html__('by EDGE', 'goodwish'),
				'icon'                    => 'icon-wpb-animation-holder extended-custom-icon',
				'show_settings_on_create' => true,
				'js_view'                 => 'VcColumnView',
				'params'                  => array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Animation', 'goodwish'),
						'param_name'  => 'css_animation',
						'value'       => array(
							esc_html__('No animation', 'goodwish')                    => '',
							esc_html__('Fade In Upwards', 'goodwish')   => 'edgtf-fade-in-up',
							esc_html__('Fade In and Scale Up', 'goodwish')  => 'edgtf-fade-in-scale',
						),
						'admin_label' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Animation Duration (ms)', 'goodwish'),
						'param_name'  => 'animation_duration',
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Animation Delay (ms)', 'goodwish'),
						'param_name'  => 'animation_delay',
						'admin_label' => true
					)
				)
			)
		);
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'css_animation'   => '',
			'animation_duration' => '',
			'animation_delay' => ''
		);

		$params            = shortcode_atts($default_atts, $atts);
		$params['content'] = $content;
		$params['class']   = array(
			'edgtf-animations-holder',
			$params['css_animation']
		);

		$params['style'] = $this->getHolderStyles($params);
		$params['data']  = array(
			'data-animation' => $params['css_animation']
		);

		return goodwish_edge_get_shortcode_module_template_part('templates/animations-holder-template', 'animations-holder', '', $params);
	}

	private function getHolderStyles($params) {
		$styles = array();

		if($params['animation_duration'] !== '') {
			$styles[] = '-webkit-transition-duration: '.$params['animation_duration'].'ms';
			$styles[] = 'transition-duration: '.$params['animation_duration'].'ms';
		}

		if($params['animation_delay'] !== '') {
			$styles[] = '-webkit-transition-delay: '.$params['animation_delay'].'ms';
			$styles[] = 'transition-delay: '.$params['animation_delay'].'ms';
		}

		return $styles;
	}
}