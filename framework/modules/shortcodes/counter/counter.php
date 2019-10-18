<?php
namespace GoodwishEdge\Modules\Shortcodes\Counter;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Counter
 */
class Counter implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_counter';

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

		vc_map( array(
			'name' => esc_html__('Edge Counter', 'goodwish'),
			'base' => $this->getBase(),
			'category' => esc_html__('by EDGE', 'goodwish'),
			'admin_enqueue_css' => array(goodwish_edge_get_skin_uri().'/assets/css/edgtf-vc-extend.css'),
			'icon' => 'icon-wpb-counter extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Type', 'goodwish'),
					'param_name' => 'type',
					'value' => array(
						esc_html__('Zero Counter', 'goodwish') => 'zero',
						esc_html__('Random Counter', 'goodwish') => 'random'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Position', 'goodwish'),
					'param_name' => 'position',
					'value' => array(
						esc_html__('Left', 'goodwish') => 'left',
						esc_html__('Right', 'goodwish') => 'right',
						esc_html__('Center', 'goodwish') => 'center'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Digit', 'goodwish'),
					'param_name' => 'digit',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Digit Font Size (px)', 'goodwish'),
					'param_name' => 'font_size',
					'description' => '',
					'group' => esc_html__('Design Options', 'goodwish'),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Digit Color', 'goodwish'),
					'param_name'  => 'digit_color',
					'admin_label' => true,
					'group'       => esc_html__('Design Options','goodwish')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'goodwish'),
					'param_name' => 'title',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Title Color', 'goodwish'),
					'param_name'  => 'title_color',
					'admin_label' => true,
					'group'       => esc_html__('Design Options','goodwish')
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Title Hover Color', 'goodwish'),
					'param_name'  => 'title_hover_color',
					'admin_label' => true,
					'group'       => esc_html__('Design Options', 'goodwish')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Text', 'goodwish'),
					'param_name' => 'text',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__('Text Color', 'goodwish'),
					'param_name'  => 'text_color',
					'admin_label' => true,
					'group'       => esc_html__('Design Options','goodwish')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Padding Bottom(px)', 'goodwish'),
					'param_name' => 'padding_bottom',
					'description' => '',
					'group' => esc_html__('Design Options', 'goodwish'),
				),

			)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'type' => '',
			'position' => '',
			'digit' => '',
			'digit_color' => '',
			'underline_digit' => '',
			'title' => '',
			'title_color' => '',
			'font_size' => '',
			'text' => '',
			'text_color' => '',
			'padding_bottom' => '',
			'title_hover_color'=>''

		);

		$params = shortcode_atts($args, $atts);

		$params['counter_holder_styles'] = $this->getCounterHolderStyle($params);
		$params['counter_styles'] = $this->getCounterStyle($params);
		$params['title_styles'] = $this->getTitleStyle($params);
		$params['title_data'] = $this->getTitleData($params);
		$params['text_styles'] = $this->getTextStyle($params);

		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/counter-template', 'counter', '', $params);

		return $html;

	}

	/**
	 * Return Counter holder styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterHolderStyle($params) {
		$counterHolderStyle = array();

		if ($params['padding_bottom'] !== '') {

			$counterHolderStyle[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';

		}

		return implode(';', $counterHolderStyle);
	}

	/**
	 * Return Counter styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getCounterStyle($params) {
		$counterStyle = array();

		if ($params['font_size'] !== '') {
			$counterStyle[] = 'font-size: ' . $params['font_size'] . 'px';
		}
		if ($params['digit_color'] !== '') {
			$counterStyle[] = 'color: ' . $params['digit_color'];
		}

		return implode(';', $counterStyle);
	}

	/**
	 * Return Text styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getTextStyle($params) {
		$text_style = array();

		if ($params['text_color'] !== '') {
			$text_style[] = 'color: ' . $params['text_color'];
		}

		return implode(';', $text_style);
	}

	/**
	 * Return Title data
	 *
	 * @param $params
	 * @return string
	 */
	private function getTitleData($params) {
		$title_data = array();

		if ($params['title_hover_color'] !== '') {
			$title_data['data-hover-color'] = $params['title_hover_color'];
		}

		return $title_data;
	}

	/**
	 * Return Title styles
	 *
	 * @param $params
	 * @return string
	 */
	private function getTitleStyle($params) {
		$title_style = array();

		if ($params['title_color'] !== '') {
			$title_style[] = 'color: ' . $params['title_color'];
		}

		return implode(';', $title_style);
	}
}