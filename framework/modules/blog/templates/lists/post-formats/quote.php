<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<div class="edgtf-post-mark edgtf-quote-mark">
				<span class="fa fa-quote-right"></span>
			</div>
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-info">
					<?php goodwish_edge_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
				</div>
				<h3 class="edgtf-post-title">
					<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), "edgtf_post_quote_text_meta", true)); ?></a>
				</h3>
				<span itemprop="name" class="entry-title edgtf-quote-author">- <?php the_title(); ?></span>
				<?php if((has_tag() || goodwish_edge_get_social_share_html() != '') && $type == 'standard') : ?>
					<div class="edgtf-post-info-bottom">
						<div class="edgtf-post-info-bottom-left">
							<?php has_tag() ? the_tags('', ', ', '') : ''; ?>
						</div>
						<div class="edgtf-post-info-bottom-right">
							<?php goodwish_edge_post_info(array('share' => 'yes')) ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>