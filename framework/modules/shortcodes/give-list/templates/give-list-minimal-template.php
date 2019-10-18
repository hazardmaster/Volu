<div class="edgtf-give-form-item">
	<?php if (has_post_thumbnail()) { ?>
		<div class="edgtf-give-image-holder">
			<a href="<?php the_permalink();?>" class="edgtf-give-top-link"></a>
			<?php the_post_thumbnail($thumb_image_size);?>
		</div>
	<?php } ?>
	<div class="edgtf-gf-minimal-holder">
		<<?php echo esc_attr($title_tag);?> class="edgtf-gf-title">
			<a href="<?php the_permalink();?>">
				<?php the_title(); ?>
			</a>
		</<?php echo esc_attr($title_tag);?>>
		<div class="edgtf-gf-date">
			<?php the_time(get_option('date_format')); ?>
		</div>
	</div>
</div>
