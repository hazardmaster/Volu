<?php
$icon_html = goodwish_edge_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="edgtf-item <?php echo esc_attr($item_showcase_list_item_class); ?>">
	<?php if ( $item_position == 'right' && (!empty($icon) || !empty($custom_icon))) { ?>
		<?php if(!empty($custom_icon)) : ?>
			<div class="edgtf-item-custom-icon">
	            <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
	        </div>
	        <?php else: ?>
			<div class="edgtf-item-icon">
				<?php
				echo goodwish_edge_get_module_part($icon_html);
				?>
			</div>
		<?php endif; ?>
	<?php } ?>
	<div class="edgtf-item-content">
		<?php if ($item_title != '') { ?>
		<div class="edgtf-showcase-title-holder">
			<?php if ($item_link != '' ) { ?>
				<a href="<?php esc_url($item_link) ?>" target="<?php echo esc_attr($target); ?>">
			<?php } ?>
				<h4 class="edgtf-showcase-title"><?php echo esc_attr($item_title) ?></h4>
			<?php if ($item_link != '' ) { ?>
				</a>
			<?php } ?>
		</div>
		<?php } if ($item_text != '') { ?>
		<div class="edgtf-showcase-text-holder">
			<p class="edgtf-showcase-text"><?php echo esc_attr($item_text) ?></p>
		</div>
		<?php } ?>
	</div>
	<?php if($item_position == 'left' && (!empty($icon) || !empty($custom_icon))) { ?>
		<?php if(!empty($custom_icon)) : ?>
            <div class="edgtf-item-custom-icon">
	            <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
	        </div>
	        <?php else: ?>
			<div class="edgtf-item-icon">
				<?php
				echo goodwish_edge_get_module_part($icon_html);
				?>
			</div>
		<?php endif; ?>
	<?php } ?>
</div>