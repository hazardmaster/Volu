<?php 
ob_start();
/**
 * Template Name: Logout
 *
 * @package flatsome
 */

session_start();

if (session_destroy()) {
  header("Location: ../");
  exit;
}

ob_get_clean();
?>

