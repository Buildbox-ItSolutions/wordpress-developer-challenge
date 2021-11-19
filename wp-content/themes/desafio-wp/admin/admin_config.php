<?php


add_action( 'init', 'cpt_admin' );
function cpt_admin(){
	
    $args = array(
        'labels' => array(
            'name' =>'Filmes',
        ),
        'show_in_menu' => true,
        'menu_position' => 1,
        'menu_icon' =>  'dashicons-format-video',
        'public' => true,		
        'supports' => array('title', 'thumbnail', 'editor'),
		'taxonomies' => array( 'category', 'post_tag'),

	);
	register_post_type( 'Filmes', $args);

}
	
function add_theme_scripts() {
	
	wp_enqueue_style('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
	wp_enqueue_style('Owl Carrossel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style('Owl Carrossel Theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('Style', get_template_directory_uri() . '/assets/css/style.css');
	
	wp_enqueue_script('Jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js');
	wp_enqueue_script('Owl Carrossel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
	wp_enqueue_script('Popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js');
	wp_enqueue_script('Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js');
	wp_enqueue_script('Mainjs', get_template_directory_uri() . '/assets/js/main.js');
	
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_theme_support( 'post-thumbnails' );