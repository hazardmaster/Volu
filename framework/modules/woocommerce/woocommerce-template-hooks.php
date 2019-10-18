<?php

if (!function_exists('goodwish_edge_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function goodwish_edge_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (goodwish_edge_options()->getOptionValue('edgtf_woo_products_per_page')) {
			$products_per_page = goodwish_edge_options()->getOptionValue('edgtf_woo_products_per_page');
		}

		return $products_per_page;

	}

}

if (!function_exists('goodwish_edge_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function goodwish_edge_woocommerce_related_products_args($args) {

		if (goodwish_edge_options()->getOptionValue('edgtf_woo_product_list_columns')) {

			$related = goodwish_edge_options()->getOptionValue('edgtf_woo_product_list_columns');
			switch ($related) {
				case 'edgtf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'edgtf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;

	}

}

if (!function_exists('goodwish_edge_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function goodwish_edge_woocommerce_template_loop_product_title() {

		$tag = goodwish_edge_options()->getOptionValue('edgtf_products_list_title_tag');
		the_title('<' . $tag . ' class="edgtf-product-list-product-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');

	}

}

if (!function_exists('goodwish_edge_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function goodwish_edge_woocommerce_template_single_title() {

		$tag = goodwish_edge_options()->getOptionValue('edgtf_single_product_title_tag');
		the_title('<' . $tag . '  itemprop="name" class="edgtf-single-product-title">', '</' . $tag . '>');

	}

}

if (!function_exists('goodwish_edge_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function goodwish_edge_woocommerce_sale_flash() {

        global $product;
        $availability = $product->get_availability();

        if ( !$product->is_in_stock() && WC_Admin_Settings::get_option( 'woocommerce_notify_no_stock')=='yes') {
            return apply_filters( 'woocommerce_stock_html', '<span class="edgtf-product-badge edgtf-out-of-stock ' . esc_attr( $availability['class'] ) . '"><span class="edgtf-product-badge-inner edgtf-out-of-stock-inner">' . esc_html( $availability['availability'] ) . '</span></span>', $availability['availability'] );
        }else{
		    return '<span class="edgtf-product-badge edgtf-onsale"><span class="edgtf-product-badge-inner edgtf-onsale-inner">' . esc_html__('Sale', 'goodwish') . '</span></span>';
        }
	}

}

if (!function_exists('goodwish_edge_woocommerce_out_of_stock_flash')) {
	/**
	 * Function for overriding Out of Stock badge
	 *
	 * @return string
	 */
	function goodwish_edge_woocommerce_out_of_stock_flash() {

		global $product;
		$availability = $product->get_availability();

		if ( !$product->is_in_stock() && WC_Admin_Settings::get_option( 'woocommerce_notify_no_stock')=='yes') {
			print apply_filters( 'woocommerce_stock_html', '<span class="edgtf-product-badge edgtf-out-of-stock ' . esc_attr( $availability['class'] ) . '"><span class="edgtf-product-badge-inner edgtf-out-of-stock-inner">' . esc_html( $availability['availability'] ) . '</span></span>', $availability['availability'] );
		}
	}

}

if (!function_exists('goodwish_edge_custom_override_checkout_fields')) {
	/**
	 * Overrides placeholder values for checkout fields
	 * @param array all checkout fields
	 * @return array checkout fields with overriden values
	 */
	function goodwish_edge_custom_override_checkout_fields($fields) {
		//billing fields
		$args_billing = array(
			'first_name'	=> esc_html__('First name','goodwish'),
			'last_name'		=> esc_html__('Last name','goodwish'),
			'company'		=> esc_html__('Company name','goodwish'),
			'address_1'		=> esc_html__('Address','goodwish'),
			'email'			=> esc_html__('Email','goodwish'),
			'phone'			=> esc_html__('Phone','goodwish'),
			'postcode'		=> esc_html__('Postcode / ZIP','goodwish'),
			'state'			=> esc_html__('State / County', 'goodwish'),
			'city'			=> esc_html__('City', 'goodwish')
		);

		//shipping fields
		$args_shipping = array(
			'first_name' => esc_html__('First name','goodwish'),
			'last_name'  => esc_html__('Last name','goodwish'),
			'company'    => esc_html__('Company name','goodwish'),
			'address_1'  => esc_html__('Address','goodwish'),
			'postcode'   => esc_html__('Postcode / ZIP','goodwish'),
			'city'		 => esc_html__('City', 'goodwish')
		);

		//override billing placeholder values
		foreach ($args_billing as $key => $value) {
			$fields["billing"]["billing_{$key}"]["placeholder"] = $value;
		}

		//override shipping placeholder values
		foreach ($args_shipping as $key => $value) {
			$fields["shipping"]["shipping_{$key}"]["placeholder"] = $value;
		}

		return $fields;
	}

}

if (!function_exists('goodwish_edge_woocommerce_loop_add_to_cart_link')) {
	/**
	 * Function that overrides default woocommerce add to cart button on product list
	 * Uses HTML from edgtf_button
	 *
	 * @return mixed|string
	 */
	function goodwish_edge_woocommerce_loop_add_to_cart_link() {

		global $product;

		$product_type = $product->get_type();
		$product_id = $product->get_id();

		$button_url = $product->add_to_cart_url();
		$button_classes = sprintf('%s product_type_%s %s',
			$product->is_purchasable() && $product->is_in_stock() ? 'edgtf-btn add_to_cart_button' : '',
			esc_attr( $product_type ),
			esc_attr($product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ' ')
		);
		$button_attrs = array(
			'rel' => 'nofollow',
			'data-product_id' => esc_attr( $product_id ),
			'data-product_sku' => esc_attr( $product->get_sku() ),
			'data-quantity' => esc_attr( isset( $quantity ) ? $quantity : 1 )
		);
		$html = '';
		if($product->is_in_stock()){
			$html = '<div class="edgtf-add-to-cart-holder">';
			$html .= '<a href="'.$button_url.'" class="'.$button_classes.'" '.goodwish_edge_get_inline_attrs($button_attrs).'>';
			$html .= '<span class="edgtf-icon-font-elegant icon_bag_alt "></span><span class="edgtf-btn-text">'.esc_html__('Add to cart','goodwish').'</span>';
			$html .= '</a>';
			$html .= '</div>';
		}
		return $html;

	}

}

if (!function_exists('goodwish_edge_get_woocommerce_add_to_cart_button')) {
	/**
	 * Function that overrides default woocommerce add to cart button on simple and grouped product single template
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_get_woocommerce_add_to_cart_button() {

		global $product;

		$add_to_cart_button = goodwish_edge_get_button_html(
			array(
				'custom_class'	=> 'single_add_to_cart_button alt',
				'text'			=> $product->single_add_to_cart_text(),
				'html_type'		=> 'button',
                'type'          => 'solid',
                'size'          => 'medium'
			)
		);

		echo goodwish_edge_get_module_part($add_to_cart_button);

	}

}

if (!function_exists('goodwish_edge_get_woocommerce_add_to_cart_button_external')) {
	/**
	 * Function that overrides default woocommerce add to cart button on external product single template
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_get_woocommerce_add_to_cart_button_external() {

		global $product;

		$add_to_cart_button = goodwish_edge_get_button_html(
			array(
				'link'			=> $product->add_to_cart_url(),
				'custom_class'	=> 'single_add_to_cart_button alt',
				'text'			=> $product->single_add_to_cart_text(),
				'custom_attrs'	=> array(
					'rel' 		=> 'nofollow'
				)
			)
		);

		echo goodwish_edge_get_module_part($add_to_cart_button);

	}

}

if ( ! function_exists('goodwish_edge_woocommerce_single_variation_add_to_cart_button') ) {
	/**
	 * Function that overrides default woocommerce add to cart button on variable product single template
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_woocommerce_single_variation_add_to_cart_button() {
		global $product;

		$product_id = $product->get_id();

		$html = '<div class="variations_button">';
		woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) );

		$button = goodwish_edge_get_button_html(array(
			'html_type'		=> 'button',
			'custom_class'	=> 'single_add_to_cart_button alt',
			'text'			=> $product->single_add_to_cart_text()
		));

		$html .= $button;

		$html .= '<input type="hidden" name="add-to-cart" value="' . absint( $product_id ) . '" />';
		$html .= '<input type="hidden" name="product_id" value="' . absint( $product_id ) . '" />';
		$html .= '<input type="hidden" name="variation_id" class="variation_id" value="" />';
		$html .= '</div>';

		echo goodwish_edge_get_module_part($html);

	}

}

if (!function_exists('goodwish_edge_get_woocommerce_apply_coupon_button')) {
	/**
	 * Function that overrides default woocommerce apply coupon button
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_get_woocommerce_apply_coupon_button() {
		print '<input type="submit" name="apply_coupon" value="'.esc_html__('Apply Coupon','goodwish').'">';
	}

}

if (!function_exists('goodwish_edge_get_woocommerce_update_cart_button')) {
	/**
	 * Function that overrides default woocommerce update cart button
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_get_woocommerce_update_cart_button() {
		print '<input type="submit" name="update_cart" value="'.esc_html__('Update Cart','goodwish').'">';
	}

}

if (!function_exists('goodwish_edge_woocommerce_button_proceed_to_checkout')) {
	/**
	 * Function that overrides default woocommerce proceed to checkout button
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_woocommerce_button_proceed_to_checkout() {

		$proceed_to_checkout_button = goodwish_edge_get_button_html(array(
			'link'			=> get_permalink(get_option('woocommerce_checkout_page_id')),
			'custom_class'	=> 'checkout-button alt wc-forward',
			'text'			=> esc_html__( 'Proceed to Checkout', 'goodwish' ),
			'type'          => 'solid'
		));

		echo goodwish_edge_get_module_part($proceed_to_checkout_button);

	}

}

if (!function_exists('goodwish_edge_get_woocommerce_update_totals_button')) {
	/**
	 * Function that overrides default woocommerce update totals button
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_get_woocommerce_update_totals_button() {

		$update_totals_button = goodwish_edge_get_button_html(array(
			'html_type'		=> 'button',
			'text'			=> esc_html__( 'Update Totals', 'goodwish' ),
			'custom_attrs'	=> array(
				'value'		=> 1,
				'name'		=> 'calc_shipping'
			),
			'type'          => 'solid-dark'
		));

		echo goodwish_edge_get_module_part($update_totals_button);

	}

}

if (!function_exists('goodwish_edge_woocommerce_pay_order_button_html')) {
	/**
	 * Function that overrides default woocommerce pay order button on checkout page
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_woocommerce_pay_order_button_html() {

		$pay_order_button_text = esc_html__('Pay for order', 'goodwish');

		$place_order_button = goodwish_edge_get_button_html(array(
			'html_type'		=> 'input',
			'custom_class'	=> 'alt',
			'custom_attrs'	=> array(
				'id'			=> 'place_order',
				'data-value'	=> $pay_order_button_text
			),
			'text'			=> $pay_order_button_text,
			'type'          => 'solid-dark'
		));

		return $place_order_button;

	}

}

if (!function_exists('goodwish_edge_woocommerce_order_button_html')) {
	/**
	 * Function that overrides default woocommerce place order button on checkout page
	 * Uses HTML from edgtf_button
	 */
	function goodwish_edge_woocommerce_order_button_html() {

		$pay_order_button_text = esc_html__('Place Order', 'goodwish');

		$place_order_button = goodwish_edge_get_button_html(array(
			'html_type'		=> 'input',
			'custom_class'	=> 'alt',
			'custom_attrs'	=> array(
				'id'			=> 'place_order',
				'data-value'	=> $pay_order_button_text,
				'name'			=> 'woocommerce_checkout_place_order'
			),
			'text'			=> $pay_order_button_text,
			'type'          => 'solid'
		));

		return $place_order_button;

	}

}


if (!function_exists('goodwish_edge_woocommerce_single_review_form')) {

    /**
     * Function that overrides default woocommerce single product review form
     * Adds placeholders
     *
     * @param $comment_form
     * @return mixed
     */
    function goodwish_edge_woocommerce_single_review_form($comment_form) {

        $commenter = wp_get_current_commenter();

        if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
            $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'goodwish' ) .'</label><select name="rating" id="rating">
				<option value="">' . esc_html__( 'Rate&hellip;', 'goodwish' ) . '</option>
				<option value="5">' . esc_html__( 'Perfect', 'goodwish' ) . '</option>
				<option value="4">' . esc_html__( 'Good', 'goodwish' ) . '</option>
				<option value="3">' . esc_html__( 'Average', 'goodwish' ) . '</option>
				<option value="2">' . esc_html__( 'Not that bad', 'goodwish' ) . '</option>
				<option value="1">' . esc_html__( 'Very Poor', 'goodwish' ) . '</option>
			</select></p>';
        }

        $comment_form['comment_field'] .= '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'. esc_attr__( 'Your Review', 'goodwish' ).'"></textarea>';

        $comment_form['label_submit'] = esc_html__( 'Send', 'goodwish' );

        $comment_form['fields'] = array(
            'author' => '<div class="edgtf-two-columns-50-50 clearfix"><div class="edgtf-two-columns-50-50-inner"><div class="edgtf-column"><div class="edgtf-column-inner"> ' .
                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" placeholder="'. esc_attr__( 'Your Name', 'goodwish' ).'*"/>'.
                '</div></div>',
            'email'  => '<div class="edgtf-column"><div class="edgtf-column-inner"> ' .
                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" placeholder="'. esc_attr__( 'Your Email', 'goodwish' ).'*"/>'.
                '</div></div></div></div>'
        );

        return $comment_form;
    }
}

