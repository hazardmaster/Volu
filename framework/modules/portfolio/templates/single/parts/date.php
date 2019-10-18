<?php if(goodwish_edge_options()->getOptionValue('portfolio_single_hide_date') !== 'yes') : ?>

    <div class="edgtf-portfolio-info-item edgtf-portfolio-date">
        <span class="edgtf-portfolio-info-item-title"><?php esc_html_e('Date', 'goodwish'); ?></span>

        <p><?php the_time(get_option('date_format')); ?></p>
    </div>

<?php endif; ?>