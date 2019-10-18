<?php
/**
 * Image With Text shortcode template
 */
?>

<div class="edgtf-image-with-text">
	<div class="edgtf-image-with-text-image-inner">
		<?php if ($item_image !== '') { ?>
			<div class="edgtf-image-with-text-image">
				<?php echo wp_get_attachment_image($item_image,'full');?>
			</div>
			<div class="edgtf-image-with-text-image-overlay">
				<?php if ($image_with_text_link !== '') { ?>
					<a href="<?php echo esc_url($image_with_text_link);?>" target="_blank" class="edgtf-image-with-text-link"></a>
				<?php } ?>
			</div>

		<?php } ?>
	</div>
	<div class="edgtf-image-with-text-info">
		<?php if ( $image_with_text_text !== '') { ?>
			<?php if ($image_with_text_link !== '') { ?>
				<a href="<?php echo esc_url($image_with_text_link);?>" target="_blank" class="edgtf-image-with-text-link"> 
			<?php } ?>
			<span class="edgtf-image-with-text-text">
				<?php echo wp_kses_post($image_with_text_text) ?>
			</span>
			<?php if ($image_with_text_link !== '') { ?>
				</a>
			<?php } ?>
		<?php } ?>
	</div>
</div>