<?php get_header(); ?>
<?php goodwish_edge_get_title(); ?>
<div class="edgtf-full-width">
<?php do_action('goodwish_edge_after_container_open'); ?>
	<div class="edgtf-full-width-inner>">
		<?php
			$cat_id = get_queried_object_id();
			$cat = get_category($cat_id);
			$cat_slug = $cat->slug;

			goodwish_edge_get_event_category_list($cat_slug);
		?>
	</div>
<?php do_action('goodwish_edge_before_container_close'); ?>
</div>
<?php do_action('goodwish_edge_after_container_close'); ?>
<?php get_footer(); ?>