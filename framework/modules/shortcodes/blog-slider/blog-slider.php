<?php
namespace GoodwishEdge\Modules\Shortcodes\BlogSlider;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Blog Slider
 */
class BlogSlider implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_blog_slider';

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
	 * @see edgtf_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		$categories_array = array();

		vc_map( array(
			'name' => esc_html__('Blog Slider', 'goodwish'),
			'base' => $this->getBase(),
			'icon'  => 'icon-wpb-blog-slider extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array(
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Slider Type', 'goodwish'),
                    'param_name'	=> 'slider_type',
                    'value'			=> array(
                        esc_html__('Carousel', 'goodwish')		=> 'carousel',
                        esc_html__('Slider', 'goodwish')		=> 'slider',
                    ),
                    'admin_label'	=> true,
                    'description'	=> ''
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Number of Posts', 'goodwish'),
					'param_name' => 'number_of_posts',
					'description' => esc_html__('Leave empty for all posts', 'goodwish')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Selected Posts', 'goodwish'),
					'param_name'	=> 'selected_posts',
					'description'	=> esc_html__('Selected Posts (leave empty for all, delimit by comma)', 'goodwish')
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Order by', 'goodwish'),
					'param_name'	=> 'order_by',
					'value'			=> array(
						esc_html__('Date', 'goodwish')		=> 'date',
						esc_html__('Title', 'goodwish')		=> 'title'
					),
					'admin_label'	=> true,
					'description'	=> ''
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Order', 'goodwish'),
					'param_name'	=> 'order',
					'value'			=> array(
						esc_html__('DESC', 'goodwish')		=> 'desc',
						esc_html__('ASC', 'goodwish')		=> 'asc'
					),
					'admin_label'	=> true,
					'description'	=> ''
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Category Slug', 'goodwish'),
					'param_name' => 'category',
					'value' => '',
					'description' => esc_html__('Leave empty for all or use comma for list', 'goodwish')
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Image', 'goodwish'),
					'param_name'	=> 'show_image',
					'value'			=> array(
						esc_html__('No', 'goodwish')		=> 'no',
						esc_html__('Yes', 'goodwish')		=> 'yes',
					),
					'description'	=> '',
					"dependency" => array("element" => "slider_type", "value" => array("carousel"))
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Image Size', 'goodwish'),
					'param_name'	=> 'image_size',
					'value'			=> array(
						esc_html__('Default', 'goodwish')		=> 'default',
						esc_html__('Square', 'goodwish')		=> 'square',
					),
					'description'	=> '',
                    "dependency" => array("element" => "show_image", "value" => array("yes"))
				),
                array(
                    'type'			=> 'dropdown',
                    'heading'		=> esc_html__('Image Size', 'goodwish'),
                    'param_name'	=> 'image_size_slider',
                    'value'			=> array(
                        esc_html__('Default', 'goodwish')		=> 'default',
                        esc_html__('Square', 'goodwish')		=> 'square',
                        esc_html__('Custom', 'goodwish')		=> 'custom',
                    ),
                    "dependency" => array("element" => "slider_type", "value" => array("slider"))
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
                    "type" => "textfield",
                    "heading" => esc_html__("Image Width", 'goodwish'),
                    "param_name" => "image_width",
                    "value" => "",
                    "description" => esc_html__("Set custom image width", 'goodwish'),
                    "dependency" => array("element" => "image_size_slider", "value" => array("custom"))
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Image Height", 'goodwish'),
                    "param_name" => "image_height",
                    "value" => "",
                    "description" => esc_html__("Set custom image height", 'goodwish'),
                    "dependency" => array("element" => "image_size_slider", "value" => array("custom"))
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Text length', 'goodwish'),
					'param_name' => 'text_length',
					'description' => esc_html__('Number of characters', 'goodwish')
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Box Color', 'goodwish'),
					'param_name' => 'box_color',
					'description' => '',
					'group' => esc_html__('Design Options', 'goodwish')
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
			'number_of_posts'	=> -1,
			'order_by'		 	=> 'date',
			'order'				=> 'DESC',
			'category'			=> '',
			'image_size'		=> 'full',
			'image_size_slider'	=> 'full',
			'slider_type'	 	=> 'carousel',
			'show_image'	 	=> 'no',
			'image_height'	 	=> '',
            'image_width'	 	=> '',
            'selected_posts' 	=> '',
            'text_length' 		=> '110',
            'box_color' 		=> '',
			'title_tag'			=> 'h3',
		);

		$params = shortcode_atts($args, $atts);

		extract($params);
		$params['box_style'] = '';
		if(!empty($params['box_color'])){
			$params['box_style'] = 'background-color:'.$params['box_color'];
		}

		if ( $params['title_tag'] == '' ) {
			if ( $params['slider_type'] == 'slider' ) {
				$params['title_tag'] = 'h2';
			} else {
				$params['title_tag'] = 'h4';
			}
		}

		$args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $number_of_posts,
			'orderby'			=> $order_by,
			'order'				=> $order
		);
		if($category != ''){
			$args['category_name'] = $category;
		}

		$slider_class = 'edgtf-blog-slider-type-'.$slider_type;
		$post_ids = null;
		
		if($selected_posts != ''){
			$post_ids = explode(',', $selected_posts);
			$args['post__in'] = $post_ids;
		}

        if($slider_type == 'slider'){
           if($image_size_slider == 'custom' && $image_width != '' && $image_height != ''){
                $params['image_size_slider'] = 'custom';
                $params['image_width'] = $image_width;
                $params['image_height'] = $image_height;
            }elseif($image_size_slider == 'square') {
               $params['image_size_slider'] = 'goodwish_edge_square';
           }
        }elseif($image_size == 'square') {
            $params['image_size'] = 'goodwish_edge_square';
        }

		if($slider_type == 'carousel'){
			$params['classes'] = array('edgtf-blog-slide-info-holder');
			if($params['show_image'] == 'no')
			$params['classes'][] = 'edgtf-without-image';
		}

		$query = new \WP_Query($args);

		if ( $query->have_posts() ) {

			$html = '';

			$html .= '<div class="edgtf-blog-slider-outer">';
			

			$html .= '<div class="edgtf-blog-slider edgtf-slick-slider-navigation-style '. $slider_class .'" data-type="'.$slider_type.'">';

			while ( $query->have_posts() ) {

				$query->the_post();

				//Get slide HTML from template
				$html .= goodwish_edge_get_shortcode_module_template_part('templates/blog-'.$slider_type, 'blog-slider', '', $params);

			}

			$html .= '</div></div>';


		} else {

			$html = esc_html__('There is no posts!', 'goodwish');

		}

		wp_reset_postdata();

		return $html;

	}
}