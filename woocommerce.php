<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

global $goodwish_edge_variable_woocommerce;

$goodwish_edge_variable_id = get_option('woocommerce_shop_page_id');
$goodwish_edge_variable_shop = get_post($goodwish_edge_variable_id);
$goodwish_edge_variable_sidebar = goodwish_edge_sidebar_layout();

if(get_post_meta($goodwish_edge_variable_id, 'edgt_page_background_color', true) != ''){
	$goodwish_edge_variable_background_color = 'background-color: '.esc_attr(get_post_meta($goodwish_edge_variable_id, 'edgt_page_background_color', true));
}else{
	$goodwish_edge_variable_background_color = '';
}

$goodwish_edge_variable_content_style = '';
if(get_post_meta($goodwish_edge_variable_id, 'edgt_content-top-padding', true) != '') {
	if(get_post_meta($goodwish_edge_variable_id, 'edgt_content-top-padding-mobile', true) == 'yes') {
		$goodwish_edge_variable_content_style = 'padding-top:'.esc_attr(get_post_meta($goodwish_edge_variable_id, 'edgt_content-top-padding', true)).'px !important';
	} else {
		$goodwish_edge_variable_content_style = 'padding-top:'.esc_attr(get_post_meta($goodwish_edge_variable_id, 'edgt_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$goodwish_edge_variable_paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$goodwish_edge_variable_paged = get_query_var('page');
} else {
	$goodwish_edge_variable_paged = 1;
}

get_header();

goodwish_edge_get_title();
get_template_part('slider');

$goodwish_edge_variable_full_width = false;

if ( goodwish_edge_options()->getOptionValue('edgtf_woo_products_list_full_width') == 'yes' && !is_singular('product') ) {
	$goodwish_edge_variable_full_width = true;
}

if ( $goodwish_edge_variable_full_width ) { ?>
	<div class="edgtf-full-width" <?php goodwish_edge_inline_style($goodwish_edge_variable_background_color); ?>>
<?php } else { ?>
	<div class="edgtf-container" <?php goodwish_edge_inline_style($goodwish_edge_variable_background_color); ?>>
<?php }
		if ( $goodwish_edge_variable_full_width ) { ?>
			<div class="edgtf-full-width-inner" <?php goodwish_edge_inline_style($goodwish_edge_variable_content_style); ?>>
		<?php } else { ?>
			<div class="edgtf-container-inner clearfix" <?php goodwish_edge_inline_style($goodwish_edge_variable_content_style); ?>>
		<?php }

			//Woocommerce content
			if ( ! is_singular('product') ) {

				switch( $goodwish_edge_variable_sidebar ) {

					case 'sidebar-33-right': ?>
						<div class="edgtf-two-columns-66-33 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<div class="edgtf-column-inner">
									<?php goodwish_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-right': ?>
						<div class="edgtf-two-columns-75-25 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1 edgtf-content-left-from-sidebar">
								<div class="edgtf-column-inner">
									<?php goodwish_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-33-left': ?>
						<div class="edgtf-two-columns-33-66 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<div class="edgtf-column-inner">
									<?php goodwish_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-left': ?>
						<div class="edgtf-two-columns-25-75 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<div class="edgtf-column-inner">
									<?php goodwish_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2 edgtf-content-right-from-sidebar">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					default:
						goodwish_edge_woocommerce_content();
				}

			} else {
				goodwish_edge_woocommerce_content();
			} ?>

			</div>
	</div>
	<?php do_action('goodwish_edge_after_container_close'); ?>
<?php get_footer(); ?>
