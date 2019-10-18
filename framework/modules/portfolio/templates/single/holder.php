<div <?php goodwish_edge_class_attribute($holder_class); ?>>
<?php if($fullwidth) : ?>
	<div class="edgtf-full-width">
	    <div class="edgtf-full-width-inner">
	<?php else: ?>
	<div class="edgtf-container">
	    <div class="edgtf-container-inner clearfix">
	<?php endif; ?>
            <?php if(post_password_required()) {
                echo get_the_password_form();
            } else {
                //load proper portfolio template
                goodwish_edge_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);
            } ?>
        </div>
    </div>
	<?php
		//load portfolio navigation
		goodwish_edge_get_module_template_part('templates/single/parts/navigation', 'portfolio');

		//load portfolio comments
		goodwish_edge_get_module_template_part('templates/single/parts/comments', 'portfolio');
	?>
</div>