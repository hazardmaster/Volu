<?php 
ob_start();

/**
 * Template Name: Ajax Test
 *
 * @package flatsome
 */

get_header();
?>


<div id="ajax-posts" class="row">
  <?php
  $args = array( 'post_type' => 'post', 
                  'posts_per_page' => 10,
                );
      $loop = new WP_Query($args);
      while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="small-12 large-4 columns">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
  <?php 
    endwhile;
    wp_reset_postdata();
  ?>
</div>

<input type="hidden" id="totalpages" value="<?= $loop->max_num_pages ?>">
<div id="more_posts">Load More</div>


<?php

get_footer();

?>

