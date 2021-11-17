<?php
  /**
   * Twenty Nineteen functions and definitions
   *
   * @link https://developer.wordpress.org/themes/basics/theme-functions/
   *
   * @package Wordpress Developer Challenge Theme wp
   */


//Import style and scripts
  function challenge_theme_scripts()
  {
    wp_enqueue_style('styles-header', get_template_directory_uri() . '/assets/css/header.css');
    wp_enqueue_style('styles-bootstrap',  'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_script('script-jquery',  'https://code.jquery.com/jquery-3.2.1.slim.min.js');
    wp_enqueue_script('script-popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
    wp_enqueue_script('script-bootstrap',  'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
  }
  add_action('wp_enqueue_scripts', 'challenge_theme_scripts');
