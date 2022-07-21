<?php
  	function cptui_register_my_cpts() {
		/**
		 * Post Type: Vídeos.
		 */
	
		$labels = [
			"name" => __( "Vídeos", "playmichel" ),
			"singular_name" => __( "vídeo", "playmichel" ),
		];
	
		$args = [
			"label" => __( "Vídeos", "playmichel" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"rest_namespace" => "wp/v2",
			"has_archive" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => true,
			"can_export" => false,
			"rewrite" => [ "slug" => "videos", "with_front" => true ],
			"query_var" => true,
			"menu_icon" => "dashicons-video-alt2",
			"supports" => [ "title", "editor", "thumbnail" ],
			"taxonomies" => [ "segmento" ],
			"show_in_graphql" => false,
		];
	
		register_post_type( "videos", $args );
	}
	
	add_action( 'init', 'cptui_register_my_cpts' );
?><?php 	function cptui_register_my_cpts_videos() {
	
		/**
		 * Post Type: Vídeos.
		 */
	
		$labels = [
			"name" => __( "Vídeos", "playmichel" ),
			"singular_name" => __( "vídeo", "playmichel" ),
		];
	
		$args = [
			"label" => __( "Vídeos", "playmichel" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"rest_namespace" => "wp/v2",
			"has_archive" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => true,
			"can_export" => false,
			"rewrite" => [ "slug" => "videos", "with_front" => true ],
			"query_var" => true,
			"menu_icon" => "dashicons-video-alt2",
			"supports" => [ "title", "editor", "thumbnail" ],
			"taxonomies" => [ "segmento" ],
			"show_in_graphql" => false,
		];
	
		register_post_type( "videos", $args );
	}
	
	add_action( 'init', 'cptui_register_my_cpts_videos' );
?><?php 	function cptui_register_my_taxes() {
	
		/**
		 * Taxonomy: Segmentos.
		 */
	
		$labels = [
			"name" => __( "Segmentos", "playmichel" ),
			"singular_name" => __( "Segmento", "playmichel" ),
		];
	
		
		$args = [
			"label" => __( "Segmentos", "playmichel" ),
			"labels" => $labels,
			"public" => true,
			"publicly_queryable" => true,
			"hierarchical" => true,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => [ 'slug' => 'segmento', 'with_front' => true, ],
			"show_admin_column" => true,
			"show_in_rest" => true,
			"show_tagcloud" => false,
			"rest_base" => "segmento",
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"rest_namespace" => "wp/v2",
			"show_in_quick_edit" => false,
			"sort" => false,
			"show_in_graphql" => false,
		];
		register_taxonomy( "segmento", [ "videos" ], $args );
	}
	add_action( 'init', 'cptui_register_my_taxes' );
?><?php 	function cptui_register_my_taxes_segmento() {
	
		/**
		 * Taxonomy: Segmentos.
		 */
	
		$labels = [
			"name" => __( "Segmentos", "playmichel" ),
			"singular_name" => __( "Segmento", "playmichel" ),
		];
	
		
		$args = [
			"label" => __( "Segmentos", "playmichel" ),
			"labels" => $labels,
			"public" => true,
			"publicly_queryable" => true,
			"hierarchical" => true,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => [ 'slug' => 'segmento', 'with_front' => true, ],
			"show_admin_column" => true,
			"show_in_rest" => true,
			"show_tagcloud" => false,
			"rest_base" => "segmento",
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"rest_namespace" => "wp/v2",
			"show_in_quick_edit" => false,
			"sort" => false,
			"show_in_graphql" => false,
		];
		register_taxonomy( "segmento", [ "videos" ], $args );
	}
	add_action( 'init', 'cptui_register_my_taxes_segmento' );
?>