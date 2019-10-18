<?php 
if(is_array($images) && count($images)) : ?>
		<div class="edgtf-event-images-slider edgtf-slick-slider-navigation-style">
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
<?php endif; ?>