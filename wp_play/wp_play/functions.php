<?php

require ('custom-post/cpt-videos.php');

//add styles and scripts
function wp_play_load_scripts() {
    wp_enqueue_style('wp_play_style', get_stylesheet_uri(), array(), '1.0', 'all');
    wp_enqueue_script('font_awesome', get_template_directory_uri() . '/assets/js/font-awesome/fontawesome.min.js', array(), '1.0', true);
    wp_enqueue_script('font_awesome_regular', get_template_directory_uri() . '/assets/js/font-awesome/regular.min.js', array(), '1.0', true);
    wp_enqueue_script('font_awesome_solid', get_template_directory_uri() . '/assets/js/font-awesome/solid.min.js', array(), '1.0', true);
    wp_enqueue_script('menu-mobile', get_template_directory_uri() . '/assets/js/menu-mobile.js', array(), '1.0', true);
    wp_enqueue_script('wp_play_player', get_template_directory_uri() . '/assets/js/player.js', array(), '1.0', true);
    wp_enqueue_script('wp_play_filme-slider', get_template_directory_uri() . '/assets/js/slider.js', array(), '1.0', true);
  }
  add_action('wp_enqueue_scripts','wp_play_load_scripts');

//thumbnails and logo
  function wp_play_theme_config() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'wp_play_thumb', 248, 387, true );
    add_theme_support( 'custom_logo', array(
        'width'      => 104,
        'height'     => 33,
        'flex-height' => true,
        'flex-width'  => true
));
}
add_action('after_setup_theme', 'wp_play_theme_config',0);


//create home page on theme activation
function wp_play_theme_activation() {
  if (!get_page_by_title('Home')) {
     $page_data = array(
          'post_title'    => 'Home',
          'post_content'  => '',
          'post_status'   => 'publish',
          'post_type'     => 'page',
      );
      // Insert page into database
      wp_insert_post($page_data);
  }
}
add_action('after_switch_theme', 'wp_play_theme_activation');

// set home as front page after setting theme
function wp_play_set_front_page() {
   $home_page = get_page_by_path('home');
   if ($home_page && $home_page->post_status === 'publish') {
      update_option('page_on_front', $home_page->ID);
      update_option('show_on_front', 'page');
  }
}

add_action('after_setup_theme', 'wp_play_set_front_page');



// IMAGE PATH

define('WP_PLAY_LOGO_PATH', get_template_directory_uri() . '/assets/image/Grupo60.png');
define('WP_PLAY_ARROW_RIGHT_PATH', get_template_directory_uri() . '/assets/image/right.png');
define('WP_PLAY_ARROW_LEFT_PATH', get_template_directory_uri() . '/assets/image/left.png');
define('WP_PLAY_BTN_PLAY', get_template_directory_uri() . '/assets/image/botao-play.png');