if(!function_exists('goodwish_edge_woocommerce_out_of_stock_price_list')){
    /**
     * Remove product price if its out of stock (in case that user leaves the price) on list
     */
    function goodwish_edge_woocommerce_out_of_stock_price_list(){
        global $product;

        if ( !$product->is_in_stock()) {
            remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
        }else{
            add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
        }
    }
}

if(!function_exists('goodwish_edge_woocommerce_out_of_stock_price_single')){
    /**
     * Remove product price if its out of stock (in case that user leaves the price) on single product
     */
    function goodwish_edge_woocommerce_out_of_stock_price_single(){
        global $product;

        if ( !$product->is_in_stock()) {
            remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
        }else{
            add_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
        }
    }
}

if(!function_exists('goodwish_edge_woocommerce_product_navigation')){
    function goodwish_edge_woocommerce_product_navigation(){
        if (is_product() && goodwish_edge_options()->getOptionValue('product_single_navigation') == 'yes') {
            $navigation_product_through_category = goodwish_edge_options()->getOptionValue('product_navigation_through_same_category'); ?>
            <div class="edgtf-container edgtf-container-bottom-navigation">
                <div class="edgtf-container-inner">
                    <div class="edgtf-product-single-navigation edgtf-three-columns">
	                    <div class="edgtf-product-single-navigation-inner edgtf-three-columns-inner clearfix">
		                    <div class="edgtf-column">
			                    <?php if ( get_previous_post() != "" ) { ?>
				                    <div class="edgtf-product-single-prev edgtf-column-inner">
					                    <?php
					                    if ( $navigation_product_through_category == 'yes' ) {
						                    previous_post_link( '%link', '<span class="fa fa-arrow-left"></span>', true, '', 'product_cat' );
					                    } else {
						                    previous_post_link( '%link', '<span class="fa fa-arrow-left"></span>' );
					                    }
					                    ?>
				                    </div>
			                    <?php } ?>
		                    </div>
		                    <div class="edgtf-column">
			                    <div class="edgtf-product-single-back-to-btn edgtf-column-inner">
				                    <a href="<?php echo get_permalink( get_option( 'woocommerce_shop_page_id' ) ); ?>"><span class="icon_grid-3x3"></span></a>
			                    </div>
		                    </div>
		                    <div class="edgtf-column">
			                    <?php if ( get_next_post() != "" ) { ?>
				                    <div class="edgtf-product-single-next edgtf-column-inner">
					                    <?php
					                    if ( $navigation_product_through_category == 'yes' ) {
						                    next_post_link( '%link', '<span class="fa fa-arrow-right"></span>', true, '', 'product_cat' );
					                    } else {
						                    next_post_link( '%link', '<span class="fa fa-arrow-right"></span>' );
					                    }
					                    ?>
				                    </div>
			                    <?php } ?>
		                    </div>
	                    </div>
                    </div>
                </div>
            </div>
        <?php }
    }
}

if(!function_exists('goodwish_edge_woocommerce_product_thumbnails_columns')){
    function goodwish_edge_woocommerce_product_thumbnails_columns($number){
    		return 4;
	}
}