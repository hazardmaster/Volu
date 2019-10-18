<?php $goodwish_edge_variable_sidebar = goodwish_edge_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 

$goodwish_edge_variable_blog_page_range = goodwish_edge_get_blog_page_range();
$goodwish_edge_variable_max_number_of_pages = goodwish_edge_get_max_number_of_pages();

if ( get_query_var('paged') ) { $goodwish_edge_variable_paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $goodwish_edge_variable_paged = get_query_var('page'); }
else { $goodwish_edge_variable_paged = 1; }
?>
<?php goodwish_edge_get_title(); ?>
	<div class="edgtf-container">
		<?php do_action('goodwish_edge_after_container_open'); ?>
		<div class="edgtf-container-inner clearfix">
			<div class="edgtf-container">
				<?php do_action('goodwish_edge_after_container_open'); ?>
				<div class="edgtf-container-inner" >
					<div class="edgtf-blog-holder edgtf-blog-type-standard edgtf-search-page">
						<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="edgtf-post-content">
									<div class="edgtf-post-text">
										<div class="edgtf-post-text-inner">
											<h3 itemprop="name" class="entry-title">
												<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											</h3>
											<?php
											$goodwish_edge_variable_my_excerpt = get_the_excerpt();
											if ($goodwish_edge_variable_my_excerpt != '') { ?>
												<p class="edgtf-post-excerpt"><?php echo esc_html($goodwish_edge_variable_my_excerpt); ?></p>
											<?php }
											?>
											<div class="edgtf-post-info">
												<?php goodwish_edge_post_info(array('author' => 'yes', 'category' => 'no', 'date' => 'yes')) ?>
											</div>
											<?php
												// goodwish_edge_read_more_button();
											?>
										</div>
									</div>
								</div>
							</article>
						<?php endwhile; ?>
						<?php else: ?>
							<div class="edgtf-no-posts-found">
								<h3 class="edgtf-no-posts-found-title"><?php esc_html_e('No posts were found', 'goodwish'); ?></h3>
								<p><?php esc_html_e('Whoops, sorry. No posts containing the keywords you entered were found on our website. Why not try searching again using some different keywords?', 'goodwish'); ?></p>
							</div>
						<?php endif; ?>
					</div>
				<?php do_action('goodwish_edge_before_container_close'); ?>
			</div>
			</div>
		</div>
		<?php do_action('goodwish_edge_before_container_close'); ?>
	</div>
		<?php if(goodwish_edge_options()->getOptionValue('pagination') == 'yes' && $goodwish_edge_variable_max_number_of_pages > 1) { ?>
			<div class="edgtf-container edgtf-container-bottom-navigation">
				<div class="edgtf-container-inner">
					<?php goodwish_edge_pagination($goodwish_edge_variable_max_number_of_pages, $goodwish_edge_variable_blog_page_range, $goodwish_edge_variable_paged); ?>
				</div>
			</div>
		<?php } ?>
	<?php do_action('goodwish_edge_after_container_close'); ?>
<?php get_footer(); ?>