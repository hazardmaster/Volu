<?php

if(!function_exists('goodwish_edge_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function goodwish_edge_get_button_html($params) {

        if (goodwish_edge_core_installed()) {
            $button_html = goodwish_edge_execute_shortcode('edgtf_button', $params);
            $button_html = str_replace("\n", '', $button_html);
        } else { 
            $button_html = '<input type="submit" name="submit" value="Submit" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid">';
        }
        return $button_html;
    }
}