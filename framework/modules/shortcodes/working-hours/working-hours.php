<?php
namespace GoodwishEdge\Modules\Shortcodes\WorkingHours;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class WorkingHours
 */

class WorkingHours implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_working_hours';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Edge Working Hours', 'goodwish'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by EDGE', 'goodwish'),
			'icon' 						=> 'icon-wpb-working-hours extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'goodwish'),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Enable Frame', 'goodwish'),
					'param_name'  => 'enable_frame',
					'description' => esc_html__('Enabling this option will display dark frame around working hours', 'goodwish'),
					'admin_label' => true,
					'value'       => array(
						''    => '',
						esc_html__('Yes', 'goodwish') => 'yes',
						esc_html__('No', 'goodwish')  => 'no'
					),
					'save_always' => true
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__('Background Image', 'goodwish'),
					'param_name'  => 'bg_image',
					'admin_label' => true,
					'save_always' => true,
				),
				array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__('Background Color', 'goodwish'),
                    'param_name'  => 'bg_color',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Show Footnote Text', 'goodwish'),
                    'param_name'  => 'show_footnote_text',
                    'admin_label' => true,
                    'value'       => array(
						''    => '',
						esc_html__('Yes', 'goodwish') => 'yes',
						esc_html__('No', 'goodwish')  => 'no'
					),
                ),
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'title'             => '',
			'enable_frame'      => '',
			'bg_image'          => '',
			'bg_color'			=> '',
			'show_footnote_text' => 'yes'
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['working_hours']  = $this->getWorkingHours();
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_styles']  = $this->getHolderStyles($params);
		$params['footnote']  = $this->getFootnote($params);

		return goodwish_edge_get_shortcode_module_template_part('templates/working-hours-template', 'working-hours', '', $params);
	}

	private function getWorkingHours() {
		$workingHours = array();

		//monday
		if(goodwish_edge_options()->getOptionValue('wh_monday_from') !== '') {
			$workingHours['monday']['label'] = esc_html__('Monday', 'goodwish');
			$workingHours['monday']['from']  = goodwish_edge_options()->getOptionValue('wh_monday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_monday_to') !== '') {
			$workingHours['monday']['to'] = goodwish_edge_options()->getOptionValue('wh_monday_to');
		}

		$workingHours['monday']['closed'] = goodwish_edge_options()->getOptionValue('wh_monday_closed');
		$workingHours['monday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_monday_footnote');

		//tuesday
		if(goodwish_edge_options()->getOptionValue('wh_tuesday_from') !== '') {
			$workingHours['tuesday']['label'] = esc_html__('Tuesday', 'goodwish');
			$workingHours['tuesday']['from']  = goodwish_edge_options()->getOptionValue('wh_tuesday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_tuesday_to') !== '') {
			$workingHours['tuesday']['to'] = goodwish_edge_options()->getOptionValue('wh_tuesday_to');
		}

		$workingHours['tuesday']['closed'] = goodwish_edge_options()->getOptionValue('wh_tuesday_closed');
		$workingHours['tuesday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_tuesday_footnote');

		//wednesday
		if(goodwish_edge_options()->getOptionValue('wh_wednesday_from') !== '') {
			$workingHours['wednesday']['label'] = esc_html__('Wednesday', 'goodwish');
			$workingHours['wednesday']['from']  = goodwish_edge_options()->getOptionValue('wh_wednesday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_wednesday_to') !== '') {
			$workingHours['wednesday']['to'] = goodwish_edge_options()->getOptionValue('wh_wednesday_to');
		}

		$workingHours['wednesday']['closed'] = goodwish_edge_options()->getOptionValue('wh_wednesday_closed');
		$workingHours['wednesday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_wednesday_footnote');

		//thursday
		if(goodwish_edge_options()->getOptionValue('wh_thursday_from') !== '') {
			$workingHours['thursday']['label'] = esc_html__('Thursday', 'goodwish');
			$workingHours['thursday']['from']  = goodwish_edge_options()->getOptionValue('wh_thursday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_thursday_to') !== '') {
			$workingHours['thursday']['to'] = goodwish_edge_options()->getOptionValue('wh_thursday_to');
		}

		$workingHours['thursday']['closed'] = goodwish_edge_options()->getOptionValue('wh_thursday_closed');
		$workingHours['thursday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_thursdays_footnote');

		//friday
		if(goodwish_edge_options()->getOptionValue('wh_friday_from') !== '') {
			$workingHours['friday']['label'] = esc_html__('Friday', 'goodwish');
			$workingHours['friday']['from']  = goodwish_edge_options()->getOptionValue('wh_friday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_friday_to') !== '') {
			$workingHours['friday']['to'] = goodwish_edge_options()->getOptionValue('wh_friday_to');
		}

		$workingHours['friday']['closed'] = goodwish_edge_options()->getOptionValue('wh_friday_closed');
		$workingHours['friday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_friday_footnote');

		//saturday
		if(goodwish_edge_options()->getOptionValue('wh_saturday_from') !== '') {
			$workingHours['saturday']['label'] = esc_html__('Saturday', 'goodwish');
			$workingHours['saturday']['from']  = goodwish_edge_options()->getOptionValue('wh_saturday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_saturday_to') !== '') {
			$workingHours['saturday']['to'] = goodwish_edge_options()->getOptionValue('wh_saturday_to');
		}

		$workingHours['saturday']['closed'] = goodwish_edge_options()->getOptionValue('wh_saturday_closed');
		$workingHours['saturday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_saturday_footnote');

		//sunday
		if(goodwish_edge_options()->getOptionValue('wh_sunday_from') !== '') {
			$workingHours['sunday']['label'] = esc_html__('Sunday', 'goodwish');
			$workingHours['sunday']['from']  = goodwish_edge_options()->getOptionValue('wh_sunday_from');
		}

		if(goodwish_edge_options()->getOptionValue('wh_sunday_to') !== '') {
			$workingHours['sunday']['to'] = goodwish_edge_options()->getOptionValue('wh_sunday_to');
		}

		$workingHours['sunday']['closed'] = goodwish_edge_options()->getOptionValue('wh_sunday_closed');
		$workingHours['sunday']['footnote'] = goodwish_edge_options()->getOptionValue('wh_sunday_footnote');

		return $workingHours;
	}

	private function getFootnote() {
		$footnote = '';
		if(goodwish_edge_options()->getOptionValue('wh_footnote') !== '') {
			$footnote = goodwish_edge_options()->getOptionValue('wh_footnote');
		}

		return $footnote;
	}

	private function getHolderClasses($params) {
		$classes = array('edgtf-working-hours-holder');

		if(isset($params['enable_frame']) && $params['enable_frame'] === 'yes') {
			$classes[] = 'edgtf-wh-with-frame';
		}

		if(isset($params['bg_image']) && $params['bg_image'] !== '') {
			$classes[] = 'edgtf-wh-with-bg-image';
		}

		return $classes;
	}

	private function getHolderStyles($params) {
		$styles = array();

		if($params['bg_image'] !== '') {
			$bg_url = wp_get_attachment_url($params['bg_image']);

			if(!empty($bg_url)) {
				$styles[] = 'background-image: url('.$bg_url.')';
			}

		} else if($params['bg_color'] !== '') {
			$styles[] = 'background-color: '.$params['bg_color'];
		}

		return $styles;
	}

}