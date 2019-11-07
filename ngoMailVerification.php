<?php
/*
Template Name:NGO MailVerification
*/

session_start();
include('ngoDbfunctions.php');
$mail= new Ngodetails();

$code=$_GET['id'];
$Ngo_name=$_GET['user'];

$mail->Ngo_verification($code,$Ngo_name);





?>
