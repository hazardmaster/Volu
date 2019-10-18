<?php

if(!function_exists('goodwish_edge_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function goodwish_edge_is_responsive_on() {
        return goodwish_edge_options()->getOptionValue('responsiveness') !== 'no';
    }
}