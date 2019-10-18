<div class="edgtf-give-form-item">
	<?php if (has_post_thumbnail()) { ?>
		<div class="edgtf-give-top-holder">
			<a href="<?php the_permalink();?>" class="edgtf-give-top-link"></a>
			<div class="edgtf-give-top-image">
				<?php the_post_thumbnail($thumb_image_size);?>
			</div>
			<div class="edgtf-give-top-button">
				<?php echo goodwish_edge_get_button_html($button_params);?>
			</div>
		</div>
	<?php } ?>
	<div class="edgtf-gf-content-holder" <?php echo goodwish_edge_get_inline_style($cause_standard_style);?>>
		<?php if ($categories !== ''){ ?>
			<h6 class="edgtf-gf-cats">
				<?php echo wp_kses_post($categories);?>
			</h6>
		<?php } ?>
		<<?php echo esc_attr($title_tag);?> class="edgtf-gf-title">
			<a href="<?php the_permalink();?>">
				<?php the_title(); ?>
			</a>
		</<?php echo esc_attr($title_tag);?>>
		<div class="edgtf-gf-content">
			<?php the_excerpt();?>
		</div>
		<?php goodwish_edge_give_progress($id, array()); ?>
		<?php if (!has_post_thumbnail()) { ?>
		<div class="edgtf-give-button-holder">
			<?php echo goodwish_edge_get_button_html($button_params);?>
		</div>
	<?php } ?>
	</div>
</div>
