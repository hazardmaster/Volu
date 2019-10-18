<li class="edgtf-blog-list-item clearfix">
	<div class="edgtf-blog-list-item-inner">
		<div class="edgtf-item-text-holder">
			<<?php echo esc_html( $title_tag)?> itemprop="name" class="edgtf-item-title entry-title">
				<a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>
			<div class="edgtf-item-info-section">
				<?php goodwish_edge_post_info(array(
					'date' => 'yes',
					'category' => 'yes',
					'author' => 'yes'
				)) ?>
			</div>
		</div>
	</div>	
</li>
