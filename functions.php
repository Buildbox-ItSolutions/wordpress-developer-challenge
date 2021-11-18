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
    wp_enqueue_style('styles-header', get_template_directory_uri() . '/assets/css/initial.css');
    wp_enqueue_script('script-jquery',  'https://code.jquery.com/jquery-3.2.1.slim.min.js');
  }
  add_action('wp_enqueue_scripts', 'challenge_theme_scripts');
  
  //Remove admin bar
  add_filter( 'show_admin_bar' , 'challenge_theme_admin_bar');
  function challenge_theme_admin_bar(){
    return false;
  }
  
  //Custom logo
  if (!function_exists('challenge_theme_setup')) {
    function challenge_theme_setup()
    {
      
      // Adds theme support to logo
      add_theme_support(
        'custom-logo',
        array(
          'height'      => 104,
          'width'       => 34,
          'flex-width'  => true,
          'flex-height' => true,
        )
      );
    }
  }
  add_action('after_setup_theme', 'challenge_theme_setup');
  
  // Post types
    require dirname(__FILE__) .  '/functions/post_types/films_post_type.php';
    
  //remove editor gutenberg enable editor classic
  add_filter('use_block_editor_for_post', '__return_false');

  // AcfFields
  require dirname(__FILE__) . '/functions/advanced-custom-fields.php';