<div class="edgtf-related-posts-holder">
	<?php if ( $related_posts && $related_posts->have_posts() ) : ?>
		<div class="edgtf-related-posts-title">
			<h3><?php esc_html_e( 'Related Posts', 'goodwish' ); ?></h3>
		</div>
		<div class="edgtf-related-posts-inner clearfix">
			<?php while ( $related_posts->have_posts() ) :
				$related_posts->the_post();
				?>
				<div class="edgtf-related-post">
					<a itemprop="url" href="<?php the_permalink(); ?> ">
						<div class="edgtf-related-post-image">
							<?php if ( has_post_thumbnail() ) :
								the_post_thumbnail();
							endif; ?>
						</div>
					</a>
					<div class="edgtf-related-post-title">
						<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h4 itemprop="name" class="edgtf-related-post-title entry-title">', '</h4>' ); ?></a>
					</div>
				</div>
				<?php
			endwhile; ?>
		</div>
	<?php endif;
	wp_reset_postdata();
	?>
</div>