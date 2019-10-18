<?php do_action('goodwish_edge_before_mobile_logo'); ?>

<div class="edgtf-mobile-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php goodwish_edge_inline_style($logo_styles); ?>>
        <img itemprop="image" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('mobile logo','goodwish'); ?>"/>
    </a>
</div>

<?php do_action('goodwish_edge_after_mobile_logo'); ?>