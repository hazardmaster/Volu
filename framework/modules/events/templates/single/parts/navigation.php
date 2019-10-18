<?php if ( goodwish_edge_options()->getOptionValue( 'event_single_show_pagination' ) == 'yes' ) : ?>

	<?php
	$nav_same_category = goodwish_edge_options()->getOptionValue( 'event_single_nav_same_category' ) == 'yes';
	?>

	<div class="edgtf-event-single-nav">
		<div class="edgtf-event-single-nav-inner">
			<?php if ( get_previous_post() !== '' ) : ?>
				<div class="edgtf-event-prev">
					<?php if ( $nav_same_category ) {
						previous_post_link( '%link', '<span class="arrow_left"></span>'.esc_html__( 'Previous Event', 'goodwish' ), true, '', 'edge-event-category' );
					} else {
						previous_post_link( '%link', '<span class="arrow_left"></span>'.esc_html__( 'Previous Event', 'goodwish' ) );
					} ?>
				</div>
			<?php endif; ?>
			<?php if ( get_next_post() !== '' ) : ?>
				<div class="edgtf-event-next">
					<?php if ( $nav_same_category ) {
						next_post_link( '%link', esc_html__( 'Next Event', 'goodwish' ).'<span class="arrow_right"></span>', true, '', 'edge-event-category' );
					} else {
						next_post_link( '%link', esc_html__( 'Next Event', 'goodwish' ).'<span class="arrow_right"></span>');
					} ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>