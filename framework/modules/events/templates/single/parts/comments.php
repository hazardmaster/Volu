<?php if(goodwish_edge_options()->getOptionValue('event_single_comments') == 'yes'){ ?>
    <div class="edgtf-grid">
       <?php comments_template('', true); ?>
   </div>
<?php } ?>
