<?php
namespace GoodwishEdge\Modules\Shortcodes\Team;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class Team
 */
class Team implements ShortcodeInterface
{
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_team';

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
	public function vcMap()	{

		$team_social_icons_array = array();
		for ($x = 1; $x<6; $x++) {
			$teamIconCollections = goodwish_edge_icon_collections()->getCollectionsWithSocialIcons();
			foreach($teamIconCollections as $collection_key => $collection) {

				$team_social_icons_array[] = array(
					'type' => 'dropdown',
					'heading' => sprintf(esc_html__('Social Icon %s ', 'goodwish'), $x),
					'param_name' => 'team_social_'.$collection->param.'_'.$x,
					'value' => $collection->getSocialIconsArrayVC(),
					'dependency' => Array('element' => 'team_social_icon_pack', 'value' => array($collection_key))
				);

			}

			$team_social_icons_array[] = array(
				'type' => 'textfield',
				'heading' => sprintf(esc_html__('Social Icon %s Link', 'goodwish'), $x),
				'param_name' => 'team_social_icon_'.$x.'_link',
				'dependency' => array('element' => 'team_social_icon_pack', 'value' => goodwish_edge_icon_collections()->getIconCollectionsKeys())
			);

			$team_social_icons_array[] = array(
				'type' => 'dropdown',
				'heading' => sprintf(esc_html__('Social Icon %s Target', 'goodwish'),$x),
				'param_name' => 'team_social_icon_'.$x.'_target',
				'value' => array(
					'' => '',
					esc_html__('Self','goodwish') => '_self',
					esc_html__('Blank','goodwish') => '_blank'
				),
				'dependency' => Array('element' => 'team_social_icon_'.$x.'_link', 'not_empty' => true)
			);

		}

		vc_map( array(
			'name' => esc_html__('Edge Team', 'goodwish'),
			'base' => $this->base,
			'category' => esc_html__('by EDGE', 'goodwish'),
			'icon' => 'icon-wpb-team extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(
				array(
					array(
						'type' => 'dropdown',
						'admin_label' => true,
						'heading' => esc_html__('Type','goodwish'),
						'param_name' => 'team_type',
						'value' => array(
							esc_html__('Main Info Below Image','goodwish')  => 'main-info-below-image',
							esc_html__('Main Info on Hover','goodwish')     => 'main-info-on-hover'
						),
						'save_always' => true
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image','goodwish'),
						'param_name' => 'team_image'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Grayscale Image','goodwish'),
						'param_name' => 'grayscale',
						'value' => array(
							esc_html__('No','goodwish') => 'no',
							esc_html__('Yes','goodwish') => 'yes'
						),
						'dependency'	=> array(
							'element'	=> 'team_type',
							'value'		=> array('main-info-below-image')
						)
					),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Team Link','goodwish'),
                        'admin_label' => true,
                        'param_name' => 'team_image_link',
                    ),
                    array(
                        'type'       => 'dropdown',
                        'heading'    => esc_html__('Team Link Target','goodwish'),
                        'param_name' => 'team_image_link_target',
                        'value'      => array(
                            ''     => '',
                            esc_html__('Self', 'goodwish')  => '_self',
                            esc_html__('Blank', 'goodwish') => '_blank'
                        ),
                        'dependency' => array('element' => 'team_image_link', 'not_empty' => true),
                    ),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Name','goodwish'),
						'admin_label' => true,
						'param_name' => 'team_name'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Name Tag','goodwish'),
						'param_name' => 'team_name_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'dependency' => array('element' => 'team_name', 'not_empty' => true)
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Position','goodwish'),
						'admin_label' => true,
						'param_name' => 'team_position'
					),
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Description','goodwish'),
						'admin_label' => true,
						'param_name' => 'team_description'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Social Icon Pack','goodwish'),
						'param_name' => 'team_social_icon_pack',
						'admin_label' => true,
						'value' => array_merge(array('' => ''),goodwish_edge_icon_collections()->getIconCollectionsVCExclude('linea_icons')),
						'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Social Icons Type','goodwish'),
						'param_name' => 'team_social_icon_type',
						'value' => array(
							esc_html__('Normal','goodwish') => 'normal',
							esc_html__('Circle','goodwish') => 'circle',
							esc_html__('Square','goodwish') => 'square'
						),
						'save_always' => true,
						'dependency' => array('element' => 'team_social_icon_pack', 'value' => goodwish_edge_icon_collections()->getIconCollectionsKeys())
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Color','goodwish'),
						'param_name' => 'title_color',
						'description' => '',
						'group' => esc_html__('Design Options','goodwish'),
						'dependency' => array('element' => 'team_type', 'value' => 'main-info-below-image')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Position Color','goodwish'),
						'param_name' => 'position_color',
						'description' => '',
						'group' => esc_html__('Design Options','goodwish'),
						'dependency' => array('element' => 'team_type', 'value' => 'main-info-below-image')
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Text Color','goodwish'),
						'param_name' => 'text_color',
						'description' => '',
						'group' => esc_html__('Design Options','goodwish'),
						'dependency' => array('element' => 'team_type', 'value' => 'main-info-below-image')
					)
				),
				$team_social_icons_array
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
	public function render($atts, $content = null)
	{

		$args = array(
			'team_image' => '',
			'grayscale' => 'no',
            'team_image_link' => '',
            'team_image_link_target' => '_self',
			'team_type' => 'main-info-on-hover',
			'team_name' => '',
			'team_name_tag' => 'h4',
			'team_position' => '',
			'team_description' => '',
			'team_social_icon_pack' => '',
			'team_social_icon_type' => 'normal_social',
			'title_color' => '',
			'position_color' => '',
			'text_color' => ''
		);

		$team_social_icons_form_fields = array();
		$number_of_social_icons = 5;

		for ($x = 1; $x <= $number_of_social_icons; $x++) {

			foreach (goodwish_edge_icon_collections()->iconCollections as $collection_key => $collection) {
				$team_social_icons_form_fields['team_social_' . $collection->param . '_' . $x] = '';
			}

			$team_social_icons_form_fields['team_social_icon_'.$x.'_link'] = '';
			$team_social_icons_form_fields['team_social_icon_'.$x.'_target'] = '';

		}

		$args = array_merge($args, $team_social_icons_form_fields);

		$params = shortcode_atts($args, $atts);

		$params['number_of_social_icons'] = 5;
		$params['team_name_tag'] = $this->getTeamNameTag($params, $args);
		$params['team_social_icons'] = $this->getTeamSocialIcons($params);
		$params['title_style'] = '';
		$params['position_style'] = '';
		$params['text_style'] = '';

		if(!empty($params['title_color'])){
			$params['title_style'] = 'color:'.$params['title_color'];
		}
		if(!empty($params['position_color'])){
			$params['position_style'] = 'color:'.$params['position_color'];
		}
		if(!empty($params['text_color'])){
			$params['text_style'] = 'color:'.$params['text_color'];
		}
		$params['team_classes'] = $this->getTeamClasses($params);

		//Get HTML from template based on type of team
		$html = goodwish_edge_get_shortcode_module_template_part('templates/' . $params['team_type'], 'team', '', $params);

		return $html;

	}

	/**
	 * Return correct heading value. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getTeamNameTag($params, $args) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['team_name_tag'], $headings_array)) ? $params['team_name_tag'] : $args['team_name_tag'];

	}

	private function getTeamSocialIcons($params) {

		extract($params);
		$social_icons = array();

		if ($team_social_icon_pack !== '') {

			$icon_pack = goodwish_edge_icon_collections()->getIconCollection($team_social_icon_pack);
			$team_social_icon_type_label = 'team_social_' . $icon_pack->param;
			$team_social_icon_param_label = $icon_pack->param;

			for ( $i = 1; $i <= $number_of_social_icons; $i++ ) {

				$team_social_icon = ${$team_social_icon_type_label . '_' . $i};
				$team_social_link = ${'team_social_icon_' . $i . '_link'};
				$team_social_target = ${'team_social_icon_' . $i . '_target'};

				if ($team_social_icon !== '') {

					$team_icon_params = array();
					$team_icon_params['icon_pack'] = $team_social_icon_pack;
					$team_icon_params[$team_social_icon_param_label] =   $team_social_icon;
					$team_icon_params['link'] = ($team_social_link !== '') ? $team_social_link : '';
					$team_icon_params['target'] = ($team_social_target !== '') ? $team_social_target : '';
					$team_icon_params['type'] = ($team_social_icon_type !== '') ? $team_social_icon_type : '';

					$social_icons[] = goodwish_edge_execute_shortcode('edgtf_icon', $team_icon_params);
				}

			}

		}

		return $social_icons;

	}

	private function getTeamClasses($params) {

		$class = array($params['team_type']);
		if($params['grayscale'] == 'yes'){
			$class[] = 'edgtf-team-image-grayscale';
		}

		return implode(' ', $class);
	}

}