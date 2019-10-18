<?php $goodwish_edge_variable_sidebar = goodwish_edge_sidebar_layout(); ?>
<?php get_header(); ?>
	<?php goodwish_edge_get_title(); ?>
	<?php get_template_part('slider'); ?>
	<div class="edgtf-container">
		<?php do_action('goodwish_edge_after_container_open'); ?>
		<div class="edgtf-container-inner clearfix">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(($goodwish_edge_variable_sidebar == 'default')||($goodwish_edge_variable_sidebar == '')) : ?>
					<?php the_content(); ?>
					<?php do_action('goodwish_edge_page_after_content'); ?>
				<?php elseif($goodwish_edge_variable_sidebar == 'sidebar-33-right' || $goodwish_edge_variable_sidebar == 'sidebar-25-right'): ?>
					<div <?php echo goodwish_edge_sidebar_columns_class(); ?>>
						<div class="edgtf-column1 edgtf-content-left-from-sidebar">
							<div class="edgtf-column-inner">
								<?php the_content(); ?>
								<?php do_action('goodwish_edge_page_after_content'); ?>
							</div>
						</div>
						<div class="edgtf-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
				<?php elseif($goodwish_edge_variable_sidebar == 'sidebar-33-left' || $goodwish_edge_variable_sidebar == 'sidebar-25-left'): ?>
					<div <?php echo goodwish_edge_sidebar_columns_class(); ?>>
						<div class="edgtf-column1">
							<div class="edgtf-column-inner">
								<?php the_content(); ?>
								<?php do_action('goodwish_edge_page_after_content'); ?>
							</div>
						</div>
						<div class="edgtf-column2 edgtf-content-right-from-sidebar">
							<?php get_sidebar(); ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php do_action('goodwish_edge_before_container_close'); ?>
	</div>
	<?php do_action('goodwish_edge_after_container_close'); ?>
<?php get_footer(); ?>