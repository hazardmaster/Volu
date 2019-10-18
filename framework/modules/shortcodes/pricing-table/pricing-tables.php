<?php
namespace GoodwishEdge\Modules\Shortcodes\PricingTables;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTables implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_pricing_tables';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Edge Pricing Tables', 'goodwish'),
				'base' => $this->base,
				'as_parent' => array('only' => 'edgtf_pricing_table'),
				'content_element' => true,
				'category' => esc_html__('by EDGE', 'goodwish'),
				'icon' => 'icon-wpb-pricing-tables extended-custom-icon',
				'show_settings_on_create' => true,
				'params' => array(
					array(
						'type' => 'dropdown',
						'admin_label' => true,
						'heading' => esc_html__('Columns','goodwish'),
						'param_name' => 'columns',
						'value' => array(
							esc_html__('Two','goodwish')       => 'edgtf-two-columns',
							esc_html__('Three' ,'goodwish')    => 'edgtf-three-columns',
							esc_html__('Four','goodwish')      => 'edgtf-four-columns',
						),
						'save_always' => true,
						'description' => ''
					)
				),
				'js_view' => 'VcColumnView'
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
			'columns'         => 'edgtf-two-columns'
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		
		$html = '<div class="edgtf-pricing-tables clearfix '.$columns.'">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}