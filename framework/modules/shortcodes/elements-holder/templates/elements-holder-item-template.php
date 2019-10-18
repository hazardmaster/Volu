<div class="edgtf-elements-holder-item <?php echo esc_attr($elements_holder_item_class); ?>" <?php echo goodwish_edge_get_inline_attrs($elements_holder_item_responsive_data); ?> <?php echo goodwish_edge_get_inline_style($elements_holder_item_style); ?>>
	<?php if($link != '') { ?>
		<a class="edgtf-elements-holder-item-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
	<?php } ?>
	<div class="edgtf-elements-holder-item-inner">
		<div class="edgtf-elements-holder-item-content <?php echo esc_attr($elements_holder_item_content_class); ?>" <?php echo goodwish_edge_get_inline_style($elements_holder_item_content_style); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
	<?php if ($zoom_effect == 'yes') { ?>
		<div class="edgtf-elements-holder-item-image-zoom" <?php echo goodwish_edge_get_inline_style($background_image_div_styles) ?>></div>
	<?php } ?>
</div>