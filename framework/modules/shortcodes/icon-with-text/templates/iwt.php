<div <?php goodwish_edge_class_attribute($holder_classes); ?>>
    <div class="edgtf-iwt-icon-holder">
        <?php if(!empty($custom_icon)) : ?>
            <div class="edgtf-iwt-custom-icon" <?php goodwish_edge_inline_style($custom_icon_styles); ?>>
                <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
                <?php if(!empty($hover_custom_icon)) : ?>
                    <?php echo wp_get_attachment_image($hover_custom_icon, 'full'); ?>
                <?php endif; ?>
                <?php if(!empty($link) && empty($link_text)) : ?>
                    <a itemprop="url" class="edgtf-iwt-custom-icon-link" href="<?php echo esc_url($link); ?>" <?php goodwish_edge_inline_attr($target, 'target'); ?>></a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <?php echo goodwish_edge_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
        <?php endif; ?>
    </div>
    <div class="edgtf-iwt-content-holder" <?php goodwish_edge_inline_style($content_styles); ?>>
        <div class="edgtf-iwt-title-holder">
            <?php if(!empty($link) && empty($link_text)) : ?>
                <a itemprop="url" class="edgtf-iwt-link" href="<?php echo esc_url($link); ?>" <?php goodwish_edge_inline_attr($target, 'target'); ?>>
            <?php endif; ?>
                <<?php echo esc_attr($title_tag); ?> <?php goodwish_edge_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            <?php if(!empty($link) && empty($link_text)) : ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="edgtf-iwt-text-holder">
            <p <?php goodwish_edge_inline_style($text_styles); ?>><?php echo goodwish_edge_get_module_part($text); ?></p>

            <?php if(!empty($link) && !empty($link_text)) : ?>
                <a itemprop="url" class="edgtf-iwt-link" href="<?php echo esc_url($link); ?>" <?php goodwish_edge_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>