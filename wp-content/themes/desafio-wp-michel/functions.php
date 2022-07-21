<?php
if ( ! function_exists( 'play_michel_setup' ) ) :

function play_michel_setup() {


    load_theme_textdomain( 'play_michel', get_template_directory() . '/languages' );


    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );
    

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );


    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'play_michel' ),
        'social'  => __( 'Social Links Menu', 'play_michel' ),
    ) );


    update_option( 'thumbnail_size_w', 248 );
    update_option( 'thumbnail_size_h', 387 );
    update_option( 'thumbnail_crop', 1 );

    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

     add_post_type_support( 'page', 'excerpt' );
}
endif; 
add_action( 'after_setup_theme', 'play_michel_setup' );


if ( ! function_exists( 'play_michel_init' ) ) :

function play_michel_init() {

    
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

}
endif;

add_action( 'init', 'play_michel_init' );


if ( ! function_exists( 'play_michel_custom_image_sizes_names' ) ) :

function play_michel_custom_image_sizes_names( $sizes ) {

    return $sizes;
}
add_action( 'image_size_names_choose', 'play_michel_custom_image_sizes_names' );
endif;



if ( ! function_exists( 'play_michel_widgets_init' ) ) :

function play_michel_widgets_init() {

   
}
add_action( 'widgets_init', 'play_michel_widgets_init' );
endif;


if ( ! function_exists( 'play_michel_customize_register' ) ) :

function play_michel_customize_register( $wp_customize ) {
    

}
add_action( 'customize_register', 'play_michel_customize_register' );
endif;


if ( ! function_exists( 'play_michel_enqueue_scripts' ) ) :
    function play_michel_enqueue_scripts() {

        

    wp_deregister_script( 'play_michel-popper' );
    wp_enqueue_script( 'play_michel-popper', get_template_directory_uri() . '/assets/js/popper.min.js', false, null, true);

    wp_deregister_script( 'play_michel-bootstrap' );
    wp_enqueue_script( 'play_michel-bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', false, null, true);


    wp_deregister_style( 'play_michel-bootstrap' );
    wp_enqueue_style( 'play_michel-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', false, null, 'all');

    wp_deregister_style( 'play_michel-style' );
    wp_enqueue_style( 'play_michel-style', get_bloginfo('stylesheet_url'), false, null, 'all');

    wp_deregister_style( 'play_michel-slick' );
    wp_enqueue_style( 'play_michel-slick', get_template_directory_uri() . '/slick/slick.css', false, null, 'all');


    }
    add_action( 'wp_enqueue_scripts', 'play_michel_enqueue_scripts' );
endif;

function pgwp_sanitize_placeholder($input) { return $input; }

require_once "inc/custom.php";
require_once "inc/wp_pg_helpers.php";
require_once "inc/wp_smart_navwalker.php";
?>