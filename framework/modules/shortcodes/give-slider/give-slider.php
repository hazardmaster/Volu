<?php
namespace GoodwishEdge\Modules\Shortcodes\CauseSlider;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class CauseSlider implements ShortcodeInterface
{
    private $base;

    public function __construct()
    {
        $this->base = 'edgtf_cause_slider';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase()
    {
        return $this->base;
    }

    public function vcMap()
    {
        vc_map(array(
            'name' => esc_html__('Cause Slider','goodwish'),
            'base' => $this->base,
            'icon' => 'icon-wpb-cause-slider extended-custom-icon',
            'category' => esc_html__('by EDGE','goodwish'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
            	array(
            		'type' => 'textfield',
            		'heading' => esc_html__('Slider Title','goodwish'),
            		'param_name' => 'slider_title'
        		),
            	array(
            		'type' => 'textfield',
            		'heading' => esc_html__('Slider Subtitle','goodwish'),
            		'param_name' => 'slider_subtitle'
        		),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Title Tag','goodwish'),
                    'param_name' => 'title_tag',
                    'value'      => array(
                        ''   => '',
                        'h1' => 'h1',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    )
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Image Size', 'goodwish'),
					'param_name' => 'image_size',
					'value' => array(
						esc_html__('Original', 'goodwish') => 'original',
						esc_html__('Landscape', 'goodwish') => 'landscape',
					),
				),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Give Item Title Tag','goodwish'),
                    'param_name' => 'item_title_tag',
                    'value'      => array(
                        ''   => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    )
                ),
            	array(
            		'type' => 'textfield',
            		'heading' => esc_html__('Button Text','goodwish'),
            		'param_name' => 'button_text',
            		'description' => esc_html__('Default text is "Donate"','goodwish')
        		),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order by','goodwish'),
                    'param_name' => 'orderby',
                    'value' => array(
                        esc_html__('Date','goodwish') => 'date',
                        esc_html__('Title','goodwish') => 'title',
                    ),
					'group' => esc_html__('Query and Layout Options','goodwish')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Sort order','goodwish'),
                    'param_name' => 'order',
                    'value' => array(
                        esc_html__('Descending','goodwish') => 'DESC',
                        esc_html__('Ascending','goodwish') => 'ASC',
                    ),
					'group' => esc_html__('Query and Layout Options','goodwish')
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Number of Give Forms Per Page','goodwish'),
					'param_name' => 'number',
					'value' => '-1',
					'description' => esc_html__('(enter -1 to show all)','goodwish'),
					'group' => esc_html__('Query and Layout Options','goodwish')
				),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Category','goodwish'),
                    'param_name' => 'category',
                    'description' => esc_html__('Category Slug (leave empty for all)','goodwish'),
					'group' => esc_html__('Query and Layout Options','goodwish')
                )
            )
        ));
    }

    public function render($atts, $content = null){

		$args = array(
			'slider_title' => '',
			'slider_subtitle' => '',
            'title_tag' => 'h1',
            'orderby' => 'date',
            'category' => '',
            'order' => 'DESC',
            'number' => '-1',
            'image_size' => 'original',
            'item_title_tag' => 'h3',
            'button_text' => ''
		);

		$params = shortcode_atts($args, $atts);

        extract($params);

        $query_args = $this->getQueryArgs($params);

        $give_forms = new \WP_Query($query_args, $atts);

        $single_params = array();

        $html = '';
       

        $html .= '<div class="edgtf-give-forms-slider-outer edgtf-slick-slider-navigation-style">';

        $html .= goodwish_edge_get_shortcode_module_template_part('templates/give-slider-title-part','give-slider','',$params);

        $html .= '<div class="edgtf-give-forms-slider">';


        if ( $give_forms->have_posts() ) :

            while ( $give_forms->have_posts() ) : $give_forms->the_post();

        		$id = get_the_ID();
        		$single_params['id'] = $id;
        		$single_params['title_tag'] = $params['item_title_tag'];
        		$single_params['thumb_image_size'] = $this->generateImageSize($params);
        		$single_params['button_params'] = $this->getButtonParams($params, $id);

                $html .= goodwish_edge_get_shortcode_module_template_part('templates/give-slider-template','give-slider','',$single_params);

            endwhile; // end of the loop.

        endif;

        wp_reset_postdata();

        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }



    /**
     * Creates an array of args for loop
     *
     * @param $params
     * @return array
     */
    private function getQueryArgs($params){

        $query_array = array(
            'post_type'           => 'give_forms',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $params['orderby'],
            'order'               => $params['order'],
			'posts_per_page'      => $params['number']
        );

        if($params['category'] != ''){
            $query_array['give_forms_category'] = $params['category'];
        }

	
		$paged = '';
		if(empty($params['next_page'])) {
			$paged = goodwish_edge_paged();
		}

		if(!empty($params['next_page'])){
			$query_array['paged'] = $params['next_page'];

		}else{
			$query_array['paged'] = $paged;
		}

        return $query_array;
    }

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumb_image_size = '';
		$image_size = $params['image_size'];
		
		switch ($image_size) {
			case 'landscape':
        		$thumb_image_size = 'goodwish_edge_large_width';
				break;		
			default:
        		$thumb_image_size = 'original';
				break;
		}

		return $thumb_image_size;
	}


	/**
	   * Generates button parameters
	   *
	   * @param $params
	   *
	   * @return array
	*/
	private function getButtonParams($params, $id){
		$button_params = array();

		$button_params['type'] = 'outline-light';

		if ($params['button_text'] !== ''){
			$button_params['text'] = $params['button_text'];
		} else {
			$button_params['text'] = esc_html__('Donate','goodwish');
		}

		$button_params['link'] = get_the_permalink($id);


		return $button_params;
	}

}