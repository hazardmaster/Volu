<?php get_header(); ?>

	<?php goodwish_edge_get_title(); ?>

	<div class="edgtf-container">
	<?php do_action('goodwish_edge_after_container_open'); ?>
		<div class="edgtf-container-inner edgtf-404-page">
			<div class="edgtf-page-not-found">
				<span class="edgtf-page-not-found-top">
					<?php esc_html_e('404', 'goodwish'); ?>
				</span>
				<?php
					if (goodwish_edge_core_installed()) {
						$separator_html = goodwish_edge_execute_shortcode('edgtf_separator', array('position' => 'center'));
					} else {
						$separator_html = '<div class="edgtf-separator-holder clearfix  edgtf-sidebar-title-separator edgtf-separator-center"> <div class="edgtf-separator"></div></div>';
					}

					echo wp_kses_post($separator_html);
				?>
				<h3>
					<?php if(goodwish_edge_options()->getOptionValue('404_title')){
						echo esc_html(goodwish_edge_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('Page you are looking is not found', 'goodwish');
					} ?>
				</h3>
				<p>
					<?php if(goodwish_edge_options()->getOptionValue('404_text')){
						echo esc_html(goodwish_edge_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'goodwish');
					} ?>
				</p>
				<?php
					$params = array();
					if (goodwish_edge_options()->getOptionValue('404_back_to_home')){
						$params['text'] = goodwish_edge_options()->getOptionValue('404_back_to_home');
					}
					else{
						$params['text'] = esc_html__('Homepage', 'goodwish');
					}
				$params['link'] = esc_url(home_url('/'));
				$params['target'] = '_self';
				if (shortcode_exists('edgtf_button')){
					echo goodwish_edge_execute_shortcode('edgtf_button',$params);
				} else { ?>
					<a href="<?php echo esc_url(home_url('/'));?>" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid">
						<span class="edgtf-btn-text"><?php echo esc_html($params['text']);?></span>
					</a>
				<?php } ?>
			</div>
		</div>
		<?php do_action('goodwish_edge_before_container_close'); ?>
	</div>
<?php get_footer(); ?>