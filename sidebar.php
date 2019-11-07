<?php
$goodwish_edge_variable_sidebar = goodwish_edge_get_sidebar();
?>
<div class="edgtf-column-inner">
  <div class="sidebar-module" style="background-color: #f5f5ef; padding: 10px; border-radius: 5%">
    <h4>SHARE WITH US!</h4> <!-- the_author_meta('description'); -->
    <hr>
    <p>Having amazing news to share? Great! We invite guest bloggers, contact us<a href="http://localhost/voluculture/contact-us/"><em> here.</em></a></p>
  </div>
  <div class="sidebar-module" style="padding: 10px;">
    <h4>Archives</h4>
    <ul class="list-unstyled">
      <?php wp_get_archives('type=monthly') ?>
    </ul>
  </div>
  <div class="sidebar-module" style="padding: 10px;">
    <h4>Categories</h4>
    <?php
      $categories = wp_list_categories([
                                  'show_option_all' => 'All',
                                  'hide_empty' => false,
                                  'title_li' => '',
                                  'current_category' => 'All',
                                  'echo' => false,
                                  'show_count' => true
                                ]);
      echo $categories;
    ?>

  </div>
  <!--
  <aside class="edgtf-sidebar">
    uncomment php to use
    < php
      if (is_active_sidebar($goodwish_edge_variable_sidebar)) {
      dynamic_sidebar($goodwish_edge_variable_sidebar);
    }
    ?>
  </aside>
  -->
</div>
