<?php

if(!function_exists('goodwish_edge_overlapping_content_opening_tag')) {
    /**
     * Prints opening HTML tags for overlapping content
     * Hooks to goodwish_edge_after_container_open
     */
    function goodwish_edge_overlapping_content_opening_tag() {
        if(goodwish_edge_overlapping_content_enabled()) : ?>
            <div class="edgtf-overlapping-content-holder">
            <div class="edgtf-overlapping-content">
            <div class="edgtf-overlapping-content-inner">
    <?php endif;
    }

    add_action('goodwish_edge_after_container_open', 'goodwish_edge_overlapping_content_opening_tag');
}

if(!function_exists('goodwish_edge_overlapping_content_closing_tag')) {
    /**
     * Prints closing HTML tags for overlapping content
     * Hooks to goodwish_edge_before_container_close
     */
    function goodwish_edge_overlapping_content_closing_tag() {
        if(goodwish_edge_overlapping_content_enabled()) : ?>
            </div> <!-- close .edgtf-overlapping-content-inner -->
            </div> <!-- close .edgtf-overlapping-content -->
            </div> <!-- close .edgtf-overlapping-content-holder -->
    <?php endif;
    }

    add_action('goodwish_edge_before_container_close', 'goodwish_edge_overlapping_content_closing_tag');
}