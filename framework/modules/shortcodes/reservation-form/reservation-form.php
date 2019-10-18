<?php
namespace GoodwishEdge\Modules\Shortcodes\ReservationForm;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ReservationForm
 */

class ReservationForm implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'edgtf_reservation_form';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Reservation Form', 'goodwish'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by EDGE', 'goodwish'),
			'icon'                      => '',
			'icon' => 'icon-wpb-reservation-form extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('OpenTable ID', 'goodwish'),
					'param_name'  => 'open_table_id',
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'open_table_id' => ''
		);

		$params = shortcode_atts($args, $atts);

		if($params['open_table_id'] === '') {
			$params['open_table_id'] = goodwish_edge_options()->getOptionValue('open_table_id');
		}

		return goodwish_edge_get_shortcode_module_template_part('templates/reservation-form-template', 'reservation-form', '', $params);
	}

}