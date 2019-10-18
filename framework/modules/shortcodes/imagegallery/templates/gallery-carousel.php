<div class="edgtf-image-gallery-carousel-wrapper">
	<div class="edgtf-image-gallery-carousel <?php echo esc_attr($slider_class)?>" <?php echo goodwish_edge_get_inline_attrs($slider_data); ?>>
		<?php foreach ($images as $image) { ?>
		<div>
			<?php if ($pretty_photo) { ?>
				<a href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
			<?php }
			elseif ($image['link'] !== '') { ?>
				<a class="edgtf-ig-link" href="<?php echo esc_url($image['link'])?>" target="<?php echo esc_attr($image['link_target']);?>">
			<?php } ?>

			<div class="edgtf-ig-image-holder">
				<?php if(is_array($image_size) && count($image_size)) : ?>
					<?php echo goodwish_edge_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
				<?php else: ?>
					<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
				<?php endif; ?>
			</div>

			<?php if ($pretty_photo || $image['link'] !== '') {?>
				</a>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>