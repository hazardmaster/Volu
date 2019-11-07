<?php
/*
Template Name: Eventlayout
*/
get_header();

require 'php/display.php';
 $display = new display();
 $display -> displayEvents();

?>
