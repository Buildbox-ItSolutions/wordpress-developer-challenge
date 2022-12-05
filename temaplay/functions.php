<?php

require ('inc/customizer.php');

function playtheme_load_scripts() {
    wp_enqueue_style('playtheme_style', get_stylesheet_uri(), array(), '1.0', 'all');
   }
   
   add_action('wp_enqueue_scripts','playtheme_load_scripts');

function playtheme_config() {
    register_nav_menus(
        array(
            'playtheme_main_menu' => 'Menu1',
                    )
    ); 
    
    $args = array(
        'height'    => 200,
        'width'     => 1920
    );
    
    add_theme_support('post-thumbnails');
    add_theme_support( 'custom-logo', array(
        'width' => 83,
        'height' => 26,
        'flex-height'   => true,
        'flex-width'    => true));
    add_theme_support('title-tag'); //recuperar títulos (erro 404)
    add_theme_support('automatic-feed-links');
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ));
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');

}


add_action('after_setup_theme', 'playtheme_config',0);

add_action('widgets_init', 'playtheme_sidebars');

function playtheme_sidebars(){
    register_sidebar(
        array(
            'name'  => esc_html__( 'Blog Sidebar', 'playtheme' ),
            'id'    => 'sidebar-blog',
            'description'   => esc_html__( 'This is the Blog Sidebar. You can add your widgets here.', 'playtheme' ),
            'before_widget' => '<div class= "widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after-title' => '</h4>'
        )
        );
    }

if(! function_exists('wp_body_open')){
    function wp_body_open() {
        do_action('wp_body_open');
    } 
}

require ('single-videos.php');

function playtheme_admin_styles() {
	// Admin CSS file
	wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/admin.css' );
}

add_action('admin_head', 'playtheme_admin_styles');
