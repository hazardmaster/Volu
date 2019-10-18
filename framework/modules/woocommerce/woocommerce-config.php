<?php

// Adds theme support for woocommerce
add_theme_support('woocommerce');

//Disable the default WooCommerce stylesheet.
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if ( ! function_exists( 'goodwish_edge_disable_woocommerce_pretty_photo' ) ) {
    /**
     * Function that disable WooCommerce pretty photo script and style
     */
    function goodwish_edge_disable_woocommerce_pretty_photo() {
        if ( goodwish_edge_load_woo_assets() ) {

            wp_deregister_style( 'woocommerce_prettyPhoto_css' );
        }
    }

    add_action( 'wp_enqueue_scripts', 'goodwish_edge_disable_woocommerce_pretty_photo' );
}

if (!function_exists('goodwish_edge_woocommerce_content')){
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function goodwish_edge_woocommerce_content() {

		if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else {

			if ( have_posts() ) :

				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				woocommerce_product_subcategories();

				while ( have_posts() ) : the_post();

					wc_get_template_part( 'content', 'product' );

				endwhile; // end of the loop.

				woocommerce_product_loop_end();

				if(goodwish_edge_is_woocommerce_page()):
					remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
					add_action('goodwish_edge_after_container_close','woocommerce_pagination',10);
				endif;

			elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

				wc_get_template( 'loop/no-products-found.php' );

			endif;

		}
	}
}

//Define number of products per page
add_filter('loop_shop_per_page', 'goodwish_edge_woocommerce_products_per_page', 20);

//Set number of related products
add_filter( 'woocommerce_output_related_products_args', 'goodwish_edge_woocommerce_related_products_args');

//Overide Product List Loop Title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'goodwish_edge_woocommerce_template_loop_product_title', 10 );

//Override Product List Loop Add To Cart
add_filter('woocommerce_loop_add_to_cart_link', 'goodwish_edge_woocommerce_loop_add_to_cart_link',10,2);

//Single Product Title template override
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'goodwish_edge_woocommerce_template_single_title', 5 );

//Single product add social share)
add_action( 'woocommerce_share', 'goodwish_edge_woocommerce_share', 70);

//Sale flash template override
add_filter( 'woocommerce_sale_flash', 'goodwish_edge_woocommerce_sale_flash');

// Out of stock badge
add_action( 'woocommerce_before_shop_loop_item_title', 'goodwish_edge_woocommerce_out_of_stock_flash');

//Override Checkout Fields
add_filter('woocommerce_checkout_fields', 'goodwish_edge_custom_override_checkout_fields');

//Set Woocommerce button style
//Simple and grouped products
add_action('goodwish_edge_woocommerce_add_to_cart_button', 'goodwish_edge_get_woocommerce_add_to_cart_button');

//External product
add_action('goodwish_edge_woocommerce_add_to_cart_button_external', 'goodwish_edge_get_woocommerce_add_to_cart_button_external');

//Variable product
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
add_action( 'woocommerce_single_variation', 'goodwish_edge_woocommerce_single_variation_add_to_cart_button', 20 );

//Apply Coupon Button
add_action('goodwish_edge_woocommerce_apply_coupon_button', 'goodwish_edge_get_woocommerce_apply_coupon_button');

//Update Cart
add_action('goodwish_edge_woocommerce_update_cart_button', 'goodwish_edge_get_woocommerce_update_cart_button');

//Proceed To Checkout Button
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
add_action( 'woocommerce_proceed_to_checkout', 'goodwish_edge_woocommerce_button_proceed_to_checkout', 20 );

//Update Totals Button, Shipping Calculator
add_action('goodwish_edge_woocommerce_update_totals_button', 'goodwish_edge_get_woocommerce_update_totals_button');

//Pay For Order Button, Checkout page
add_filter('woocommerce_pay_order_button_html', 'goodwish_edge_woocommerce_pay_order_button_html');

//Place Order Button, Checkout page
add_filter('woocommerce_order_button_html', 'goodwish_edge_woocommerce_order_button_html');

//Override Review Form (Single Product)
add_filter('woocommerce_product_review_comment_form_args', 'goodwish_edge_woocommerce_single_review_form');

// Remove price if a product is out of stock on single product and list
add_action('woocommerce_single_product_summary','goodwish_edge_woocommerce_out_of_stock_price_single',1);
add_action('woocommerce_after_shop_loop_item_title','goodwish_edge_woocommerce_out_of_stock_price_list',1);

//Remove product rating from loop
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);

// Add navigation for products
add_action('goodwish_edge_after_container_close','goodwish_edge_woocommerce_product_navigation');

//Number of thumbnails columns
add_filter('woocommerce_product_thumbnails_columns','goodwish_edge_woocommerce_product_thumbnails_columns');

