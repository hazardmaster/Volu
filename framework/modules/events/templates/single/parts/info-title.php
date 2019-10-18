<?php
$show_title = false;

//check if there is any od the info parts one by one, if it does then show title

//check categories
if(goodwish_edge_options()->getOptionValue('event_single_hide_categories') !== 'yes') {
    $categories   = wp_get_post_terms(get_the_ID(), 'edge-event-category');

    if(is_array($categories) && count($categories)){
    	$show_title = true;
    }
}

//check custom fields
$custom_fields = goodwish_edge_get_repeater_values(get_the_ID(), array('edgtf_event_title','edgtf_event_description'));;

if(is_array($custom_fields) && count($custom_fields)){
	$show_title = true;
}

if(goodwish_edge_options()->getOptionValue('event_single_date_showing') !== 'none'){
	$show_title = true;
}

if ($show_title) { ?>
	<h5 class="edgtf-event-info-title"><?php esc_html_e('Info','goodwish');?></h5>
<?php } ?>
