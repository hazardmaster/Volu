<?php
/**
 * Woocommerce helper functions
 */


if (!function_exists('goodwish_edge_woocommerce_body_class')) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 * @return array
	 */
	function goodwish_edge_woocommerce_body_class( $classes ) {
		if(goodwish_edge_is_woocommerce_page()) {
			$classes[] = 'edgtf-woocommerce-page';
			if (is_singular('product')) {
				$classes[] = 'edgtf-woocommerce-single-page';
			}
		}
		return $classes;
	}

	add_filter('body_class', 'goodwish_edge_woocommerce_body_class');

}

if(!function_exists('goodwish_edge_woocommerce_columns_class')) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added bottom header appearance class
	 */
	function goodwish_edge_woocommerce_columns_class($classes) {

		if(in_array('woocommerce', $classes)) {

			$products_list_number = goodwish_edge_options()->getOptionValue('edgtf_woo_product_list_columns');
			$classes[] = $products_list_number;

		}

		return $classes;
	}

	add_filter('body_class', 'goodwish_edge_woocommerce_columns_class');
}

if(!function_exists('goodwish_edge_is_woocommerce_page')) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function goodwish_edge_is_woocommerce_page() {
		if (function_exists('is_woocommerce') && is_woocommerce()) {
			return is_woocommerce();
		} elseif (function_exists('is_cart') && is_cart()) {
			return is_cart();
		} elseif (function_exists('is_checkout') && is_checkout()) {
			return is_checkout();
		} elseif (function_exists('is_account_page') && is_account_page()) {
			return is_account_page();
		}
	}
}

if(!function_exists('goodwish_edge_is_woocommerce_shop')) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function goodwish_edge_is_woocommerce_shop() {
		return function_exists('is_shop') && (is_shop() || is_product());
	}
}

if(!function_exists('goodwish_edge_get_woo_shop_page_id')) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function goodwish_edge_get_woo_shop_page_id() {
		if(goodwish_edge_is_woocommerce_installed()) {
			return get_option('woocommerce_shop_page_id');
		}
	}
}

if(!function_exists('goodwish_edge_is_product_category')) {
	function goodwish_edge_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}

if(!function_exists('goodwish_edge_load_woo_assets')) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see goodwish_edge_is_woocommerce_page()
	 * @see goodwish_edge_has_woocommerce_shortcode()
	 * @see goodwish_edge_has_woocommerce_widgets()
	 * @return bool
	 */

	function goodwish_edge_load_woo_assets() {
		return goodwish_edge_is_woocommerce_installed() && (goodwish_edge_is_woocommerce_page() ||
			goodwish_edge_has_woocommerce_shortcode() || goodwish_edge_has_woocommerce_widgets());
	}
}

if(!function_exists('goodwish_edge_has_woocommerce_shortcode')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function goodwish_edge_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking',
			'add_to_cart',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);

		foreach($woocommerce_shortcodes as $woocommerce_shortcode) {
			$has_shortcode = goodwish_edge_has_shortcode($woocommerce_shortcode);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('goodwish_edge_has_woocommerce_widgets')) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function goodwish_edge_has_woocommerce_widgets() {
		$widgets_array = array(
			'edgtf_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('goodwish_edge_get_woocommerce_pages')) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function goodwish_edge_get_woocommerce_pages() {
		$woo_pages_array = array();

		if(goodwish_edge_is_woocommerce_installed()) {
			if(get_option('woocommerce_shop_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_shop_page_id'));
			}
			if(get_option('woocommerce_cart_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_cart_page_id'));
			}
			if(get_option('woocommerce_checkout_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option('woocommerce_checkout_page_id'));
			}
			if(get_option('woocommerce_pay_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_pay_page_id '));
			}
			if(get_option('woocommerce_thanks_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_thanks_page_id '));
			}
			if(get_option('woocommerce_myaccount_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_myaccount_page_id '));
			}
			if(get_option('woocommerce_edit_address_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_edit_address_page_id '));
			}
			if(get_option('woocommerce_view_order_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_view_order_page_id '));
			}
			if(get_option('woocommerce_terms_page_id') != '') {
				$woo_pages_array[] = get_permalink(get_option(' woocommerce_terms_page_id '));
			}

			$woo_products = get_posts(array('post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' => '-1'
			));

			foreach($woo_products as $product) {
				$woo_pages_array[] = get_permalink($product->ID);
			}
		}

		return $woo_pages_array;
	}

}

if(!function_exists('goodwish_edge_woocommerce_share')) {
    /**
     * Function that social share for product page
     * Return array array of WooCommerce pages
     */
    function goodwish_edge_woocommerce_share()
    {
        if (goodwish_edge_is_woocommerce_installed()) {

            if ( goodwish_edge_core_installed() && goodwish_edge_core_installed() && goodwish_edge_options()->getOptionValue('enable_social_share') == 'yes'
                && goodwish_edge_options()->getOptionValue('enable_social_share_on_product') == 'yes') :
                echo goodwish_edge_get_social_share_html();
            endif;
        }
    }

}


if(!function_exists('goodwish_edge_woocommerce_create_meta_box')) {
	/**
	 * Function that adds meta box field to product needed for masonry layout
	 */
	function goodwish_edge_woocommerce_create_meta_box() {
		$meta_box = goodwish_edge_create_meta_box(array(
			'scope' => 'product',
			'title' => esc_html__('Product Masonry Settings','goodwish'),
			'name'  => 'product-settings-meta-box'
		));

		goodwish_edge_create_meta_box_field(array(
			'name'        => 'shop_masonry_dimensions',
			'type'        => 'select',
			'label'       => esc_html__('Dimensions for Masonry','goodwish'),
			'description' => esc_html__('Choose image dimensions for Masonry Shop list','goodwish'),
			'parent'      => $meta_box,
			'options'     => array(
				'default'            => esc_html__('Default','goodwish'),
				'large_width'        => esc_html__('Large width','goodwish'),
				'large_height'       => esc_html__('Large height','goodwish'),
				'large_width_height' => esc_html__('Large width/height','goodwish'),
			)
		));
	}

	add_action('goodwish_edge_meta_boxes_map', 'goodwish_edge_woocommerce_create_meta_box');
}