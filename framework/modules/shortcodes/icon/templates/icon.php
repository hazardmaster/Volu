<?php if($icon_animation_holder) : ?>
    <span class="edgtf-icon-animation-holder" <?php goodwish_edge_inline_style($icon_animation_holder_styles); ?>>
<?php endif; ?>

    <span <?php goodwish_edge_class_attribute($icon_holder_classes); ?> <?php goodwish_edge_inline_style($icon_holder_styles); ?> <?php echo goodwish_edge_get_inline_attrs($icon_holder_data); ?>>
        <?php if($link !== '') : ?>
            <a itemprop="url" href="<?php echo esc_url($link); ?>" <?php goodwish_edge_class_attribute($link_class) ?> target="<?php echo esc_attr($target); ?>">
        <?php endif; ?>

        <?php echo goodwish_edge_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>

        <?php if($link !== '') : ?>
            </a>
        <?php endif; ?>
    </span>

<?php if($icon_animation_holder) : ?>
    </span>
<?php endif; ?>
