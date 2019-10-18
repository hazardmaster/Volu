<div class="edgtf-progress-bar">
	<<?php echo esc_attr($title_tag);?> class="edgtf-progress-title-holder clearfix" >
		<span class="edgtf-progress-title" <?php goodwish_edge_inline_style($title_style); ?>><?php echo esc_attr($title)?></span>
		<span class="edgtf-progress-number-wrapper <?php echo esc_attr($percentage_classes)?> " >
			<span class="edgtf-progress-number" <?php goodwish_edge_inline_style($number_style); ?>>
				<span class="edgtf-percent">0</span>
			</span>
		</span>
	</<?php echo esc_attr($title_tag)?>>
	<div class="edgtf-progress-content-outer" <?php goodwish_edge_inline_style($outer_style); ?>>
		<div data-percentage=<?php echo esc_attr($percent)?> class="edgtf-progress-content" <?php goodwish_edge_inline_style($content_style); ?>></div>
	</div>
</div>	