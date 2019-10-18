<div class="edgtf-two-columns-66-33 clearfix">
	<div class="edgtf-column1">
		<div class="edgtf-column-inner">
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
	</div>
	<div class="edgtf-column2">
		<div class="edgtf-column-inner">
			<div class="edgtf-portfolio-info-holder">
				<?php
				//get portfolio content section
				goodwish_edge_portfolio_get_info_part('content');

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