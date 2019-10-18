<?php
namespace GoodwishEdge\Modules\Shortcodes\Icon;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Icon
 * @package GoodwishEdge\Modules\Shortcodes\Icon
 */
class Icon implements ShortcodeInterface {


    /**
     * Icon constructor.
     */
    public function __construct() {
        $this->base = 'edgtf_icon';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     *
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Edge Icon', 'goodwish'),
            'base'                      => $this->base,
            'category'                  =>  esc_html__('by EDGE', 'goodwish'),
            'icon'                      => 'icon-wpb-icons extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    => array_merge(
                \GoodwishEdgeIconCollections::get_instance()->getVCParamsArray(),
                array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Size', 'goodwish'),
                        'admin_label' => true,
                        'param_name'  => 'size',
                        'value'       => array(
                            esc_html__('Tiny', 'goodwish')       => 'edgtf-icon-tiny',
                            esc_html__('Small', 'goodwish')      => 'edgtf-icon-small',
                            esc_html__('Medium', 'goodwish')     => 'edgtf-icon-medium',
                            esc_html__('Large', 'goodwish')      => 'edgtf-icon-large',
                            esc_html__('Very Large', 'goodwish') => 'edgtf-icon-huge'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'admin_label' => true,
                        'heading'     => esc_html__('Custom Size (px)', 'goodwish'),
                        'param_name'  => 'custom_size',
                        'value'       => ''
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Type', 'goodwish'),
                        'param_name'  => 'type',
                        'admin_label' => true,
                        'value'       => array(
                            esc_html__('Normal', 'goodwish') => 'normal',
                            esc_html__('Circle', 'goodwish') => 'circle',
                            esc_html__('Square', 'goodwish') => 'square'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Border radius', 'goodwish'),
                        'param_name'  => 'border_radius',
                        'description' => esc_html__('Please insert border radius(Rounded corners) in px. For example: 4 ', 'goodwish'),
                        'dependency'  => array('element' => 'type', 'value' => array('square'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Shape Size (px)', 'goodwish'),
                        'param_name'  => 'shape_size',
                        'admin_label' => true,
                        'value'       => '',
                        'description' => '',
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Icon Color', 'goodwish'),
                        'param_name'  => 'icon_color',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Border Color', 'goodwish'),
                        'param_name'  => 'border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Border Width', 'goodwish'),
                        'param_name'  => 'border_width',
                        'admin_label' => true,
                        'description' => esc_html__('Enter just number. Omit pixels', 'goodwish'),
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Background Color', 'goodwish'),
                        'param_name'  => 'background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Icon Color', 'goodwish'),
                        'param_name'  => 'hover_icon_color',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Border Color', 'goodwish'),
                        'param_name'  => 'hover_border_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Hover Background Color', 'goodwish'),
                        'param_name'  => 'hover_background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Margin', 'goodwish'),
                        'param_name'  => 'margin',
                        'admin_label' => true,
                        'description' => 'Margin (top right bottom left)'
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Icon Animation', 'goodwish'),
                        'param_name'  => 'icon_animation',
                        'admin_label' => true,
                        'value'       => array(
                            esc_html__('No', 'goodwish')  => '',
                            esc_html__('Yes', 'goodwish') => 'yes'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Icon Animation Delay (ms)', 'goodwish'),
                        'param_name'  => 'icon_animation_delay',
                        'value'       => '',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'icon_animation', 'value' => 'yes')
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Link', 'goodwish'),
                        'param_name'  => 'link',
                        'value'       => '',
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'checkbox',
                        'heading'     => esc_html__('Use Link as Anchor', 'goodwish'),
                        'value'       => array('Use this icon as Anchor?' => 'yes'),
                        'param_name'  => 'anchor_icon',
                        'admin_label' => true,
                        'description' => esc_html__('Check this box to use icon as anchor link (eg. #contact)', 'goodwish'),
                        'dependency'  => Array('element' => 'link', 'not_empty' => true)
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Target', 'goodwish'),
                        'param_name'  => 'target',
                        'admin_label' => true,
                        'value'       => array(
                            esc_html__('Self', 'goodwish')  => '_self',
                            esc_html__('Blank', 'goodwish') => '_blank'
                        ),
                        'save_always' => true,
                        'dependency'  => array('element' => 'link', 'not_empty' => true)
                    )
                )
            )
        ));
    }

    /**
     * Renders shortcode's HTML
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size'                   => '',
            'custom_size'            => '',
            'type'                   => 'normal',
            'border_radius'          => '',
            'shape_size'             => '',
            'icon_color'             => '',
            'border_color'           => '',
            'border_width'           => '',
            'background_color'       => '',
            'hover_icon_color'       => '',
            'hover_border_color'     => '',
            'hover_background_color' => '',
            'margin'                 => '',
            'icon_animation'         => '',
            'icon_animation_delay'   => '',
            'link'                   => '',
            'anchor_icon'            => '',
            'target'                 => ''
        );

        $default_atts = array_merge($default_atts, goodwish_edge_icon_collections()->getShortcodeParams());
        $params       = shortcode_atts($default_atts, $atts);

        $iconPackName = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        //generate icon holder classes
        $iconHolderClasses = array('edgtf-icon-shortcode', $params['type']);

        if($params['icon_animation'] == 'yes') {
            $iconHolderClasses[] = 'edgtf-icon-animation';
        }

        if($params['custom_size'] == '') {
            $iconHolderClasses[] = $params['size'];
        }

        //prepare params for template
        $params['icon']                  = $params[$iconPackName];
        $params['icon_holder_classes']   = $iconHolderClasses;
        $params['icon_holder_styles']    = $this->generateIconHolderStyles($params);
        $params['icon_holder_data']      = $this->generateIconHolderData($params);
        $params['icon_params']           = $this->generateIconParams($params);
        $params['icon_animation_holder'] = isset($params['icon_animation']) && $params['icon_animation'] == 'yes';
        $params['icon_animation_holder_styles'] = $this->generateIconAnimationHolderStyles($params);
		$params['link_class'] = $this->getLinkClass($params);

        $html = goodwish_edge_get_shortcode_module_template_part('templates/icon', 'icon', '', $params);

        return $html;
    }

    /**
     * Generates icon parameters array
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconParams($params) {
        $iconParams = array('icon_attributes' => array());

        $iconParams['icon_attributes']['style'] = $this->generateIconStyles($params);
        $iconParams['icon_attributes']['class'] = 'edgtf-icon-element';

        return $iconParams;
    }

    /**
     * Generates icon styles array
     *
     * @param $params
     *
     * @return string
     */
    private function generateIconStyles($params) {
        $iconStyles = array();

        if(!empty($params['icon_color'])) {
            $iconStyles[] = 'color: '.$params['icon_color'];
        }

        if(($params['type'] !== 'normal' && !empty($params['shape_size'])) ||
           ($params['type'] == 'normal')
        ) {
            if(!empty($params['custom_size'])) {
                $iconStyles[] = 'font-size:'.goodwish_edge_filter_px($params['custom_size']).'px';
            }
        }

        return implode(';', $iconStyles);
    }

    /**
     * Generates icon holder styles for circle and square icon type
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconHolderStyles($params) {
        $iconHolderStyles = array();

		if(isset($params['margin']) && $params['margin'] !== '') {
			$iconHolderStyles[] = 'margin: '.$params['margin'];
		}

        //generate styles attribute only if type isn't normal
        if(isset($params['type']) && $params['type'] !== 'normal') {

            $shapeSize = '';
            if(!empty($params['shape_size'])) {
                $shapeSize = $params['shape_size'];
            } elseif(!empty($params['custom_size'])) {
                $shapeSize = $params['custom_size'];
            }

            if(!empty($shapeSize)) {
                $iconHolderStyles[] = 'width: '.goodwish_edge_filter_px($shapeSize).'px';
                $iconHolderStyles[] = 'height: '.goodwish_edge_filter_px($shapeSize).'px';
                $iconHolderStyles[] = 'line-height: '.goodwish_edge_filter_px($shapeSize).'px';
            }

            if(!empty($params['background_color'])) {
                $iconHolderStyles[] = 'background-color: '.$params['background_color'];
            }

            if(!empty($params['border_color']) && (isset($params['border_width']) && $params['border_width'] !== '')) {
				$iconHolderStyles[] = 'border-style: solid';
				$iconHolderStyles[] = 'border-color: '.$params['border_color'];
				$iconHolderStyles[] = 'border-width: '.goodwish_edge_filter_px($params['border_width']).'px';
			} else if(isset($params['border_width']) && $params['border_width'] !== ''){
				$iconHolderStyles[] = 'border-style: solid';
				$iconHolderStyles[] = 'border-width: '.goodwish_edge_filter_px($params['border_width']).'px';
			} else if(!empty($params['border_color'])){
				$iconHolderStyles[] = 'border-color: '.$params['border_color'];
			}

            if($params['type'] == 'square') {
                if(isset($params['border_radius']) && $params['border_radius'] !== '') {
                    $iconHolderStyles[] = 'border-radius: '.goodwish_edge_filter_px($params['border_radius']).'px';
                }
            }
        }

        return $iconHolderStyles;
    }

    /**
     * Generates icon holder data attribute array
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconHolderData($params) {
        $iconHolderData = array();

        if(isset($params['type']) && $params['type'] !== 'normal') {
            if(!empty($params['hover_border_color'])) {
                $iconHolderData['data-hover-border-color'] = $params['hover_border_color'];
            }

            if(!empty($params['hover_background_color'])) {
                $iconHolderData['data-hover-background-color'] = $params['hover_background_color'];
            }
        }

        if((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
           && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $iconHolderData['data-animation-delay'] = $params['icon_animation_delay'];
        }

        if(!empty($params['hover_icon_color'])) {
            $iconHolderData['data-hover-color'] = $params['hover_icon_color'];
        }

        if(!empty($params['icon_color'])) {
            $iconHolderData['data-color'] = $params['icon_color'];
        }

        return $iconHolderData;
    }

    private function generateIconAnimationHolderStyles($params) {
        $styles = array();

        if((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
           && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $styles[] = 'transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-webkit-transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-moz-transition-delay: '.$params['icon_animation_delay'].'ms';
            $styles[] = '-ms-transition-delay: '.$params['icon_animation_delay'].'ms';
        }

        return $styles;
    }

	private function getLinkClass($params) {
		$class = array();

		if(isset($params['anchor_icon']) && $params['anchor_icon'] == 'yes') {
			$class[] = 'edgtf-anchor';
		}

		return implode(' ', $class);
	}

}