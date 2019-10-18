<div <?php goodwish_edge_class_attribute($holder_classes); ?> <?php goodwish_edge_inline_style($holder_styles); ?>>
	<div class="edgtf-wh-holder-inner">
		<?php if(is_array($working_hours) && count($working_hours)) : ?>
				<?php if($title !== '') : ?>
					<div class="edgtf-wh-title-holder">
						<h3 class="edgtf-wh-title"><?php echo esc_html($title); ?></h3>
					</div>
				<?php endif; ?>

			<?php foreach($working_hours as $working_hour) : ?>
				<?php if (isset($working_hour['label'])): ?>
					<div class="edgtf-wh-item clearfix">
						<span class="edgtf-wh-day">
							<?php echo esc_html($working_hour['label']); ?>
							<?php 
								if(isset($working_hour['footnote']) && $working_hour['footnote'] == 'yes') { 
									echo esc_html('*');
								}
							?>
						</span>
						<span class="edgtf-wh-line"><span class="edgtf-wh-line-inner"></span></span>
						<?php if(isset($working_hour['closed']) && $working_hour['closed'] !== 'yes') { ?>
							<span class="edgtf-wh-hours">
								<?php if(isset($working_hour['from']) && $working_hour['from'] !== '') : ?>
									<span class="edgtf-wh-from"><?php echo esc_html($working_hour['from']); ?></span>
								<?php endif; ?>

								<?php if(isset($working_hour['to']) && $working_hour['to'] !== '') : ?>
									<span class="edgtf-wh-delimiter">-</span>
									<span class="edgtf-wh-to"><?php echo esc_html($working_hour['to']); ?></span>
								<?php endif; ?>
							</span>
						<?php } else { ?>
							<span class="edgtf-wh-hours">
								<span class="edgtf-wh-closed"><?php esc_html_e('Closed', 'goodwish'); ?></span>
							</span>
						<?php } ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<?php if($footnote !== '' && $show_footnote_text == 'yes') : ?>
				<div class="edgtf-wh-footnote-holder">
					<span class="edgtf-wh-footnote"><?php echo esc_html($footnote); ?></span>
				</div>
			<?php endif; ?>
		<?php else: ?>
		<p><?php esc_html_e('Working hours hadn\'t been set', 'goodwish'); ?></p>
		<?php endif; ?>
	</div>
</div>