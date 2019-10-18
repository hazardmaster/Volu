<?php

//top header bar
add_action('goodwish_edge_before_page_header', 'goodwish_edge_get_header_top');

//mobile header
add_action('goodwish_edge_after_page_header', 'goodwish_edge_get_mobile_header');