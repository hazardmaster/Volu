<?php $title_tag = isset($title_tag) ? $title_tag : 'h3' ?>
<?php if(goodwish_edge_options()->getOptionValue('blog_single_title_in_title_area') == "no") { ?>
<<?php echo esc_attr($title_tag);?> itemprop="name" class="edgtf-post-title entry-title">
	<?php the_title(); ?>
</<?php echo esc_attr($title_tag);?>>
<?php } ?>