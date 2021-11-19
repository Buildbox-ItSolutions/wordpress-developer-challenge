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
    wp_enqueue_style('styles-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('styles-fancybox',  'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');
    wp_enqueue_script('script-jquery',  'https://code.jquery.com/jquery-1.11.0.min.js');
    wp_enqueue_script('script-jquery-migrate',  'https://code.jquery.com/jquery-migrate-1.2.1.min.js');
    wp_enqueue_script('script-slick',  'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
    wp_enqueue_script('script-main', get_template_directory_uri() . '/assets/js/main.js');
    wp_enqueue_script('scripts-fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js');
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
  require dirname(__FILE__) . '/functions/advanced-custom-fields.php';;

  // Custom login page
  require dirname(__FILE__) . '/functions/custom-login-page.php';
  
  //Add post thumbnails and title tag
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'title-tag' );
