<?php

    /*
    Template Name:Opportunitydisplay
    */
    get_header();


require 'php/display.php';
$display = new displayopp();

if(!empty($_GET['oppID'])){
    $display -> displayOpportunitiesDescription($_GET['oppID']);
}else{
    $display -> displayOpportunities();

}




?>


