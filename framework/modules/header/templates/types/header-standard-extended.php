<?php do_action('goodwish_edge_before_page_header'); ?>

<header class="edgtf-page-header">
    <div class="edgtf-logo-area">
        <?php if($logo_area_in_grid) : ?>
        <div class="edgtf-grid">
        <?php endif; ?>
			<?php do_action( 'goodwish_edge_after_header_logo_area_html_open' )?>
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
                            goodwish_edge_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
                        <?php if(is_active_sidebar('edgtf-right-from-logo')) : ?>
                            <div class="edgtf-logo-widget-area">
                                <div class="edgtf-logo-widget-area-inner">
                                    <?php dynamic_sidebar('edgtf-right-from-logo'); ?>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php if($logo_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        <div class="edgtf-fixed-wrapper">
    <?php endif; ?>
    <div class="edgtf-menu-area">
        <?php if($menu_area_in_grid) : ?>
            <div class="edgtf-grid">
        <?php endif; ?>
			<?php do_action( 'goodwish_edge_after_header_menu_area_html_open' )?>
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left">
                    <div class="edgtf-position-left-inner">
                        <?php goodwish_edge_get_main_menu(); ?>
                    </div>
                </div>
                <div class="edgtf-position-right">
                    <div class="edgtf-position-right-inner">
                        <?php if($widget_area) : ?>
                            <?php dynamic_sidebar($widget_area); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php if($menu_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        </div>
    <?php endif; ?>
    <?php if($show_sticky) {
        goodwish_edge_get_sticky_header();
    } ?>
</header>

<?php do_action('goodwish_edge_after_page_header'); ?>

