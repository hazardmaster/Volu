<?php if(have_posts()): while(have_posts()) : the_post(); ?>
	<div class="edgtf-event-single-holder">
		<div class="edgtf-full-width">
		    <div class="edgtf-full-width-inner">
	            <?php if(post_password_required()) {
	                echo get_the_password_form();
	            } else {
	                //load proper events template
	                goodwish_edge_get_module_template_part('templates/single/single', 'events', $slug);
	            } ?>
				<?php 
					if(goodwish_edge_options()->getOptionValue('event_single_show_related') === 'yes'){
						//load events related
						goodwish_edge_get_module_template_part('templates/single/parts/related', 'events');
					}
				?>
	        </div>
	    </div>
	</div>
<?php
	//load events navigation
	goodwish_edge_get_module_template_part('templates/single/parts/navigation', 'events');
	
	//load events comments
	goodwish_edge_get_module_template_part('templates/single/parts/comments', 'events');

	endwhile;
	endif;
?>