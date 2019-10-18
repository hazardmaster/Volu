<div class="edgtf-portfolio-info-item edgtf-content-item">
	<?php if($params['type'] !== 'big-images' && $params['type'] !== 'big-slider' && $params['type'] !== 'big-masonry'): ?>
        <?php if(goodwish_edge_options()->getOptionValue('portfolio_single_hide_title') !== 'yes') : ?>
            <h3 class="edgtf-portfolio-title"><?php the_title(); ?></h3>
        <?php endif; ?>
	<?php endif; ?>
    <div class="edgtf-portfolio-content">
        <?php the_content(); ?>
    </div>
</div>