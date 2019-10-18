<div class="edgtf-blog-carousel-item">
	<?php if($show_image != 'no' && has_post_thumbnail()) { ?>
		<div class="edgtf-blog-slide-image">
				<a href="<?php the_permalink(); ?>">
					<?php
                        the_post_thumbnail($image_size);
                    ?>
				</a>
		</div>
	<?php } ?>
	<div <?php goodwish_edge_class_attribute($classes); ?> <?php goodwish_edge_inline_style($box_style); ?>>
		<<?php echo esc_html( $title_tag)?> class="edgtf-blog-slide-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</<?php echo esc_html( $title_tag)?>>
		<div class="edgtf-blog-slide-post-info">
			<?php goodwish_edge_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
		</div>
		<?php if ($text_length != '0') {
			$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
			<p class="edgtf-blog-slide-excerpt"><?php echo esc_html($excerpt)?>...</p>
		<?php } ?>
	</div>
</div>