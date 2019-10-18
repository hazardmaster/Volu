<?php
namespace GoodwishEdge\Modules\Shortcodes\Tabs;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 */

class Tabs implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'edgtf_tabs';
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
			'name' => esc_html__('Edge Tabs', 'goodwish'),
			'base' => $this->getBase(),
			'as_parent' => array('only' => 'edgtf_tab'),
			'content_element' => true,
			'show_settings_on_create' => true,
			'category' => esc_html__('by EDGE', 'goodwish'),
			'icon' => 'icon-wpb-tabs extended-custom-icon',
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin-label' => true,
					'param_name' => 'style',
					'value' => array(
						esc_html__('Horizontal','goodwish') => 'horizontal_tab',
						esc_html__('Vertical','goodwish') => 'vertical_tab'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin-label' => true,
					'heading' => esc_html__('Title Layout','goodwish'),
					'param_name' => 'title_layout',
					'value' => array(
						esc_html__('Without Icon','goodwish') => 'without_icon',
						esc_html__('With Icon','goodwish') => 'with_icon',
						esc_html__('Only Icon','goodwish') => 'only_icon'
					),
					'save_always' => true,
					'description' => ''
				),
			)
		));

	}

	public function render($atts, $content = null) {
		$args = array(
			'style' => 'horizontal_tab',
			'title_layout' => 'without_icon',
		);
		
		$args = array_merge($args, goodwish_edge_icon_collections()->getShortcodeParams());
        $params  = shortcode_atts($args, $atts);
		
		extract($params);
		
		// Extract tab titles
		preg_match_all('/tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
		$tab_titles = array();

		/**
		 * get tab titles array
		 *
		 */
		if (isset($matches[0])) {
			$tab_titles = $matches[0];
		}
		
		$tab_title_array = array();
		
		foreach($tab_titles as $tab) {
			preg_match('/tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
			$tab_title_array[] = $tab_matches[1][0];
		}
		
		$params['tabs_titles'] = $tab_title_array;
		$params['tab_class'] = $this->getTabClass($params);
		$params['tab_title_layout'] = $this->getTabTitleLayoutClass($params);
		$params['content'] = $content;
		
		$output = '';
		
		$output .= goodwish_edge_get_shortcode_module_template_part('templates/tab-template','tabs', '', $params);
		
		return $output;
		}
		
		/**
	   * Generates tabs class
	   *
	   * @param $params
	   *
	   * @return string
	   */
	private function getTabClass($params){
		$tabStyle = $params['style'];
		$tabClass = '';
		
		switch ($tabStyle) {
			case 'vertical_tab':
				$tabClass = 'edgtf-vertical-tab';
				break;
			default :
				$tabClass = 'edgtf-horizontal-tab';
				break;
		}

		return $tabClass;
	}

	/**
	   * Generates tabs class when icon is enabled
	   *
	   * @param $params
	   *
	   * @return string
	   */
	private function getTabTitleLayoutClass($params){
		$tabTitleLayout = $params['title_layout'];
		$tabIconClass = '';

		switch ($tabTitleLayout) {
			case 'with_icon':
				$tabIconClass = 'edgtf-tab-with-icon';
				break;
			case 'only_icon':
				$tabIconClass = 'edgtf-tab-only-icon';
				break;
			default :
				$tabIconClass = 'edgtf-tab-without-icon';
				break;
		}

		return $tabIconClass;
	}
}