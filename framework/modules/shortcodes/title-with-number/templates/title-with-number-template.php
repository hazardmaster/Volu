<?php
/**
 * Title With Number shortcode template
 */
?>
<<?php echo esc_attr($title_tag);?> class="edgtf-title-with-number" <?php goodwish_edge_inline_style($title_style); ?>>
	<span class="edgtf-twn-number"><?php echo esc_html($number);?></span><?php echo esc_html($title);?>
</<?php echo esc_attr($title_tag);?>>