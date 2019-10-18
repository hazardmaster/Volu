<div class="edgtf-project-presentation <?php echo esc_attr($project_classes) ?>">
    <div class="edgtf-pp-content-holder">
        <div class="edgtf-pp-content-left">
            <div class="edgtf-pp-gallery">
                <div class="edgtf-pp-gallery-slider" <?php echo goodwish_edge_get_inline_attrs($slider_data); ?>>
                    <?php foreach ($images as $image) {
                            echo wp_get_attachment_image($image['image_id'], 'full'); 
                    } ?>
                </div>
            </div>
        </div>
        <div class="edgtf-pp-content-right">
            <div class="edgtf-pp-text-holder" <?php goodwish_edge_inline_style($text_style);?>>
                <?php if ($title != '') { ?>
                <<?php echo esc_attr($title_tag); ?> class="edgtf-pp-title">
                    <?php echo esc_attr($title); ?>
                </<?php echo esc_attr($title_tag); ?>>
                <?php } ?>
                <?php if ($subtitle != '') { ?>
                    <p class="edgtf-pp-subtitle">
                        <?php echo esc_attr($subtitle) ?>
                    </p>
                <?php } ?>
	            <?php if($show_button == "yes" && $button_text !== ''){ ?>
	                <div class="edgtf-pp-button">
	                    <?php echo goodwish_edge_get_button_html(array(
	                        'type' => 'solid-dark',
	                        'link' => $link,
	                        'target' => $link_target,
	                        'text' => $button_text,
	                        'color' => '#000',
	                        'hover_color' => '#000',
	                        'hover_background_color' => '#f6f4ee',
	                        'hover_border_color' => '#f6f4ee',
	                    )); ?>
	                </div>
	            <?php } ?>
            </div>
        </div>
    </div>
</div>