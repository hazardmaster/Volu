<?php 
ob_start();
/**
 * Template Name: Activation Page
 *
 * @package flatsome
 */

session_start();

if (!$_GET["id"]) {
  $_SESSION["ErrorMessage"] = "Redirect error";
  header("Location: http://localhost/voluculture/");
  exit;
}



?>