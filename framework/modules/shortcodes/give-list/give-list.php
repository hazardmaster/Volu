<?php
namespace GoodwishEdge\Modules\Shortcodes\CauseList;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class CauseList implements ShortcodeInterface
{
    private $base;

    public function __construct()
    {
        $this->base = 'edgtf_cause_list';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase()
    {
        return $this->base;
    }

    public function vcMap()
    {
        vc_map(array(
            'name' => esc_html__('Cause List','goodwish'),
            'base' => $this->base,
            'icon' => 'icon-wpb-cause-list extended-custom-icon',
            'category' => esc_html__('by EDGE','goodwish'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
            	array(
					'type' => 'dropdown',
					'heading' => esc_html__('Type', 'goodwish'),
					'param_name' => 'type',
					'value' => array(
						esc_html__('Standard', 'goodwish') => 'standard',
						esc_html__('Minimal', 'goodwish') => 'minimal',
					),
        		),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Item Background Color','goodwish'),
                    'param_name' => 'item_background_color',
                    'dependency' => array('element' => 'type', 'value' => array('standard'))
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Image Size', 'goodwish'),
					'param_name' => 'image_size',
					'value' => array(
						esc_html__('Original', 'goodwish') => 'original',
						esc_html__('Landscape', 'goodwish') => 'landscape',
						esc_html__('Portrait', 'goodwish') => 'portrait',
						esc_html__('Square', 'goodwish') => 'square'
					),
				),
                array(
                    'type'       => 'dropdown',
                    'heading'    => esc_html__('Title Tag','goodwish'),
                    'param_name' => 'title_tag',
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
            		'description' => esc_html__('Default text is "Donate"','goodwish'),
            		'dependency' => array('element' => 'type', 'value' => 'standard')
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
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Number of Columns','goodwish'),
					'param_name' => 'columns',
					'value' => array(
						esc_html__('Default','goodwish') => '',
						esc_html__('One','goodwish') => '1',
						esc_html__('Two','goodwish') => '2',
						esc_html__('Three','goodwish') => '3',
						esc_html__('Four','goodwish') => '4',
						esc_html__('Five','goodwish') => '5',
					),
					'description' => esc_html__('Default value is Three','goodwish'),
            		'dependency' => array('element' => 'type', 'value' => 'standard'),
					'group' => esc_html__('Query and Layout Options','goodwish')
				),
            )
        ));
    }

    public function render($atts, $content = null){

		$args = array(
			'type' => 'standard',
            'item_background_color' => '',
            'orderby' => 'date',
            'category' => '',
            'order' => 'DESC',
            'number' => '-1',
            'image_size' => 'original',
            'columns' => '3',
            'title_tag' => 'h3',
            'button_text' => ''
		);

		$params = shortcode_atts($args, $atts);

        extract($params);

        $query_args = $this->getQueryArgs($params);

        $give_forms = new \WP_Query($query_args, $atts);

        $single_params = array();

        $template = '';
        if ($type == 'minimal'){
        	$template = '-minimal';
        }

        $html = '';
       

        $html  .= '<div class="edgtf-give-forms-list edgtf-columns-' . $columns .' edgtf-gfl-'.$type.'">';
        $html  .= '<div class="edgtf-give-forms-list-inner">';

        if ( $give_forms->have_posts() ) :

            while ( $give_forms->have_posts() ) : $give_forms->the_post();

        		$id = get_the_ID();
        		$single_params['id'] = $id;
        		$single_params['title_tag'] = $params['title_tag'];
        		$single_params['thumb_image_size'] = $this->generateImageSize($params);
        		$single_params['button_params'] = $this->getButtonParams($params, $id);
        		$single_params['categories'] = $this->getGiveFormCats($id);
                $single_params['cause_standard_style'] = $this->getItemStandardStyle($params);

                $html .= goodwish_edge_get_shortcode_module_template_part('templates/give-list'.$template.'-template','give-list','',$single_params);

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
        		$thumb_image_size = 'goodwish_edge_landscape';
				break;
			case 'portrait':
        		$thumb_image_size = 'goodwish_edge_portrait';
				break;
			case 'square':
        		$thumb_image_size = 'goodwish_edge_square';
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

		if ($params['button_text'] !== ''){
			$button_params['text'] = $params['button_text'];
		} else {
			$button_params['text'] = esc_html__('Donate','goodwish');
		}

		$button_params['link'] = get_the_permalink($id);


		return $button_params;
	}

    /**
     * Return event list standard item style
     *
     * @param $params
     *
     * @return string
     */
    public function getItemStandardStyle($params){
        $style = array();

        if ($params['item_background_color'] !== ''){
            $style[] = 'background-color: '.$params['item_background_color'];
        }

        return implode('; ', $style);
    }

    /**
     * Gets give forms categories based on $id
     *
     * @param $id
     * @return string
     */
    private function getGiveFormCats($id){
        $terms = get_the_terms( $id, 'give_forms_category');
        $cats_html = array();

        if (is_array($terms) && count($terms)) {
	        foreach($terms as $term){
	        	$link = get_term_link($term->term_id);
	        	$cats_html[] = '<a href="'.$link.'" target="_blank">'.$term->slug.'</a>';
	        }
	    }

        return implode('/', $cats_html);
    }

}