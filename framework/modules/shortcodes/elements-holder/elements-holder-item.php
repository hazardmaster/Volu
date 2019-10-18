<?php
namespace GoodwishEdge\Modules\Shortcodes\ElementsHolderItem;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolderItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_elements_holder_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Edge Elements Holder Item', 'goodwish'),
					'base' => $this->base,
					'as_child' => array('only' => 'edgtf_elements_holder'),
					'as_parent' => array('except' => 'vc_accordion'),
					'content_element' => true,
					'category' => esc_html__('by EDGE', 'goodwish'),
					'icon' => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view' => 'VcColumnView',
					'params' => array(
						array(
							'type' => 'colorpicker',
							'class' => '',
							'heading' => esc_html__('Background Color','goodwish'),
							'param_name' => 'background_color',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'attach_image',
							'class' => '',
							'heading' => esc_html__('Background Image','goodwish'),
							'param_name' => 'background_image',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Zoom Effect','goodwish'),
							'param_name' => 'zoom_effect',
							'value' => array(
								'No'    => 'no',
								'Yes'   => 'yes'
							),
							'dependency' => array('element' => 'background_image', 'not_empty' => true)
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => esc_html__('Padding','goodwish'),
							'param_name' => 'item_padding',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'goodwish')
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__('Horizontal Alignment','goodwish'),
							'param_name' => 'horizontal_aligment',
							'value' => array(
								esc_html__('Left', 'goodwish')    	=> 'left',
								esc_html__('Right', 'goodwish')     => 'right',
								esc_html__('Center', 'goodwish')    => 'center'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__('Vertical Alignment','goodwish'),
							'param_name' => 'vertical_alignment',
							'value' => array(
								esc_html__('Middle', 'goodwish')    => 'middle',
								esc_html__('Top', 'goodwish')    	=> 'top',
								esc_html__('Bottom', 'goodwish')    => 'bottom'
							),
							'description' => ''
						),
						array(
							'type' => 'dropdown',
							'class' => '',
							'heading' => esc_html__('Animation Name','goodwish'),
							'param_name' => 'animation_name',
							'value' => array(
								esc_html__('No Animation', 'goodwish')			=> '',
								esc_html__('Flip In', 'goodwish')				=> 'flip-in',
								esc_html__('Grow In', 'goodwish')				=> 'grow-in',
								esc_html__('X Rotate', 'goodwish')				=> 'x-rotate',
								esc_html__('Z Rotate', 'goodwish')				=> 'z-rotate',
								esc_html__('Y Translate', 'goodwish')			=> 'y-translate',
								esc_html__('Fade In', 'goodwish')				=> 'fade-in',
								esc_html__('Fade In Down', 'goodwish')			=> 'fade-in-down',
								esc_html__('Fade In Left X Rotate', 'goodwish') => 'fade-in-left-x-rotate'
							),
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'heading' => esc_html__('Animation Delay (ms)','goodwish'),
							'param_name' => 'animation_delay',
							'value' => '',
							'description' => '',
							'dependency' => array('element' => 'animation_name', 'not_empty' => true)
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Link', 'goodwish'),
							'param_name'  => 'link',
							'group' => esc_html__('Link', 'goodwish'),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Link Target', 'goodwish'),
							'param_name'  => 'target',
							'group' => esc_html__('Link', 'goodwish'),
							'value'       => array(
								'Self'  => '_self',
								'Blank' => '_blank'
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => esc_html__('Width & Responsiveness','goodwish'),
							'heading' => esc_html__('Padding on screen size between 1280px-1600px','goodwish'),
							'param_name' => 'item_padding_1280_1600',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'goodwish')
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => esc_html__('Width & Responsiveness','goodwish'),
							'heading' => esc_html__('Padding on screen size between 1024px-1280px','goodwish'),
							'param_name' => 'item_padding_1024_1280',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'goodwish')
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => esc_html__('Width & Responsiveness','goodwish'),
							'heading' => esc_html__('Padding on screen size between 768px-1024px','goodwish'),
							'param_name' => 'item_padding_768_1024',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'goodwish')
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => esc_html__('Width & Responsiveness','goodwish'),
							'heading' => esc_html__('Padding on screen size between 600px-768px','goodwish'),
							'param_name' => 'item_padding_600_768',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'goodwish')
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => esc_html__('Width & Responsiveness','goodwish'),
							'heading' => esc_html__('Padding on screen size between 480px-600px','goodwish'),
							'param_name' => 'item_padding_480_600',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'goodwish')
						),
						array(
							'type' => 'textfield',
							'class' => '',
							'group' => esc_html__('Width & Responsiveness','goodwish'),
							'heading' => esc_html__('Padding on Screen Size Bellow 480px','goodwish'),
							'param_name' => 'item_padding_480',
							'value' => '',
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'goodwish')
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color' => '',
			'background_image' => '',
			'zoom_effect' => '',
			'item_padding' => '',
			'horizontal_aligment' => '',
			'vertical_alignment' => '',
			'animation_name' => '',
			'animation_delay' => '',
			'link' => '',
			'target' => '_self',
			'item_padding_1280_1600' => '',
			'item_padding_1024_1280' => '',
			'item_padding_768_1024' => '',
			'item_padding_600_768' => '',
			'item_padding_480_600' => '',
			'item_padding_480' => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		$params['content']= $content;

		$rand_class = 'edgtf-elements-holder-custom-' . mt_rand(100000,1000000);

		$params['elements_holder_item_style'] = $this->getElementsHolderItemStyle($params);
		$params['background_image_div_styles'] = $this->getBackgroundImageDivStyles($params);
		$params['elements_holder_item_content_style'] = $this->getElementsHolderItemContentStyle($params);
		$params['elements_holder_item_class'] = $this->getElementsHolderItemClass($params);
		$params['elements_holder_item_content_class'] = $rand_class;
		$params['elements_holder_item_responsive_data'] = $this->getElementsHolderItemContentResponsiveData($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/elements-holder-item-template', 'elements-holder', '', $params);

		return $html;
	}


	/**
	 * Return Elements Holder Item style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemStyle($params) {

		$element_holder_item_style = array();

		if ($params['background_color'] !== '') {
			$element_holder_item_style[] = 'background-color: ' . $params['background_color'];
		}
		if ($params['background_image'] !== '' && $params['zoom_effect'] !== 'yes') {
			$element_holder_item_style[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}

		if ($params['animation_delay'] !== '') {
			$element_holder_item_style[] = 'transition-delay:' . $params['animation_delay'] .'ms;'. '-webkit-transition-delay:' . $params['animation_delay'] .'ms';
		}
		return implode(';', $element_holder_item_style);

	}

	/**
	 * Return Background Image Div Styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getBackgroundImageDivStyles($params) {

		$background_image_div_styles = array();

		if ($params['background_image'] !== '' && $params['zoom_effect'] == 'yes') {
			$background_image_div_styles[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
		}

		return implode(';', $background_image_div_styles);
	}

	/**
	 * Return Elements Holder Item Content style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentStyle($params) {

		$element_holder_item_content_style = array();

		if ($params['item_padding'] !== '') {
			$element_holder_item_content_style[] = 'padding: ' . $params['item_padding'];
		}

		return implode(';', $element_holder_item_content_style);

	}

	/**
	 * Return Elements Holder Item Content Responssive style
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemContentResponsiveData($params) {
		$data = array();
		$data['data-item-class'] = $params['elements_holder_item_content_class'];

		if (!empty($params['animation_name'])) {
			$data['data-animation'] = 'edgtf-' . $params['animation_name'];
		}

		if ($params['animation_delay'] !== '') {
			$data['data-animation-delay'] = esc_attr($params['animation_delay']);
		}

		if ($params['item_padding_1280_1600'] !== '') {
			$data['data-1280-1600'] = $params['item_padding_1280_1600'];
		}

		if ($params['item_padding_1024_1280'] !== '') {
			$data['data-1024-1280'] = $params['item_padding_1024_1280'];
		}

		if ($params['item_padding_768_1024'] !== '') {
			$data['data-768-1024'] = $params['item_padding_768_1024'];
		}

		if ($params['item_padding_600_768'] !== '') {
			$data['data-600-768'] = $params['item_padding_600_768'];
		}

		if ($params['item_padding_480_600'] !== '') {
			$data['data-480-600'] = $params['item_padding_480_600'];
		}

		if ($params['item_padding_480'] !== '') {
			$data['data-480'] = $params['item_padding_480'];
		}

		return $data;
	}

	/**
	 * Return Elements Holder Item classes
	 *
	 * @param $params
	 * @return array
	 */
	private function getElementsHolderItemClass($params) {

		$element_holder_item_class = array();

		if ($params['vertical_alignment'] !== '') {
			$element_holder_item_class[] = 'edgtf-vertical-alignment-'. $params['vertical_alignment'];
		}

		if ($params['horizontal_aligment'] !== '') {
			$element_holder_item_class[] = 'edgtf-horizontal-alignment-'. $params['horizontal_aligment'];
		}

		if ($params['zoom_effect'] == 'yes') {
			$element_holder_item_class[] = 'edgtf-eh-with-zoom';
		}

		if ($params['animation_name'] !== '') {
			$element_holder_item_class[] = 'edgtf-'. $params['animation_name'];
		}


		return implode(' ', $element_holder_item_class);

	}
}
