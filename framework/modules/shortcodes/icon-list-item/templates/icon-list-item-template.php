<?php
$icon_html = goodwish_edge_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="edgtf-icon-list-item">
	<div class="edgtf-icon-list-icon-holder">
        <div class="edgtf-icon-list-icon-holder-inner clearfix">
			<?php
			echo goodwish_edge_get_module_part($icon_html);
			?>
		</div>
	</div>
	<p class="edgtf-icon-list-text" <?php echo goodwish_edge_get_inline_style($title_style)?> > <?php echo esc_attr($title)?></p>
</div>