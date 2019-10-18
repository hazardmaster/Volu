<?php $title_tag = isset($title_tag) ? $title_tag : 'h3' ?>
<<?php echo esc_attr($title_tag);?> itemprop="name" class="entry-title edgtf-post-title">
	<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
</<?php echo esc_attr($title_tag);?>>