<?php
namespace GoodwishEdge\Modules\Shortcodes\UnorderedList;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface{

	private $base;

	function __construct() {
		$this->base='edgtf_unordered_list';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**\
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Edge List - Unordered', 'goodwish'),
			'base' => $this->base,
			'icon' => 'icon-wpb-unordered-list extended-custom-icon',
			'category' => esc_html__('by EDGE', 'goodwish'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Style','goodwish'),
					'param_name' => 'style',
					'value' => array(
                        esc_html__('Square','goodwish') => 'square',
						esc_html__('Circle','goodwish') => 'circle',
					),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Animate List','goodwish'),
					'param_name' => 'animate',
					'value' => array(
						esc_html__('No','goodwish') => 'no',
						esc_html__('Yes','goodwish') => 'yes'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Font size','goodwish'),
					'param_name' => 'font_size',
					'value' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Font Weight','goodwish'),
					'param_name' => 'font_weight',
					'value' => array(
						esc_html__('Default','goodwish') => '',
						esc_html__('Light','goodwish') => 'light',
						esc_html__('Normal','goodwish') => 'normal',
						esc_html__('Bold','goodwish') => 'bold'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Padding left (px)','goodwish'),
					'param_name' => 'padding_left',
					'value' => ''
				),
				array(
					'type' => 'textarea_html',
					'heading' => esc_html__('Content','goodwish'),
					'param_name' => 'content',
					'value' => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
					'description' => ''
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
            'style' => 'square',
            'animate' => '',
            'font_size' => '',
            'font_weight' => '',
            'padding_left' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		
		$list_item_classes = "";

        if ($style != '') {
			if($style == 'circle'){
				$list_item_classes .= ' edgtf-circle';
			}elseif ($style == 'square') {
				$list_item_classes .= ' edgtf-square';
			}
        }

		if ($animate == 'yes') {
			$list_item_classes .= ' edgtf-animate-list';
		}
		
		$list_style = '';
		if($padding_left != '') {
			$list_style .= 'padding-left: ' . $padding_left .'px;';
		}

		if(!empty($font_size)) {
			$list_style .= 'font-size: '.goodwish_edge_filter_px($font_size).'px';
		}

		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
        $html = '<div class="edgtf-unordered-list '.$list_item_classes.'" '.  goodwish_edge_get_inline_style($list_style).'>'.do_shortcode($content).'</div>';
        return $html;
	}
}