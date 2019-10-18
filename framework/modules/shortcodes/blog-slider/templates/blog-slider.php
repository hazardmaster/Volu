<div class="edgtf-blog-carousel-item edgtf-type-slider">
    <?php if(has_post_thumbnail()) { ?>
		<div class="edgtf-blog-slide-image">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ($image_size_slider != 'custom') {
						the_post_thumbnail($image_size_slider);
					} else {
						print goodwish_edge_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $image_width, $image_height);
					}
				?>
			</a>
		</div>
	<?php } ?>
    <div class="edgtf-blog-slide-info-holder clearfix" <?php goodwish_edge_inline_style($box_style); ?>>
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