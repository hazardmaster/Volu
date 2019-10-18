<?php
/**
 * Custom Font shortcode template
 */
?>

<div class="edgtf-custom-font-holder" <?php goodwish_edge_inline_style($custom_font_style); ?> <?php echo esc_attr($custom_font_data);?>>
	<?php echo do_shortcode($content); ?>
	<?php if($type_out_effect == 'yes') { ?>
		<span class="edgtf-typed-wrap">
			<span class="edgtf-typed">
				<?php if($typed_ending_1 != '') { ?>
					<span class="edgtf-typed-1"><?php echo esc_html($typed_ending_1); ?></span>
				<?php } if($typed_ending_2 != '') { ?>
					<span class="edgtf-typed-2"><?php echo esc_html($typed_ending_2); ?></span>
				<?php } if($typed_ending_3 != '') { ?>
					<span class="edgtf-typed-3"><?php echo esc_html($typed_ending_3); ?></span>
				<?php } ?>
			</span>
		</span>
	<?php } ?>
</div>