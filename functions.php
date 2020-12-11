<?php

require_once "include/custom-post-video.php";

// Theme Features
function theme_features(){
	add_theme_support('post-thumbnails');
	add_image_size('video-full-thumbnails', 1920, 1080, true);
	add_image_size('video-thumbnails', 372, 581, true);
}
add_action('after_setup_theme', 'theme_features');

// Load Scripts
function enqueue_custom_scripts() {
	//wp_deregister_script('jquery');
	wp_enqueue_script('glider', get_template_directory_uri() . '/assets/js/glider.min.js', array(), 3.4, true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), 1.7, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Load Style
function enqueue_custom_styles() {
	wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', array(), 4.0, 'all');
	wp_enqueue_style('glider-theme', get_template_directory_uri() . '/assets/css/glider.min.css', array(), 1.7, 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.min.css', array(), 1.0, 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');