<?php

get_header();
goodwish_edge_get_title();
get_template_part('slider');
goodwish_edge_single_event();
do_action('goodwish_edge_after_container_close');
get_footer();

?>