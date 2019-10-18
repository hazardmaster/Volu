<?php if(goodwish_edge_options()->getOptionValue('event_single_show_categories') == 'yes' && goodwish_edge_event_get_categories() !== '') { ?>
    <div class="edgtf-event-info-item edgtf-event-categories">
        <span class="edgtf-event-info-item-title"><?php esc_html_e('Category:', 'goodwish'); ?></span>
        <span class="edgtf-event-info-item-desc"><?php echo goodwish_edge_event_get_categories(); ?></span>
    </div>
<?php } ?>