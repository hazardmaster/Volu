<?php
/*
Template Name: Landing Page
*/
$goodwish_edge_variable_sidebar = goodwish_edge_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * goodwish_edge_header_meta hook
         *
         * @see goodwish_edge_header_meta() - hooked with 10
         * @see edgt_user_scalable_meta() - hooked with 10
         */
        do_action('goodwish_edge_header_meta');
        ?>

        <?php wp_head(); ?>
    </head>

<body <?php body_class();?> itemscope itemtype="http://schema.org/WebPage">

<?php

$id = goodwish_edge_get_page_id();

if(goodwish_edge_get_meta_field_intersect('smooth_page_transitions',$id) === 'yes' &&
	goodwish_edge_get_meta_field_intersect('page_transition_preloader',$id) === 'yes') {
?>
<div class="edgtf-smooth-transition-loader edgtf-mimic-ajax">
    <div class="edgtf-st-loader">
        <div class="edgtf-st-loader1">
            <?php goodwish_edge_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="edgtf-wrapper">
	<div class="edgtf-wrapper-inner">
		<div class="edgtf-content">
            <?php if(goodwish_edge_is_ajax_enabled()) { ?>
            <div class="edgtf-meta">
                <?php do_action('goodwish_edge_ajax_meta'); ?>
                <span id="edgtf-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="edgtf-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
			<div class="edgtf-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="edgtf-full-width">
					<div class="edgtf-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($goodwish_edge_variable_sidebar == 'default')||($goodwish_edge_variable_sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('goodwish_edge_page_after_content'); ?>
							<?php elseif($goodwish_edge_variable_sidebar == 'sidebar-33-right' || $goodwish_edge_variable_sidebar == 'sidebar-25-right'): ?>
								<div <?php echo goodwish_edge_sidebar_columns_class(); ?>>
									<div class="edgtf-column1 edgtf-content-left-from-sidebar">
										<div class="edgtf-column-inner">
											<?php the_content(); ?>
											<?php do_action('goodwish_edge_page_after_content'); ?>
										</div>
									</div>
									<div class="edgtf-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($goodwish_edge_variable_sidebar == 'sidebar-33-left' || $goodwish_edge_variable_sidebar == 'sidebar-25-left'): ?>
								<div <?php echo goodwish_edge_sidebar_columns_class(); ?>>
									<div class="edgtf-column1">
										<div class="edgtf-column-inner">
											<?php the_content(); ?>
											<?php do_action('goodwish_edge_page_after_content'); ?>
										</div>
									</div>
									<div class="edgtf-column2 edgtf-content-right-from-sidebar">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>