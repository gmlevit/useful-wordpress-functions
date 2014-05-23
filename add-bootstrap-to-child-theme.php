<?php


/* Add to your child theme's functions.php
 * Assumes .css files are in <child theme dir>/bootstrap/css/ */

function gmlevit_bootstrap_styles()
{
  wp_enqueue_style('gmlevit_bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.css', false, null);
  wp_enqueue_style('gmlevit_bootstrap_responsive', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap-responsive.css', array('gmlevit_bootstrap'), null);

}
add_action('wp_enqueue_scripts', 'gmlevit_bootstrap_styles');
?>
