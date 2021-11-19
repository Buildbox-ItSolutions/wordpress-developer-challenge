<?php

require_once get_template_directory() . '/includes/customizer.php';

function rc_theme_styles() {
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all');
	wp_enqueue_style('mobile-css', get_template_directory_uri() . '/assets/css/mobile.css', array(), '1.0', 'all');
	wp_enqueue_style('owlcarousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
	wp_enqueue_style('owlcarousel-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
	wp_enqueue_script('owlcarousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), false, true);
	wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', array('jquery'), false, true);
	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array('jquery'), false, true);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true);

	if (is_front_page()) {

        wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), false, 'all');

        wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), false, true);

        wp_enqueue_script('swiper-actions-js', get_stylesheet_directory_uri() . '/assets/js/swiper.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'rc_theme_styles');

function hasPost(){
	if (have_posts()) :
        echo '
        <article id="article">
            <div class="container">';
		while (have_posts()) : the_post();
			 the_content(); 
			if (comments_open() || get_comments_number()) {
				comments_template();
			}
		endwhile;
        echo '</div></article>';
	else :
		echo 'Ainda não há nada a ser mostrado...';
	endif;
}

function debug($param) {
    echo '<pre>';
    print_r($param);
    echo '</pre>';
    return;
}

register_nav_menus(
    array(
        'primary' => 'Main Menu'
    )
  );