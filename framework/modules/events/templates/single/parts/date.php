<div class="edgtf-event-info-item edgtf-event-date">
    <span class="edgtf-event-info-item-title"><?php esc_html_e('Date:', 'goodwish'); ?></span>
    <span class="edgtf-event-info-item-desc"><?php echo esc_html($start_date);?></span>
</div>
<?php if ($date_showing == 'start_duration') { ?>
<div class="edgtf-event-info-item edgtf-event-date">
    <span class="edgtf-event-info-item-title"><?php esc_html_e('Duration:', 'goodwish'); ?></span>
    <span class="edgtf-event-info-item-desc"><?php echo esc_html($duration);?></span>
</div>
<?php } else { ?>
<div class="edgtf-event-info-item edgtf-event-date">
    <span class="edgtf-event-info-item-title"><?php esc_html_e('End Date:', 'goodwish'); ?></span>
    <span class="edgtf-event-info-item-desc"><?php echo esc_html($end_date);?></span>
</div>
<?php } ?>