<?php if(($content_bottom_area == "yes") && (is_active_sidebar($content_bottom_area_sidebar))) { ?>
	<div class="edgtf-content-bottom" <?php goodwish_edge_inline_style($content_bottom_background_color); ?>>
		<?php if($content_bottom_area_in_grid == 'yes'){ ?>
			<div class="edgtf-container">
				<div class="edgtf-container-inner clearfix">
		<?php } ?>
				<?php dynamic_sidebar($content_bottom_area_sidebar); ?>
		<?php if($content_bottom_area_in_grid == 'yes'){ ?>
				</div>
			</div>
		<?php } ?>
	</div>
<?php } ?>