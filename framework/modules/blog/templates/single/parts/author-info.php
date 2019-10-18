<?php
if(isset($post_id)){
	$id = $post_id;
}else{
	$id = get_the_ID();
}
$post = get_post($id);
$author_id = $post->post_author;

$author_info_box = esc_attr(goodwish_edge_options()->getOptionValue('blog_author_info'));
$author_info_email = esc_attr(goodwish_edge_options()->getOptionValue('blog_author_info_email'));
$social_networks = goodwish_edge_get_user_custom_fields($author_id);
?>
<?php if($author_info_box === 'yes' && get_the_author_meta('description', $author_id) !== "") { ?>
	<div class="edgtf-author-description">
		<div class="edgtf-author-description-inner">
			<div class="edgtf-author-description-image">
				<?php echo goodwish_edge_kses_img(get_avatar(get_the_author_meta( 'ID' ), 175)); ?>
			</div>
			<div class="edgtf-author-description-text-holder">
				<h3 class="edgtf-author-name vcard author">
					<?php
						if(get_the_author_meta('first_name', $author_id) != "" || get_the_author_meta('last_name', $author_id) != "") {
							echo esc_attr(get_the_author_meta('first_name', $author_id)) . " " . esc_attr(get_the_author_meta('last_name', $author_id));
						} else {
							echo esc_attr(get_the_author_meta('display_name', $author_id));
						}
					?>
				</h3>
				<?php if($author_info_email === 'yes' && is_email(get_the_author_meta('email', $author_id))){ ?>
					<p itemprop="email" class="edgtf-author-email"><?php echo sanitize_email(get_the_author_meta('email', $author_id)); ?></p>
				<?php } ?>
				<?php if(get_the_author_meta('description', $author_id) != "") { ?>
					<div itemprop="description" class="edgtf-author-text">
						<p><?php echo esc_attr(get_the_author_meta('description', $author_id)); ?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>