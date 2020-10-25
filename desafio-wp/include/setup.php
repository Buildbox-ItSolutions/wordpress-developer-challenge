<?php 
    function play_theme_styles(){
        wp_enqueue_style('slick_css', get_template_directory_uri().'/assets/css/slick.css');
        wp_enqueue_style('slick-theme_css', get_template_directory_uri().'/assets/css/slick-theme.css');
        wp_enqueue_style('style_css', get_template_directory_uri().'/assets/css/style.css');

        
        wp_enqueue_script('jquery_js', get_template_directory_uri().'/assets/js/jquery.js');
        wp_enqueue_script('slick_js', get_template_directory_uri().'/assets/js/slick.js');
        wp_enqueue_script('script_js', get_template_directory_uri().'/assets/js/script.js');
    }

    function play_after_setup(){
        add_theme_support("post-thumbnails");
        add_theme_support("title-tag");
        add_theme_support("custom-logo");
        add_theme_support("menus");

        register_nav_menu("primary", __('Primary Menu', 'play'));
        register_sidebar( array(
            'name' => 'Footer ',
            'id' => 'footer-widget-1',
            'description' => 'Rodapé da Página',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            ) );
    }


?>