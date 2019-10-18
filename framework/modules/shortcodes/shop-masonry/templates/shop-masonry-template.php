<?php
 $classes = array('edgtf-shop-product',$image_size_class);
?>
<div <?php post_class($classes) ?>>

	<?php
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	do_action( 'woocommerce_before_shop_loop_item' );
	add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	?>


	<div class="edgtf-masonry-product-image-holder">
		<a href="<?php the_permalink(); ?>">
			<?php

			echo woocommerce_get_product_thumbnail( $thumb_size );

			?>
			<div class="edgtf-product-shader"></div>
		</a>
	</div>
	<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail' );
	do_action( 'woocommerce_before_shop_loop_item_title' );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	do_action( 'goodwish_edge_woocommerce_out_of_stock' );
	?>
	<div class="edgtf-masonry-product-meta-wrapper">

		<div class="edgtf-masonry-product-overlay-outer">
			<a href="<?php the_permalink(); ?>">
				<div class="edgtf-masonry-product-info">
					<?php
					/**
					 * woocommerce_after_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_template_loop_price - 10
					 */

					do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
					<?php

					the_title( '<h3 class="edgtf-product-list-product-title">', '</h3>' );

					?>
				</div>
			</a>
			<?php
			/**
			 * woocommerce_after_shop_loop_item hook
			 *
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
			do_action( 'woocommerce_after_shop_loop_item' );
			add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
			?>
		</div>
	</div>
</div>
