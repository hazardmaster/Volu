<?php
namespace GoodwishEdge\Modules\Shortcodes\TitleWithNumber;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class TitleWithNumber
 */
class TitleWithNumber implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_title_with_number';

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
				'name' => esc_html__('Edge Title With Number', 'goodwish'),
				'base' => $this->getBase(),
				'category' => esc_html__('by EDGE', 'goodwish'),
				'icon' => 'icon-wpb-title-with-number extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title','goodwish'),
						'param_name' => 'title',
						'value' => '',
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number','goodwish'),
						'param_name' => 'number',
						'value' => '',
						'admin_label' => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Title Tag",'goodwish'),
						"param_name" => "title_tag",
						"value" => array(
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6"
						)
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Color','goodwish'),
						'param_name' => 'title_color',
						'value' => '',
						'admin_label' => true
					)
				)
		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'title' => '',
			'number' => '',
			'title_tag' => 'h2',
			'title_color' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['title_style'] = '';

		if($params['title_color'] != '') {
			$params['title_style'] = 'color:' . $params['title_color'];
		}


		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/title-with-number-template', 'title-with-number', '', $params);

		return $html;

	}

}