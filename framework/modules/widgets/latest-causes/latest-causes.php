<?php

class GoodwishEdgeLatestCauses extends GoodwishEdgeWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'edgtf_latest_causes_widget', // Base ID
			esc_html__('Edge Latest Causes','goodwish'), // Name
			array( 'description' => esc_html__( 'Display latest cause from give plugin', 'goodwish' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'number',
				'type' => 'textfield',
				'title' => esc_html__('Number of posts','goodwish'),
			),
			array(
				'name' => 'title',
				'type' => 'textfield',
				'title' => esc_html__('Widget Title','goodwish'),
			),
			array(
				'name' => 'orderby',
				'type' => 'dropdown',
				'title' => esc_html__('Order By','goodwish'),
				'options' => array(
					'title' => esc_html__('Title','goodwish'),
					'date' => esc_html__('Date','goodwish'),
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => esc_html__('Order','goodwish'),
				'options' => array(
					'ASC' => esc_html__('ASC','goodwish'),
					'DESC' => esc_html__('DESC','goodwish'),
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => esc_html__('Category Slug','goodwish'),
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => esc_html__('Title Tag','goodwish'),
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			),
			array(
				'name' => 'image_size',
				'type' => 'dropdown',
				'title' => esc_html__('Image Size','goodwish'),
				'options' => array(
					""   => "",
					'original' => esc_html__('Original', 'goodwish'),
					'landscape' => esc_html__('Landscape', 'goodwish'),
					'portrait' => esc_html__('Portrait', 'goodwish'),
					'square' => esc_html__('Square', 'goodwish')
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'minimal';
		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'h5';
		}

		echo '<div class="widget edgtf-latest-causes-widget">';
		if($params['title'] !== ''){
			echo goodwish_edge_get_module_part($args['before_title'] . $params['title'] . $args['after_title']);
		}
		//echo '<h4 class="edgtf-widget-title">'.$params['widget_title'].'</h4>';
		echo goodwish_edge_execute_shortcode('edgtf_cause_list', $params);

		echo '</div>'; //close edgtf-latest-posts-widget
	}
}
