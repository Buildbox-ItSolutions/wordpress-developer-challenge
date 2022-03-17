<?php 
// Load scripts and styles
function w5312_load_scripts() {
  wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', [], '8.0.7', 'all');
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], '1.0', 'all');
  wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', [], '8.0.7', true);
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'w5312_load_scripts');

// Support
function w5312_add_support() {
  add_theme_support('post-thumbnails');
  add_theme_support('post-formats', [
    'video'
  ]);
  add_image_size('post-article', 250, 390, ['center', 'center']);
  add_image_size('post-featured', 1920, 900, ['center', 'center']);
}
add_action('after_setup_theme', 'w5312_add_support');

// *** Remove Extra Image Sizes ***
function remove_extra_image_sizes() {
  foreach ( get_intermediate_image_sizes() as $size ) {
    if ( !in_array( $size, array( 'thumbnail', 'medium', 'post-article', 'post-featured' ) ) ) {
        remove_image_size( $size );
    }
  }
}
add_action('init', 'remove_extra_image_sizes');

// Remove Prefix Category
function w5312_theme_archive_title( $title ) {
  if ( is_category() ) {
      $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif ( is_post_type_archive() ) {
      $title = post_type_archive_title( '', false );
  } elseif ( is_tax() ) {
      $title = single_term_title( '', false );
  }

  return $title;
}
add_filter( 'get_the_archive_title', 'w5312_theme_archive_title' );