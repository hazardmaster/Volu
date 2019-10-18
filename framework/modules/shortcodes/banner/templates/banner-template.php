<div class="edgtf-banner">
	<?php if($link !== '' && $link_text == '') : ?>
		<a class="edgtf-banner-link" href="<?php echo esc_url($link); ?>" <?php goodwish_edge_inline_attr($target, 'target'); ?>></a>
	<?php endif; ?>
	<div class="edgtf-banner-image">
			<img src="<?php echo esc_url($image); ?>" alt="<?php esc_html_e('Image2', 'goodwish'); ?>" />
	</div>
	<div class="edgtf-banner-text-holder">
		<div class="edgtf-banner-text-table">
			<div class="edgtf-banner-text-cell">
				<?php if ($subtitle != '') { ?>
				<span class="edgtf-banner-subtitle" <?php goodwish_edge_inline_style($subtitle_font_style); ?>>
						<?php echo esc_attr($subtitle) ?>
				</span>
				<?php } ?>
				<?php if ($title != '') { ?>
					<<?php echo esc_attr($title_tag); ?> class="edgtf-banner-title" <?php goodwish_edge_inline_style($title_font_style); ?>>
						<span><?php echo wp_kses_post($title); ?></span>
					</<?php echo esc_attr($title_tag); ?>>
				<?php } ?>
				<?php if ($link !== '' && $link_text !== '') { ?>
					<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" class="edgtf-banner-read-more" <?php goodwish_edge_inline_style($link_style); ?>><?php echo esc_html($link_text); ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php if ($overlay_color != '') { ?>
		<div class="edgtf-banner-overlay-holder" <?php goodwish_edge_inline_style($img_hover_style); ?>></div>
	<?php } ?>
</div>