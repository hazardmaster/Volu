<?php get_header(); ?>
<?php goodwish_edge_get_title(); ?>
<div class="edgtf-container">
<?php do_action('goodwish_edge_after_container_open'); ?>
	<div class="edgtf-container-inner">
		<?php
			$cat_id = get_queried_object_id();
			$cat = get_category($cat_id);
			$cat_slug = $cat->slug;
			$number = esc_attr(get_option('posts_per_page'));

			goodwish_edge_get_give_form_category_list($cat_slug, $number);
		?>
	</div>
<?php do_action('goodwish_edge_before_container_close'); ?>
</div>
<?php do_action('goodwish_edge_after_container_close'); ?>
<?php get_footer(); ?>