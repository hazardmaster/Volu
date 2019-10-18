<?php if(!is_archive() && !is_home()) { ?>
	<?php if(have_posts()) : ?>
		<div class="edgtf-blog-list-content-above">
			<?php while(have_posts()) : the_post() ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
<?php } ?>
<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
	<?php goodwish_edge_get_blog_type($blog_type); ?>
<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
	<div <?php echo goodwish_edge_sidebar_columns_class(); ?>>
		<div class="edgtf-column1 edgtf-content-left-from-sidebar">
			<div class="edgtf-column-inner">
				<?php goodwish_edge_get_blog_type($blog_type); ?>
			</div>
		</div>
		<div class="edgtf-column2">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
	<div <?php echo goodwish_edge_sidebar_columns_class(); ?>>
		<div class="edgtf-column1">
			<div class="edgtf-column-inner">
				<?php goodwish_edge_get_blog_type($blog_type); ?>
			</div>
		</div>
		<div class="edgtf-column2 edgtf-content-right-from-sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php endif; ?>

