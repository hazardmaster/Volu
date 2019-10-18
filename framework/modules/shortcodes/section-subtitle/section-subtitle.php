<?php
namespace GoodwishEdge\Modules\Shortcodes\SectionSubtitle;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class SectionSubtitle
 */
class SectionSubtitle implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_section_subtitle';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
				'name' => esc_html__('Section Subtitle', 'goodwish'),
				'base' => $this->getBase(),
				'category' => esc_html__('by EDGE', 'goodwish'),
				'icon' => 'icon-wpb-section-subtitle extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Subtitle Text', 'goodwish'),
						'param_name'	=> 'subtitle_text',
						'value'			=> '',
						'admin_label'	=> true
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Text Align', 'goodwish'),
						'param_name'	=> 'text_align',
						'value'			=> array(
							''			=> '',
							esc_html__('Left', 'goodwish')		=> 'left',
							esc_html__('Center', 'goodwish')	=> 'center',
							esc_html__('Right', 'goodwish')	=> 'right',
							esc_html__('Justify', 'goodwish')	=> 'justify'
						)
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Text Color', 'goodwish'),
						'param_name'  => 'text_color',
						'admin_label' => true
					),
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
			'subtitle_text' => '',
			'text_align'	=> '',
			'text_color'	=> ''
		);

		$params = shortcode_atts($args, $atts);

		$params['subtitle_style'] = array();
		if($params['text_align'] != '') {
			$params['subtitle_style'][] = 'text-align:' . $params['text_align'];
		}
		if($params['text_color'] != '') {
			$params['subtitle_style'][] = 'color:' . $params['text_color'];
		}
		//Get HTML from template
		$html = goodwish_edge_get_shortcode_module_template_part('templates/section-subtitle-template', 'section-subtitle', '', $params);

		return $html;

	}


}