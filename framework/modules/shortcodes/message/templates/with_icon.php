<?php
$icon_html = goodwish_edge_icon_collections()->renderIcon($icon, $icon_pack);
?>

<div class="edgtf-message-icon-holder">
	<div class="edgtf-message-icon" <?php goodwish_edge_inline_style($icon_attributes); ?>>
		<div class="edgtf-message-icon-inner">
			<?php
			echo goodwish_edge_get_module_part($icon_html);
			?>			
		</div> 
	</div>	 
</div>

