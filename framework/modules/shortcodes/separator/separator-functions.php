<?php

if(!function_exists('goodwish_edge_get_separator_html')) {
    /**
     * Calls separator shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function goodwish_edge_get_separator_html($params = array()) {

        if (goodwish_edge_core_installed()) {
            $separator_html = goodwish_edge_execute_shortcode('edgtf_separator', $params);
        } else {
            $separator_html = '<div class="edgtf-separator-holder clearfix  edgtf-sidebar-title-separator edgtf-separator-left"> <div class="edgtf-separator"></div></div>';
        }
        $separator_html = str_replace("\n", '', $separator_html);
        return $separator_html;
    }
}