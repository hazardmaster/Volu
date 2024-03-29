<?php
namespace GoodwishEdge\Modules\Shortcodes\PieCharts\PieChartBasic;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class PieChartBasic
 */
class PieChartBasic implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_pie_chart';

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
			'name' => esc_html__('Edge Pie Chart', 'goodwish'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-pie-chart extended-custom-icon',
			'category' => esc_html__('by EDGE', 'goodwish'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Type of Central text','goodwish'),
					'param_name' => 'type_of_central_text',
					'value' => array(
						esc_html__('Percent','goodwish')  => 'percent',
						esc_html__('Title','goodwish') => 'title'
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Percentage','goodwish'),
					'param_name' => 'percent',
					'description' => '',
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title','goodwish'),
					'param_name' => 'title',
					'description' => '',
					'admin_label' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title Tag','goodwish'),
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
					'type' => 'textfield',
					'heading' => esc_html__('Text','goodwish'),
					'param_name' => 'text',
					'description' => '',
					'admin_label' => true
				),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Active Color','goodwish'),
                    'param_name' => 'active_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options','goodwish')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Inactive Color','goodwish'),
                    'param_name' => 'inactive_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options','goodwish')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title Color','goodwish'),
                    'param_name' => 'title_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options','goodwish')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Percent Color','goodwish'),
                    'param_name' => 'percent_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options','goodwish')
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Size(px)','goodwish'),
					'param_name' => 'size',
					'description' => '',
					'admin_label' => true,
					'group' => esc_html__('Design Options', 'goodwish')
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Margin below chart (px)','goodwish'),
					'param_name' => 'margin_below_chart',
					'description' => '',
					'group' => esc_html__('Design Options', 'goodwish')
				),
			)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'size' => '',
			'type_of_central_text' => 'percent',
			'title' => '',
			'title_tag' => 'h4',
			'percent' => '',
			'text' => '',
            'active_color' => '',
            'inactive_color' => '',
            'title_color' => '',
            'percent_color' => '',
			'margin_below_chart' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['title_tag'] = $this->getValidTitleTag($params, $args);
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);
        $params['title_pie_chart_style'] = $this->getTitlePieChartStyle($params);
        $params['percent_pie_chart_style'] = $this->getPercentPieChartStyle($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/pie-chart-basic', 'piecharts/piechartbasic', '', $params);

		return $html;


	}

	/**
	 * Return correct heading value. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @param $args
	 */
	private function getValidTitleTag($params, $args) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

	}

	/**
	 * Return data attributes for Pie Chart
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartData($params) {

		$pieChartData = array();

		if( $params['size'] !== '' ) {
			$pieChartData['data-size'] = $params['size'];
		}
		if( $params['percent'] !== '' ) {
			$pieChartData['data-percent'] = $params['percent'];
		}
        if( $params['active_color'] !== '') {
            $pieChartData['data-bar-color'] = $params['active_color'];
        }
        if( $params['inactive_color'] !== '') {
            $pieChartData['data-track-color'] = $params['inactive_color'];
        }

		return $pieChartData;

	}

	private function getPieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['margin_below_chart'] !== '') {
			$pieChartStyle[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
		}

		return $pieChartStyle;

	}

    /**
     * Return Title Pie Chart style
     *
     * @param $params
     * @return array
     */
    private function getTitlePieChartStyle($params) {

        $pieChartStyle = array();

        if ($params['title_color'] !== '') {
            $pieChartStyle[] = 'color: ' . $params['title_color'];
        }

        return $pieChartStyle;

    }

    /**
     * Return Percent Pie Chart style
     *
     * @param $params
     * @return array
     */
    private function getPercentPieChartStyle($params) {

        $pieChartStyle = array();

        if ($params['percent_color'] !== '') {
            $pieChartStyle[] = 'color: ' . $params['percent_color'];
        }

        return $pieChartStyle;

    }

}