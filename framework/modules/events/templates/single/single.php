<div class="edgtf-grid">
	<div class="edgtf-event-top-holder">
		<div class="edgtf-event-top-left">
			<?php
            //get event title
            goodwish_edge_event_get_info_part('title');
            ?>
		</div>
		<div class="edgtf-event-top-right">
			<?php
            //get event info title
            goodwish_edge_event_get_info_part('info-title');
            ?>
		</div>
	</div>
	<div class="edgtf-two-columns-75-25 clearfix">
		<div class="edgtf-column1">
			<div class="edgtf-column-inner">
				<?php goodwish_edge_event_get_info_part('content'); ?>
			</div>
		</div>
		<div class="edgtf-column2">
			<div class="edgtf-column-inner">
				<div class="edgtf-event-info-holder">
					<?php

           			//get event info title
            		goodwish_edge_event_get_info_part('info-title');

					// //get event categories section
					goodwish_edge_event_get_info_part('categories');

					// //get event date section
					goodwish_edge_event_get_info_part('location');

					// //get event date section
					goodwish_edge_event_get_date_part();

					// //get event custom fields section
					goodwish_edge_event_get_info_part('custom-fields');

					// //get event share section
					goodwish_edge_event_get_info_part('social');
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="edgtf-event-image-holder">
	<?php
	$images_array = array();

	$images_array['images'] = goodwish_edge_get_single_event_images();
	$images_layout = goodwish_edge_get_meta_field_intersect('event_images_layout', goodwish_edge_get_page_id());

	goodwish_edge_get_module_template_part('templates/single/parts/'.$images_layout, 'events','',$images_array); ?>
</div>