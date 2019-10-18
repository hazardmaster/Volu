<?php

namespace GoodwishEdge\Modules\Shortcodes\BlogList;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Edge Blog List', 'goodwish'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => esc_html__('by EDGE', 'goodwish'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Type', 'goodwish'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Boxes', 'goodwish') => 'boxes',
							esc_html__('Standard', 'goodwish') => 'standard',
							esc_html__('Narrow', 'goodwish') => 'narrow',
							esc_html__('Minimal', 'goodwish') => 'minimal',
							esc_html__('Image in box', 'goodwish') => 'image_in_box'
						),
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number of Posts', 'goodwish'),
						'param_name' => 'number_of_posts',
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Number of Columns', 'goodwish'),
						'param_name' => 'number_of_columns',
						'value' => array(
							esc_html__('One', 'goodwish') => '1',
							esc_html__('Two', 'goodwish') => '2',
							esc_html__('Three', 'goodwish') => '3',
							esc_html__('Four', 'goodwish') => '4'
						),
						'description' => '',
						'dependency' => Array('element' => 'type', 'value' => array('boxes', 'standard')),
                        'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order By', 'goodwish'),
						'param_name' => 'order_by',
						'value' => array(
							esc_html__('Title', 'goodwish') => 'title',
							esc_html__('Date', 'goodwish') => 'date'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order', 'goodwish'),
						'param_name' => 'order',
						'value' => array(
							esc_html__('ASC', 'goodwish') => 'ASC',
							esc_html__('DESC', 'goodwish') => 'DESC'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category Slug', 'goodwish'),
						'param_name' => 'category',
						'admin_label' => true,
						'description' => esc_html__('Leave empty for all or use comma for list', 'goodwish')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Image Size', 'goodwish'),
						'param_name' => 'image_size',
						'value' => array(
							esc_html__('Original', 'goodwish') => 'original',
							esc_html__('Landscape', 'goodwish') => 'landscape',
							esc_html__('Square', 'goodwish') => 'square'
						),
						'description' => '',
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                        'save_always' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text length', 'goodwish'),
						'param_name' => 'text_length',
						'description' => esc_html__('Number of characters', 'goodwish')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Title Tag', 'goodwish'),
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Skin', 'goodwish'),
						'param_name' => 'skin',
						'description' => '',
						'value' => array(
							esc_html__('Dark', 'goodwish')   => 'dark',
							esc_html__('Light', 'goodwish') => 'light'
						),
						'group' => esc_html__('Design Options', 'goodwish'),
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Box Color', 'goodwish'),
						'param_name' => 'box_color',
						'description' => '',
						'group' => esc_html__('Design Options', 'goodwish'),
						'dependency' => Array('element' => 'type', 'value' => array('boxes'))
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Disable Box Shadow', 'goodwish'),
						'param_name' => 'disable_box_shadow',
						'value' => array(
							esc_html__('No', 'goodwish')   => 'no',
							esc_html__('Yes', 'goodwish') => 'yes'
						),
						'group' => esc_html__('Design Options', 'goodwish'),
						'dependency' => Array('element' => 'type', 'value' => array('boxes'))
					)
				)
		) );

	}
	public function render($atts, $content = null) {
		
		$default_atts = array(
			'type' 					=> 'boxes',
            'number_of_posts' 		=> '',
            'number_of_columns'		=> '',
            'image_size'			=> 'original',
            'order_by'				=> '',
            'order'					=> '',
            'category'				=> '',
            'title_tag'				=> 'h3',
			'text_length'			=> '110',
			'skin'					=> 'dark',
			'box_color'				=> '',
			'disable_box_shadow'    => 'no'
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getBlogHolderClasses($params);

		$params['box_style'] = '';
		if(!empty($params['box_color'])){
			$params['box_style'] = 'background-color:'.$params['box_color'].';';
		}
		if($params['disable_box_shadow'] == 'yes'){
			$params['box_style'] .= 'box-shadow:none;';
		}
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	
     
		
        $thumbImageSize = $this->generateImageSize($params);
		$params['thumb_image_size'] = $thumbImageSize;

		$html ='';
        $html .= goodwish_edge_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		return $html;
		
	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';
		
		$columnNumber = $this->getColumnNumberClass($params);

		$skin = $this->getSkinClass($params);
		
		if(!empty($params['type'])){
			switch($params['type']){
				case 'image_in_box':
					$holderClasses = 'edgtf-image-in-box';
				break;
				case 'boxes' : 
					$holderClasses = 'edgtf-boxes';
				break;
				case 'standard' :
					$holderClasses = 'edgtf-standard';
					break;
				case 'masonry' : 
					$holderClasses = 'edgtf-masonry';
				break;
				case 'minimal' :
					$holderClasses = 'edgtf-minimal';
				break;
				case 'narrow' :
					$holderClasses = 'edgtf-narrow';
				break;
				default: 
					$holderClasses = 'edgtf-boxes';
			}
		}
		
		$holderClasses .= ' '.$columnNumber.' '.$skin;
		
		return $holderClasses;
		
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getColumnNumberClass($params){
		
		$columnsNumber = '';
		$type = $params['type'];
		$columns = $params['number_of_columns'];
		
        if ($type == 'boxes' || $type == 'standard') {
            switch ($columns) {
                case 1:
                    $columnsNumber = 'edgtf-one-column';
                    break;
                case 2:
                    $columnsNumber = 'edgtf-two-columns';
                    break;
                case 3:
                    $columnsNumber = 'edgtf-three-columns';
                    break;
                case 4:
                    $columnsNumber = 'edgtf-four-columns';
                    break;
                default:
					$columnsNumber = 'edgtf-one-column';
                    break;
            }
        }
		return $columnsNumber;
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getSkinClass($params){
		
		$skinClass = '';
		if ($params['skin'] == 'light') {
			$skinClass = 'edgtf-blog-list-holder-light-skin';
		}
		
		return $skinClass;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);
		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];
		
		if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'goodwish_edge_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'goodwish_edge_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
		return $thumbImageSize;
	}
	
}
