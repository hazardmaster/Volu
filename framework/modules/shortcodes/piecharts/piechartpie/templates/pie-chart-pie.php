<div class="edgtf-pie-chart-pie-holder">
	<div class="edgtf-pie-chart-pie">
		<canvas id="pie<?php echo esc_attr($id); ?>" class="edgtf-pie" height="<?php echo esc_html($height); ?>" width="<?php echo esc_html($width); ?>" <?php echo goodwish_edge_get_inline_attrs($pie_chart_data)?>></canvas>
	</div>
	<div class="edgtf-pie-legend">
		<ul>
			<?php foreach ($legend_data as $legend_data_item) { ?>
			<li>
				<div class="edgtf-pie-color-holder" <?php goodwish_edge_inline_style($legend_data_item['color'])?> ></div>
				<p><?php echo esc_html($legend_data_item['legend']); ?></p>
				<?php } ?>
			</li>
		</ul>
	</div>
</div>