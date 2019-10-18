<?php if(goodwish_edge_options()->getOptionValue('enable_social_share') == 'yes' && goodwish_edge_options()->getOptionValue('enable_social_share_on_edge-event') == 'yes') : ?>
    <div class="edgtf-event-social">
        <?php echo goodwish_edge_get_social_share_html() ?>
    </div>
<?php endif; ?>