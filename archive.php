<?php
$goodwish_edge_variable_blog_archive_pages_classes = goodwish_edge_blog_archive_pages_classes(goodwish_edge_get_default_blog_list());
?>
<?php get_header(); ?>
<?php goodwish_edge_get_title(); ?>
<div class="<?php echo esc_attr($goodwish_edge_variable_blog_archive_pages_classes['holder']); ?>">
<?php do_action('goodwish_edge_after_container_open'); ?>
	<div class="<?php echo esc_attr($goodwish_edge_variable_blog_archive_pages_classes['inner']); ?>">
		<?php goodwish_edge_get_blog(goodwish_edge_get_default_blog_list()); ?>
	</div>
<?php do_action('goodwish_edge_before_container_close'); ?>
</div>
<?php do_action('goodwish_edge_after_container_close'); ?>
<?php get_footer(); ?>