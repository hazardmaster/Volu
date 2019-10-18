<div class="edgtf-tabs <?php echo esc_attr($tab_class); ?> <?php echo esc_attr($tab_title_layout); ?> clearfix">
	<ul class="edgtf-tabs-nav">
		<?php foreach ($tabs_titles as $tab_title) { ?>
			<li>
				<a href="#tab-<?php echo sanitize_title($tab_title)?>">
					<?php if($tab_class === 'edgtf-vertical-tab' && ($tab_title_layout === 'edgtf-tab-with-icon' || $tab_title_layout === 'edgtf-tab-only-icon')) { ?>
						<span class="edgtf-icon-frame"></span>
					<?php } ?>

					<?php if($tab_title !== '' && $tab_title_layout !== 'edgtf-tab-only-icon') { ?>
						<span class="edgtf-tab-text-after-icon">
							<?php echo esc_attr($tab_title)?>
						</span>
					<?php } ?>
						
					<?php if($tab_class !== 'edgtf-vertical-tab' && ($tab_title_layout === 'edgtf-tab-with-icon' || $tab_title_layout === 'edgtf-tab-only-icon')) { ?>
						<span class="edgtf-icon-frame"></span>
					<?php } ?>
				</a>
			 </li>
		<?php } ?>
	</ul> 
	<?php echo do_shortcode($content); ?>
</div>