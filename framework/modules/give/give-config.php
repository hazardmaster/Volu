<?php 

//Give forms add comments support
add_filter('give_forms_supports','goodwish_edge_give_form_supports');

//Give donate form adjusted
add_filter('give_display_checkout_button', 'goodwish_edge_give_btn');

// //Give content layout reorganize
add_action('goodwish_edge_give_content_top','give_show_form_images', 5);
add_action( 'goodwish_edge_give_frontend_warning', 'give_test_mode_frontend_warning', 10 );

add_action('goodwish_edge_give_progress_part','goodwish_edge_give_progress', 10, 2);

//Give donate form adjusted
add_filter('give_donate_form','goodwish_edge_give_donation_form',10,2);

add_action('goodwish_edge_give_content', 'give_get_donation_form', 20 );
add_action('goodwish_edge_give_content', 'goodwish_edge_give_comment_form', 30 );


//Sidebar options
add_filter('give_forms_single_sidebar','goodwish_edge_give_sidebar_options');