<?php
/**
 * Pie Chart Basic Shortcode Template
 */
?>
<div class="edgtf-pie-chart-holder">
	<div class="edgtf-percentage" <?php echo goodwish_edge_get_inline_attrs($pie_chart_data); ?>>
		<?php if ($type_of_central_text == "title") { ?>
			<<?php echo esc_attr($title_tag); ?> class="edgtf-pie-title" <?php goodwish_edge_inline_style($title_pie_chart_style)?>>
				<?php echo esc_html($title); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } else { ?>
			<span class="edgtf-to-counter" <?php goodwish_edge_inline_style($percent_pie_chart_style)?>>
				<?php echo esc_html($percent ); ?>
			</span>
		<?php } ?>
	</div>
	<div class="edgtf-pie-chart-text" <?php goodwish_edge_inline_style($pie_chart_style); ?>>
		<?php if ($type_of_central_text == "title") { ?>
			<span class="edgtf-to-counter" <?php goodwish_edge_inline_style($percent_pie_chart_style)?>>
				<?php echo esc_html($percent ); ?>
			</span>
		<?php } else { ?>
			<<?php echo esc_attr($title_tag); ?> class="edgtf-pie-title" <?php goodwish_edge_inline_style($title_pie_chart_style)?>>
				<?php echo esc_html($title); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<p><?php echo esc_html($text); ?></p>
	</div>
</div>