<?php
namespace GoodwishEdge\Modules\Shortcodes\PricingTable;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'edgtf_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Edge Pricing Table', 'goodwish'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-table extended-custom-icon',
			'category' => esc_html__('by EDGE', 'goodwish'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'edgtf_pricing_tables'),
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title','goodwish'),
					'param_name' => 'title',
					'value' => esc_html__('Basic Plan','goodwish'),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price','goodwish'),
					'param_name' => 'price',
					'description' => esc_html__('Default value is 100','goodwish'),
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Currency','goodwish'),
					'param_name' => 'currency',
					'description' => esc_html__('Default mark is $','goodwish'),
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price Period','goodwish'),
					'param_name' => 'price_period',
					'description' => esc_html__('Default label is "/ month"','goodwish'),
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Show Button','goodwish'),
					'param_name' => 'show_button',
					'value' => array(
						esc_html__('Default','goodwish') => '',
						esc_html__('Yes','goodwish') => 'yes',
						esc_html__('No','goodwish') => 'no'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Text','goodwish'),
					'param_name' => 'button_text',
					'dependency' => array('element' => 'show_button',  'value' => 'yes') 
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Button Link','goodwish'),
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Active','goodwish'),
					'param_name' => 'active',
					'value' => array(
						esc_html__('No','goodwish') => 'no',
						esc_html__('Yes','goodwish') => 'yes'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Active text','goodwish'),
					'param_name' => 'active_text',
					'description' => esc_html__('Best choice','goodwish'),
					'dependency' => array('element' => 'active', 'value' => 'yes')
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Content','goodwish'),
					'param_name' => 'content',
					'value' => '<li>content content content</li><li>content content content</li><li>content content content</li>',
					'description' => ''
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'title'         			   => 'Basic Plan',
			'price'         			   => '100',
			'currency'      			   => '$',
			'price_period'  			   => '/ month',
			'active'        			   => 'no',
			'active_text'   			   => '',
			'show_button'				   => 'yes',
			'link'          			   => '',
			'button_text'   			   => 'button'
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';
		$pricing_table_clasess		= 'edgtf-price-table';
		$pricing_table_button		= 'solid';

		if($active == 'yes') {
			$pricing_table_clasess .= ' edgtf-active';
			$pricing_table_button = 'solid';
		}
		
		$params['pricing_table_classes'] = $pricing_table_clasess;
		$params['pricing_table_button'] = $pricing_table_button;
        $params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content);
		
		$html .= goodwish_edge_get_shortcode_module_template_part('templates/pricing-table-template','pricing-table', '', $params);
		return $html;

	}

}
