<?php if(goodwish_edge_options()->getOptionValue('event_single_show_location') == 'yes') {
	$location = get_post_meta(get_the_ID(),'edgtf_event_location',true);

	if ($location !== '') {
	?>
    <div class="edgtf-event-info-item edgtf-event-location">
        <span class="edgtf-event-info-item-title"><?php esc_html_e('Location:', 'goodwish'); ?></span>
        <span class="edgtf-event-info-item-desc"><?php echo esc_html($location);?></span>
    </div>

<?php }
} ?>