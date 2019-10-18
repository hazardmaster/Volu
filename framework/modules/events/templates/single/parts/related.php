<div class="edgtf-event-related-holder">
    <h3><?php esc_html_e('Related Events', 'goodwish'); ?></h3>
    <div class="edgtf-event-related-slider clearfix">
        <?php
        $query = goodwish_edge_get_related_post_type(get_the_ID(), array('posts_per_page' => '6'));
        if (is_object($query)) {
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (has_post_thumbnail()) {
                    $id = get_the_ID();

                    $category_html = goodwish_edge_event_get_categories();
                    $start_date = goodwish_edge_event_get_start_date($id);

                    ?>
                    <article class="edgtf-event-item mix">
	                    <div class="edgtf-event-item-inner">
	                    	<div class = "edgtf-item-image-holder">
								<a class="edgtf-event-link" href="<?php echo get_permalink($id); ?>"></a>
									<?php
										echo get_the_post_thumbnail(get_the_ID(),'goodwish_edge_landscape');
									?>
								<div class="edgtf-item-text-overlay">
									<div class="edgtf-item-text-overlay-inner">
										<div class="edgtf-item-text-holder">
											<?php echo wp_kses_post($category_html);?>
											<h3 class="edgtf-item-title">
												<a class="edgtf-event-title-link" href="<?php echo get_permalink($id); ?>">
													<?php echo esc_attr(get_the_title()); ?>
												</a>
											</h3>
											<span class="edgtf-item-date"><?php echo esc_html($start_date); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </article>
                <?php } ?>
                <?php
            endwhile;
            endif;
            wp_reset_postdata();
        } else { ?>
            <p><?php esc_html_e('No related events were found.', 'goodwish'); ?></p>
        <?php }
        ?>
    </div>
</div>

