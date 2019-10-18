<?php do_action('goodwish_edge_before_site_logo'); ?>

<div class="edgtf-logo-wrapper">
    <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" <?php goodwish_edge_inline_style($logo_styles); ?>>
        <img itemprop="image" class="edgtf-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('logo','goodwish'); ?>"/>
        <?php if(!empty($logo_image_dark)){ ?><img itemprop="image" class="edgtf-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_attr_e('dark logo','goodwish'); ?>"/><?php } ?>
        <?php if(!empty($logo_image_light)){ ?><img itemprop="image" class="edgtf-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_attr_e('light logo','goodwish'); ?>"/><?php } ?>
    </a>
</div>

<?php do_action('goodwish_edge_after_site_logo'); ?>