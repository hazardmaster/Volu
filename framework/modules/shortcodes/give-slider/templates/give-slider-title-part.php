<div class="edgtf-give-forms-slider-text-holder">
	<div class="edgtf-gfs-text-table">
		<div class="edgtf-gfs-text-table-cell">
			<?php if ($slider_title !== '') { ?>
				<<?php echo esc_attr($title_tag);?> class="edgtf-gf-slider-title">
					<?php echo esc_html($slider_title); ?>
				</<?php echo esc_attr($title_tag);?>>
			<?php } ?>
			<?php if ($slider_subtitle !== '') { ?>	
				<span class="edgtf-gf-slider-subtitle">
					<?php echo wp_kses_post($slider_subtitle); ?>
				</span>
			<?php } ?>
		</div>
	</div>
</div>