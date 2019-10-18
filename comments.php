<?php
if (post_password_required()) {
	return;
}

if (comments_open() || get_comments_number()) : ?>
	<div class="edgtf-comment-holder clearfix" id="comments">
		<div class="edgtf-comment-number">
			<div class="edgtf-comment-number-inner">
				<h3><?php comments_number(esc_html__('No Comments', 'goodwish'), '1' . esc_html__(' Comment ', 'goodwish'), '% ' . esc_html__(' Comments ', 'goodwish')); ?></h3>
			</div>
		</div>
		<div class="edgtf-comments">
			<?php if (have_comments()) : ?>
				<ul class="edgtf-comment-list">
					<?php wp_list_comments(array('callback' => 'goodwish_edge_comment')); ?>
				</ul>
			<?php endif; ?>
			<?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
				<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'goodwish'); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<?php
	$goodwish_edge_variable_commenter = wp_get_current_commenter();
	$goodwish_edge_variable_req = get_option('require_name_email');
	$goodwish_edge_variable_aria_req = ($goodwish_edge_variable_req ? " aria-required='true'" : '');
	$goodwishn_edge_consent = empty($goodwish_edge_variable_commenter['comment_author_email']) ? '' : ' checked="checked"';

	$goodwish_edge_variable_args = array(
		'id_form' => 'commentform',
		'id_submit' => 'submit_comment',
		'title_reply' => esc_html__('Post a Comment', 'goodwish'),
		'title_reply_to' => esc_html__('Post a Reply to %s', 'goodwish'),
		'cancel_reply_link' => esc_html__('Cancel Reply', 'goodwish'),
		'label_submit' => esc_html__('Submit', 'goodwish'),
		'comment_field' => '<textarea id="comment" placeholder="' . esc_attr__('Comment', 'goodwish') . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => apply_filters('comment_form_default_fields', array(
			'author' => '<div class="edgtf-two-columns-50-50 clearfix"><div class="edgtf-two-columns-50-50-inner clearfix"><div class="edgtf-column"><div class="edgtf-column-inner"><input id="author" name="author" placeholder="' . esc_attr__('Name', 'goodwish') . '" type="text" value="' . esc_attr($goodwish_edge_variable_commenter['comment_author']) . '"' . $goodwish_edge_variable_aria_req . ' /></div></div>',
			'email' => '<div class="edgtf-column"><div class="edgtf-column-inner"><input id="email" name="email" placeholder="' . esc_attr__('E-mail', 'goodwish') . '" type="text" value="' . esc_attr($goodwish_edge_variable_commenter['comment_author_email']) . '"' . $goodwish_edge_variable_aria_req . ' /></div></div></div></div>',
			'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $goodwishn_edge_consent . ' />' .
				'<label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'goodwish') . '</label></p>',
		)),);


	if (is_user_logged_in()) {
		$goodwish_edge_variable_args['class_form'] = 'edgtf-comment-registered-user';
		$goodwish_edge_variable_args['title_reply_before'] = '<h3 id="reply-title" class="comment-reply-title edgtf-comment-reply-title-registered">';
	}

	?>
	<?php if (get_comment_pages_count() > 1) {
		?>
		<div class="edgtf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>
	<div class="edgtf-comment-form">
		<?php comment_form($goodwish_edge_variable_args); ?>
	</div>
<?php endif; ?>