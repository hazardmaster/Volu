<?php 
if(is_array($images) && count($images)) : ?>
	<div class="edgtf-grid">
		<div class="edgtf-event-images-gallery edgtf-event-gallery-col-3">
			<?php
			foreach($images as $single_image) : 
				extract($single_image);
			?>
			<div class="edgtf-event-single-image">
			    <a title="<?php echo esc_attr($title); ?>" data-rel="prettyPhoto[single_event_pretty_photo]" href="<?php echo esc_url($image_src[0]); ?>">
					<img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($description); ?>" />
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>