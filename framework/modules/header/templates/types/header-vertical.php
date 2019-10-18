<?php do_action('goodwish_edge_before_page_header'); ?>
<aside class="edgtf-vertical-menu-area">
    <div class="edgtf-vertical-menu-area-inner">
        <div class="edgtf-vertical-area-background" <?php goodwish_edge_inline_style(array($vertical_header_background_color,$vertical_header_opacity,$vertical_background_image)); ?>></div>
        <?php if(!$hide_logo) {
            goodwish_edge_get_logo();
        } ?>
        <?php goodwish_edge_get_vertical_main_menu(); ?>
        <div class="edgtf-vertical-area-widget-holder">
            <?php if($widget_area) : ?>
                <?php dynamic_sidebar($widget_area); ?>
            <?php endif; ?>
        </div>
    </div>
</aside>

<?php do_action('goodwish_edge_after_page_header'); ?>