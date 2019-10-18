<?php 
$edgtf_event_subtitle = get_post_meta(get_the_ID(), 'edgtf_event_subtitle', true);

?>

<div class="edgtf-event-title-holder">
	<?php  if ($edgtf_event_subtitle !== '') { ?>
		<span class="edgtf-event-subtitle"><?php echo esc_html($edgtf_event_subtitle)?></span>
	<?php } ?>
    <h3 class="edgtf-event-title"><?php the_title(); ?></h3>
</div>