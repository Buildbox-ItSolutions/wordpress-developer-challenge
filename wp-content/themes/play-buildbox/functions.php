<?php
/**************************************************************************************/
// Limpeza, remoção de emojis
/**************************************************************************************/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**************************************************************************************/
// Desabilitação do Heaterbeat API - Otimização de recursos no backend
/**************************************************************************************/
add_action( 'init', 'stop_heartbeat', 1 );
    function stop_heartbeat() {
        wp_deregister_script('heartbeat');
    }

/**************************************************************************************/
// SCRIPTS E JS WORDPRESS
/**************************************************************************************/
    function play_scripts() {
        $baseUrl = get_stylesheet_directory_uri();
        wp_enqueue_style( 'Style', $baseUrl .'/assets/css/style.css',array());
        wp_enqueue_script( 'Jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(),'',true );
        //Script para player, apenas na single
        if(is_single()){
            wp_enqueue_style( 'Plry', 'https://cdn.plyr.io/3.6.9/plyr.css',array());
            wp_enqueue_script( 'Plry', 'https://cdn.plyr.io/3.6.9/plyr.js', array(),'',true );
            wp_enqueue_script( 'Player', $baseUrl . '/assets/js/Player.js', array(),'',true );
        }
        //Script de slider, apenas na home
        if(is_home()){
            wp_enqueue_script( 'Slick_Home', $baseUrl . '/assets/js/Slick_home.js', array(),'',true );
            wp_enqueue_style( 'Slick', $baseUrl .'/assets/css/slick.css',array());
            wp_enqueue_script( 'Slick', $baseUrl . '/assets/js/slick.min.js', array(),'',true );
        }
        wp_enqueue_script( 'Main', $baseUrl . '/assets/js/main.js', array(),'',true );
    }

    add_action( 'wp_enqueue_scripts', 'play_scripts' );


/**************************************************************************************/
// Title Otimizado para SEO
/**************************************************************************************/
    add_filter( 'wp_title', 'site_titlee' );
    
    function site_titlee( $title ) {
      global $page, $paged;
      if ( is_feed() )
        return $title;
      $site_description = get_bloginfo( 'description' );
      $filtered_title = $title . get_bloginfo( 'name' );
      $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
      $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

      return $filtered_title;
    }

    
/**************************************************************************************/
// Menus personalizados
/**************************************************************************************/
    register_nav_menus( array(
        'menu_principal' => 'Menu Principal',
        'menu_rodape' => 'Menu Rodapé',
    ) );
/**************************************************************************************/
// Suporte Thumbnails
/**************************************************************************************/
    add_theme_support( 'post-thumbnails' );

/**************************************************************************************/
// Logo Customizado
/**************************************************************************************/
    add_theme_support( 'custom-logo' );
    function Play_Tv_customLogo() {
        $defaults = array(
            'height'               => 75,
            'width'                => 100,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true, 
        );
     
        add_theme_support( 'custom-logo', $defaults );
    }
     
    add_action( 'after_setup_theme', 'Play_Tv_customLogo' );
    function logo_play(){
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        if ( has_custom_logo() ) {
            return '<a href="'.get_site_url().'"><img class="logo-header__img" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
        } else {
            return '<div class="logo-header__img--pattern"><a href="'.get_site_url().'"></a></div>';
        }
    }

/**************************************************************************************/
// Get Template Part com argumentos de query
/**************************************************************************************/
function _get_template_part($slug, $name = null, $play_args = array())
{
	if (isset($name) && $name !== 'none') $slug = "{$slug}-{$name}.php";
	else $slug = "{$slug}.php";
	$dir = get_stylesheet_directory();
	$file = "{$dir}/{$slug}";

	ob_start();
	$play_args = wp_parse_args($play_args);
	$slug = $dir = $name = null;
	require($file);
	echo ob_get_clean();
}

function get_template_partial($filename, $play_args = [])
{
	return _get_template_part($filename, null, $play_args);
}

/**************************************************************************************/
// Campo para customização de texto simples do rodapé
/**************************************************************************************/
add_action( 'customize_register' , 'Play_Tv_option_theme' );

function Play_Tv_option_theme( $wp_customize ) {
	$wp_customize->add_section( 
        'play_footer_options', 
        array(
            'title'       => __( 'Rodapé', 'mytheme' ),
            'priority'    => 200,
            'capability'  => 'edit_theme_options',
            'description' => __('Mudar informações do Rodapé.', 'mytheme'),
        ) 
    );
    $wp_customize->add_setting( 'footer_copy_text',
        array(
            'default' => '© 2021 — Play — Todos os direitos reservados.'
        )
    );  

    $wp_customize->add_control( 'footer_copy_text', array(
        'id'=> 'id',
        'label'    => __( 'CopyRight', 'mytheme' ), 
        'section'  => 'play_footer_options',
        'settings' => 'footer_copy_text',
        'priority' => 10,
    )); 
}

function footer_copy(){
    return '<p>'.get_theme_mod('footer_copy_text').'</p>';
}

/**************************************************************************************/
// Inclusão de post type
/**************************************************************************************/
include_once('inc/types/videos.php');

/**************************************************************************************/
// Inclusão Campos ACF
/**************************************************************************************/
include_once('inc/acf/index.php');
/**************************************************************************************/
// Inclusão LoadMore Ajax
/**************************************************************************************/
include_once('inc/AjaxLoad/index.php');


?>