<?php
namespace GoodwishEdge\Modules\Shortcodes\Banner;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class Banner implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'edgtf_banner';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Edge Banner', 'goodwish'),
					'base' => $this->base,
					'category' => esc_html__('by EDGE', 'goodwish'),
					'icon' => 'icon-wpb-banner extended-custom-icon',
					'params' => array(
						array(
							'type' => 'attach_image',
							'class' => '',
							'heading' => esc_html__('Image', 'goodwish'),
							'param_name' => 'image',
							'value' => '',
							'description' => ''
						),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Hover overlay Color', 'goodwish'),
                            'param_name' => 'overlay_color',
                            'description' => '',
                            'admin_label' => true
                        ),
						array(
							'type' => 'textfield',
							'admin_label' => true,
							'heading' => esc_html__('Title', 'goodwish'),
							'param_name' => 'title',
							'value' => '',
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'admin_label' => true,
							'heading' => esc_html__('Title Tag', 'goodwish'),
							'param_name' => 'title_tag',
							'value'       => array(
								esc_html__('Default', 'goodwish')  => '',
								esc_html__('Heading 1', 'goodwish')  => 'h1',
								esc_html__('Heading 2', 'goodwish')  => 'h2',
								esc_html__('Heading 3', 'goodwish')  => 'h3',
								esc_html__('Heading 4', 'goodwish')  => 'h4',
								esc_html__('Heading 5', 'goodwish')  => 'h5',
								esc_html__('Heading 6', 'goodwish') => 'h6'
							),
							'description' => ''
						),
						array(
							'type' => 'textfield',
							'admin_label' => true,
							'heading' => esc_html__('Title Font Size', 'goodwish'),
							'param_name' => 'title_font_size',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Title Color', 'goodwish'),
							'param_name' => 'title_color',
							'description' => '',
							'admin_label' => true
						),
						array(
							'type' => 'textfield',
							'admin_label' => true,
							'heading' => esc_html__('Subtitle', 'goodwish'),
							'param_name' => 'subtitle',
							'value' => '',
							'description' => ''
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Subtitle Color', 'goodwish'),
							'param_name' => 'subtitle_color',
							'description' => '',
							'admin_label' => true
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Link', 'goodwish'),
							'param_name' => 'link',
							'value' => '',
							'description' => ''
						),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Link Text', 'goodwish'),
                            'param_name' => 'link_text',
                            'value' => '',
                            'description' => ''
                        ),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Link Target', 'goodwish'),
							'param_name'  => 'target',
							'value'       => array(
								esc_html__('Self', 'goodwish')  => '_self',
								esc_html__('Blank', 'goodwish') => '_blank'
							),
							'dependency'  => array('element' => 'link', 'not_empty' => true)
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__('Link Color', 'goodwish'),
							'param_name' => 'link_color',
							'description' => '',
							'admin_label' => true
						),
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'image'     		=> '',
            'overlay_color'     => '',
			'title'     		=> '',
			'title_tag' 		=> 'h3',
			'subtitle'  		=> '',
			'title_color'  		=> '',
			'subtitle_color'	=> '',
			'link'     			=> '',
            'link_text'     	=> '',
			'target'    		=> '_self',
			'title_font_size'	=> '',
			'link_color'		=> ''
		);
		
		$params = 	shortcode_atts($args, $atts);
		extract($params);

		$params['image']= wp_get_attachment_url($params['image']);
        $params['img_hover_style'] =  $this->getImageHoverStyle($params);
		$params['title_font_style'] =  $this->getTitleFontStyle($params);
		$params['subtitle_font_style'] =  $this->getSubtitleFontStyle($params);
		$params['link_style'] =  $this->getLinkStyle($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/banner-template', 'banner', '', $params);

		return $html;
	}

	private function getTitleFontStyle($params){
		$titleStylesArray = array();

		if(!empty($params['title_color'])) {
			$titleStylesArray[] = 'color:' . $params['title_color'];
		}

		if(!empty($params['title_font_size'])) {
			$titleStylesArray[] = 'font-size:' . $params['title_font_size'];
		}

		return implode(';', $titleStylesArray);
	}

	private function getSubtitleFontStyle($params){
		$subtitleStylesArray = array();
		
		if(!empty($params['subtitle_color'])) {
			$subtitleStylesArray[] = 'color:' . $params['subtitle_color'];
		}

		return implode(';', $subtitleStylesArray);
	}

	private function getLinkStyle($params){
		$linkStylesArray = array();
		
		if(!empty($params['link_color'])) {
			$linkStylesArray[] = 'color:' . $params['link_color'];
		}

		return implode(';', $linkStylesArray);
	}

    private function getImageHoverStyle($params){
        $imgHoverStylesArray = array();

        if(!empty($params['overlay_color'])) {
            $imgHoverStylesArray[] = 'background-color:' . $params['overlay_color'];
        }

        return implode(';', $imgHoverStylesArray);
    }

}
