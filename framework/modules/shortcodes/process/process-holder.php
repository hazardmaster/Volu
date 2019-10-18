<?php
namespace GoodwishEdge\Modules\Shortcodes\Process;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessHolder implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_process_holder';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                    => esc_html__('Process','goodwish'),
			'base'                    => $this->getBase(),
			'as_parent'               => array('only' => 'edgtf_process_item'),
			'content_element'         => true,
			'show_settings_on_create' => true,
			'category'                => esc_html__('by EDGE','goodwish'),
			'icon'                    => 'icon-wpb-process-holder extended-custom-icon',
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
				array(
					'type'        => 'dropdown',
					'param_name'  => 'number_of_items',
					'heading'     => esc_html__('Number of Process Items','goodwish'),
					'value'       => array(
						esc_html__('Three','goodwish') => 'three',
						esc_html__('Four','goodwish')  => 'four',
						esc_html__('Five','goodwish')  => 'five'
					),
					'admin_label' => true,
					'description' => ''
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'number_of_items' => 'three'
		);

		$params            = shortcode_atts($default_atts, $atts);
		$params['content'] = $content;

		$params['holder_classes'] = array(
			'edgtf-process-holder',
			'edgtf-process-holder-items-'.$params['number_of_items']
		);

		return goodwish_edge_get_shortcode_module_template_part('templates/process-holder-template', 'process', '', $params);
	}
}