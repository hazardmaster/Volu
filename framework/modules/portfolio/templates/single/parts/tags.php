<?php
$tags = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if(is_array($tags) && count($tags)) :
    foreach($tags as $tag) {
        $tag_names[] = $tag->name;
    }

    ?>
    <div class="edgtf-portfolio-info-item edgtf-portfolio-tags">
        <span class="edgtf-portfolio-info-item-title"><?php esc_html_e('Tags', 'goodwish'); ?></span>
        <p>
            <?php echo esc_html(implode(', ', $tag_names)); ?>
        </p>
    </div>
<?php endif; ?>
