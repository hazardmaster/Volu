<?php
/*
Template Name: partnerlayout
*/
get_header();


require 'php/display.php';

$display = new display();
$display -> displayPartners();

?>
