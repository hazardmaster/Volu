<div class="edgtf-big-image-holder">
	<?php
	$media = goodwish_edge_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="edgtf-portfolio-media edgtf-slick-slider edgtf-slick-slider-navigation-style">
			<?php foreach($media as $single_media) : ?>
				<div class="edgtf-portfolio-single-media">
					<?php goodwish_edge_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<div class="edgtf-two-columns-66-33 clearfix">
	<?php if(goodwish_edge_options()->getOptionValue('portfolio_single_hide_title') !== 'yes') : ?>
		<h3 class="edgtf-portfolio-title"><?php the_title(); ?></h3>
	<?php endif; ?>
	<div class="edgtf-column1">
		<div class="edgtf-column-inner">
			<?php goodwish_edge_portfolio_get_info_part('content'); ?>
		</div>
	</div>
	<div class="edgtf-column2">
		<div class="edgtf-column-inner">
			<div class="edgtf-portfolio-info-holder">
				<?php
				//get portfolio custom fields section
				goodwish_edge_portfolio_get_info_part('custom-fields');

				//get portfolio date section
				goodwish_edge_portfolio_get_info_part('date');

				//get portfolio categories section
				goodwish_edge_portfolio_get_info_part('categories');

				//get portfolio tags section
				goodwish_edge_portfolio_get_info_part('tags');

				//get portfolio share section
				goodwish_edge_portfolio_get_info_part('social');
				?>
			</div>
		</div>
	</div>
</div>