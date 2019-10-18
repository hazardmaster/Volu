<div class="edgtf-gfs-item">
	<?php if (has_post_thumbnail()) { ?>
		<div class="edgtf-gfs-image-holder">
			<?php the_post_thumbnail($thumb_image_size);?>
		</div>
	<?php } ?>
	<div class="edgtf-gfs-content-holder">
		<div class="edgtf-gfs-content-table">
			<div class="edgtf-gfs-content-table-cell">
				<<?php echo esc_attr($title_tag);?> class="edgtf-gfs-title">
					<a href="<?php the_permalink();?>">
						<?php the_title(); ?>
					</a>
				</<?php echo esc_attr($title_tag);?>>
				<div class="edgtf-gfs-content">
					<?php the_excerpt();?>
				</div>
				<?php goodwish_edge_give_progress($id, array('progress_color' => 'light')); ?>
				<div class="edgtf-give-button-holder">
					<?php echo goodwish_edge_get_button_html($button_params);?>
				</div>
			</div>
		</div>
	</div>
</div>
