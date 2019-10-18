<div <?php goodwish_edge_class_attribute($holder_classes); ?>>
    <div class="edgtf-iwt-content-holder">
        <div class="edgtf-iwt-icon-title-holder">
            <div class="edgtf-iwt-icon-holder">
                <?php echo goodwish_edge_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
            </div>
            <div class="edgtf-iwt-title-holder">
                <<?php echo esc_attr($title_tag); ?> <?php goodwish_edge_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            </div>
        </div>
        <div class="edgtf-iwt-text-holder">
            <p <?php goodwish_edge_inline_style($text_styles); ?>><?php echo goodwish_edge_get_module_part($text); ?></p>

            <?php if(!empty($link) && !empty($link_text)) : ?>
                <a itemprop="url" class="edgtf-iwt-link" href="<?php echo esc_url($link); ?>" <?php goodwish_edge_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>