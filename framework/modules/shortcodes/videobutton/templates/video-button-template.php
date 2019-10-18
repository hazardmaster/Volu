<?php
/**
 * Video Button shortcode template
 */
?>

<div class="edgtf-video-button">
	<a itemprop="image" class="edgtf-video-button-play" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto" <?php echo goodwish_edge_inline_style($button_style);?>>
		<?php if($preview_image != '') { ?>
			<span class="edgtf-video-button-image">
				<img itemprop="image" src="<?php echo wp_get_attachment_url( $preview_image ); ?>" alt="<?php esc_html_e('Image1', 'goodwish'); ?>" />
			</span>
		<?php } ?>
		<span class="edgtf-video-button-wrapper">
			<span class="edgtf-video-button-wrapper-inner" <?php echo goodwish_edge_inline_style($button_border_style);?>>
				<span class="fa fa-play"></span>
			</span>
		</span>
	</a>
	<?php if ($title !== ''){?>
		<<?php echo esc_attr($title_tag);?> class="edgtf-video-button-title">
			<?php echo esc_html($title); ?>
		</<?php echo esc_attr($title_tag);?>>
	<?php } ?>
</div>