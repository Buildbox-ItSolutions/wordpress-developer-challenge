<?php
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
if ( ! function_exists( 'play_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.		 
	 */
	function play_setup() {	

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'title-tag' );		
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-header' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu_principal' => esc_html__( 'Menu Principal', 'play' ),
			)
		);	
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'video',				
				'caption',
				'style',
				'script',
			)
		);	
		
		/**
		 * Add support for core custom logo.		
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'play_setup' );

/**
 * Enqueue scripts and styles.
 */
function play_scripts() {
	wp_enqueue_style('style', get_stylesheet_uri());	
	wp_enqueue_style( 'glider', get_template_directory_uri() . '/assets/css/glider.css');
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css');
	

	wp_enqueue_script( 'jquery');
	wp_enqueue_script('glider', get_template_directory_uri() . '/assets/js/glider.js');
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js' );
	
}
add_action( 'wp_enqueue_scripts', 'play_scripts' );

	
// Advanced Custom Fields
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => 'group_5f9b4bd8860e0',
		'title' => 'Vídeos',
		'fields' => array(
			array(
				'key' => 'field_5f9b4bfcb769a',
				'label' => 'Duração',
				'name' => 'duracao',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5f9b4c68b769b',
				'label' => 'Url do vídeo',
				'name' => 'url_do_video',
				'type' => 'oembed',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'width' => 920,
				'height' => 920,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'video',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));	
endif;


//Custom Post Type:
function cptui_register_my_cpts() {	
	$labels = [
		"name" => __( "Videos", "play" ),
		"singular_name" => __( "Video", "play" ),
		"menu_name" => __( "Meus vídeos", "play" ),
		"all_items" => __( "Todos os vídeos", "play" ),
		"add_new" => __( "Adicionar novo vídeo", "play" ),
		"add_new_item" => __( "Novo vídeo", "play" ),
		"edit_item" => __( "Editar item", "play" ),
		"new_item" => __( "Novo vídeo", "play" ),
		"view_item" => __( "Visualizar vídeo", "play" ),
		"view_items" => __( "Visualizar vídeos", "play" ),
		"search_items" => __( "Procurar vídeo", "play" ),
		"not_found" => __( "Vídeo não encontrado", "play" ),
	];
	
	$args = [
		"label" => __( "Videos", "play" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "video", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];
	
	register_post_type( "video", $args );
	}
	
	add_action( 'init', 'cptui_register_my_cpts' );

	
	///////////////////////////////////////////////////////
	
	function cptui_register_my_taxes() {
	
	/**
	 * Taxonomy: Gêneros.
	 */
	
	$labels = [
		"name" => __( "Gêneros", "play" ),
		"singular_name" => __( "Genero", "play" ),
		"menu_name" => __( "Gêneros", "play" ),
		"all_items" => __( "Todas os gêneros", "play" ),
		"edit_item" => __( "Editar categoria", "play" ),
		"view_item" => __( "Visualizar gênero", "play" ),
		"update_item" => __( "Atualizar nome do gênero", "play" ),
		"add_new_item" => __( "Adicionar gênero de vídeo", "play" ),
		"new_item_name" => __( "Novo nome do gênero", "play" ),
		"search_items" => __( "Procurar gênero", "play" ),
		"popular_items" => __( "gêneros populares", "play" ),
		"not_found" => __( "Nenhum gênero encontrado", "play" ),
		"items_list" => __( "Lista de gênero", "play" ),
	];
	
	$args = [
		"label" => __( "Gêneros", "play" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'genero', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "genero",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "genero", [ "video" ], $args );
	}
	add_action( 'init', 'cptui_register_my_taxes' );
	
	////////////////////////////////////////////////////////////////
	
	function cptui_register_my_taxes_genero() {
	
	/**
	 * Taxonomy: Gêneros.
	 */
	
	$labels = [
		"name" => __( "Gêneros", "play" ),
		"singular_name" => __( "Genero", "play" ),
		"menu_name" => __( "Gêneros", "play" ),
		"all_items" => __( "Todas os gêneros", "play" ),
		"edit_item" => __( "Editar gênero", "play" ),
		"view_item" => __( "Visualizar gênero", "play" ),
		"update_item" => __( "Atualizar nome do gênero", "play" ),
		"add_new_item" => __( "Adicionar gênero de vídeo: Documentários, Filmes ou Séries", "play" ),
		"new_item_name" => __( "Novo nome do gênero", "play" ),
		"search_items" => __( "Procurar gênero", "play" ),
		"popular_items" => __( "gêneros populares", "play" ),
		"not_found" => __( "Nenhum gênero encontrado", "play" ),
		"items_list" => __( "Lista de gênero", "play" ),
	];
	
	$args = [
		"label" => __( "Gêneros", "play" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'genero', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "genero",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
			];
	register_taxonomy( "genero", [ "video" ], $args );
	
	}
	add_action( 'init', 'cptui_register_my_taxes_genero' );	



//TGM - para importar/instalar altomaticamente  o plugin advanced custom fields:

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';
