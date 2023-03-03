<?php
	
    include('inc/custom-taxonomies.php');
    include('inc/custom-post-types.php');
    include('inc/custom-fields.php');

    define('path_theme', get_template_directory_uri());
    
    function mytheme_enqueue_script(){
        wp_enqueue_script( 'my-custom-js', path_theme.'/assets/js/general.js', array('jquery'), '1.0', true );        
		wp_enqueue_script( 'slick-js', path_theme.'/assets/js/slick.min.js', array('jquery'), '1.0', true );
        wp_enqueue_style( 'slick-theme-css', path_theme.'/assets/css/slick-theme.css');
        wp_enqueue_style( 'slick-css', path_theme.'/assets/css/slick.css');
    	wp_enqueue_style( 'style-default', path_theme.'/assets/css/styles.css');
    }
    
    add_action('wp_enqueue_scripts', 'mytheme_enqueue_script', 20 );
        function start_config(){
    	add_theme_support('title-tag');
        add_theme_support('custom-logo');
    	add_theme_support('widgets');
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'editor-styles' );
    	add_theme_support( 'post-formats', array( 'quote', 'video', 'image' ) );

        // Header menu desktop/mobile
        register_nav_menus(array(
    		'menu_mobile' => 'Menu Mobile',
    		'menu_desktop' => 'Menu Desktop',
    	));

        // Widget footer / copyright
        register_sidebar(
            array(
                'name'=>'Footer ',
                'id'=>'sidebar-footer',
                'before_widget' => '<div>',
                'after_widget'  => '</div>',
            )
        );
    }

    add_action('init', 'start_config');
