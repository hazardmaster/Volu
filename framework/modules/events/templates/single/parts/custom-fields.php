<?php
$custom_fields = goodwish_edge_get_repeater_values(get_the_ID(), array('edgtf_event_title','edgtf_event_description'));

if(is_array($custom_fields) && count($custom_fields)) {
    foreach($custom_fields as $custom_field) { ?>
        <div class="edgtf-event-info-item edgtf-event-custom-field">
            <?php if(!empty($custom_field['edgtf_event_title'])) : ?>
                <span class="edgtf-event-info-item-title">
                	<?php echo esc_html($custom_field['edgtf_event_title']); ?>:
                </span>
            <?php endif; ?>
            <?php if(!empty($custom_field['edgtf_event_title'])) : ?>
				<span class="edgtf-event-info-item-desc">
					<?php echo esc_html($custom_field['edgtf_event_description']); ?>
				</span>
            <?php endif; ?>
        </div>
    <?php } ?>

<?php } ?>
