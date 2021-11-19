<?php
/**************************************************************************************/
// Script de Carregamento de post Ajax
/**************************************************************************************/
function play_tv_load_more_scripts() {
    $baseUrl = get_stylesheet_directory_uri();
	global $wp_query; 
	wp_enqueue_script('jquery');
 
	wp_register_script( 'AjaxLoadPosts', $baseUrl . '/assets/js/LoadPosts.js', array('jquery'), true );

	wp_localize_script( 'AjaxLoadPosts', 'posts_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ),
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'AjaxLoadPosts' );
}
 
add_action( 'wp_enqueue_scripts', 'play_tv_load_more_scripts' );


function play_tv_loadmore_ajax_handler(){
	// Argumentos do carregamento ajax
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // Puxando proxima página para carregamento
	$args['post_status'] = 'publish';
	
	query_posts( $args );
	    if( have_posts() ) : while( have_posts() ): the_post();
            get_template_part('inc/post/card');//Parte a ser chamada no ajax (template ou part)
		endwhile;endif;
	die;
}
 
add_action('wp_ajax_loadmore', 'play_tv_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'play_tv_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

?>