<?php

// Require
require_once 'inc/custom-post.php';
require_once 'inc/acf.php';

// Include Scripts and CSS
function buildbox_scripts() {
    
    //scripts
    wp_enqueue_script('jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', null, true );
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/node_modules/what-input/dist/what-input.min.js', 'jquery', null, true );
    wp_enqueue_script( 'foundation', get_template_directory_uri() . '/node_modules/foundation-sites/dist/js/foundation.min.js', 'jquery', null, true );
    wp_enqueue_script( 'splide', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), null, true );
    wp_enqueue_script( 'foundation-app', get_template_directory_uri() . '/js/app.js', 'foundation', null, true );

    //css
    wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/css/app.css' );

}
add_action( 'wp_enqueue_scripts', 'buildbox_scripts' );

if ( ! function_exists( 'play_menu' ) ) {

    // Register Navigation Menus
    function play_menu() {
    
        $locations = array(
            'header' => __( 'Menu localizado no topo do site', 'play' ),
        );
        register_nav_menus( $locations );
    
    }
    add_action( 'init', 'play_menu' );
    
}

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 800;

if ( ! function_exists('play_theme_features') ) {

    // Register Theme Features
    function play_theme_features()  {

        // Add theme support for Automatic Feed Links
        add_theme_support( 'automatic-feed-links' );

        // Add theme support for Featured Images
        add_theme_support( 'post-thumbnails', array( 'post', 'page', 'video' ) );

        // Add theme support for HTML5 Semantic Markup
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

        // Add theme support for document Title tag
        add_theme_support( 'title-tag' );

        // Add theme support for custom CSS in the TinyMCE visual editor
        add_editor_style( 'editor-style.css' );

        add_image_size( 'featured-home', 1920, 1000, true );
        add_image_size( 'thumbnail-home', 248, 387, true );
        add_image_size( 'featured-single', 1638, 920, true );
    }
    
add_action( 'after_setup_theme', 'play_theme_features' );

}