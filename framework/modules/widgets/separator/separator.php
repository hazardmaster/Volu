<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class GoodwishEdgeSeparatorWidget extends GoodwishEdgeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'edgt_separator_widget', // Base ID
            esc_html__('Edge Separator Widget','goodwish')// Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type','goodwish'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal','goodwish'),
                    'full-width' => esc_html__('Full Width','goodwish'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position','goodwish'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center','goodwish'),
                    'left' => esc_html__('Left','goodwish'),
                    'right' => esc_html__('Right','goodwish'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style','goodwish'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid','goodwish'),
                    'dashed' => esc_html__('Dashed','goodwish'),
                    'dotted' => esc_html__('Dotted','goodwish'),
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color','goodwish'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width','goodwish'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)','goodwish'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin','goodwish'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin','goodwish'),
                'name' => 'bottom_margin',
                'description' => ''
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget edgtf-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[edgtf_separator $params]"); // XSS OK

        echo '</div>'; //close div.edgtf-separator-widget
    }
}