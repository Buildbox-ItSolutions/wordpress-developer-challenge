<?php

// Custom Post Type

function cptui_register_my_cpts() {

	/**
	 * Post Type: Vídeos.
	 */

	$labels = [
		"name" => __( "Vídeos", "custom-post-type-ui" ),
		"singular_name" => __( "Vídeo", "custom-post-type-ui" ),
		"menu_name" => __( "Vídeos", "custom-post-type-ui" ),
		"all_items" => __( "Todos os Vídeos", "custom-post-type-ui" ),
		"add_new" => __( "Adicionar novo", "custom-post-type-ui" ),
		"add_new_item" => __( "Adicionar novo Vídeo", "custom-post-type-ui" ),
		"edit_item" => __( "Editar Vídeo", "custom-post-type-ui" ),
		"new_item" => __( "Novo Vídeo", "custom-post-type-ui" ),
		"view_item" => __( "Ver Vídeo", "custom-post-type-ui" ),
		"view_items" => __( "Ver Vídeos", "custom-post-type-ui" ),
		"search_items" => __( "Pesquisar Vídeos", "custom-post-type-ui" ),
		"not_found" => __( "Nenhum Vídeos encontrado", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "Nenhum Vídeos encontrado na lixeira", "custom-post-type-ui" ),
		"parent" => __( "Vídeo ascendente:", "custom-post-type-ui" ),
		"featured_image" => __( "Imagem destacada para esse Vídeo", "custom-post-type-ui" ),
		"set_featured_image" => __( "Definir imagem destacada para esse Vídeo", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remover imagem destacada para esse Vídeo", "custom-post-type-ui" ),
		"use_featured_image" => __( "Usar como imagem destacada para esse Vídeo", "custom-post-type-ui" ),
		"archives" => __( "Arquivos de Vídeo", "custom-post-type-ui" ),
		"insert_into_item" => __( "Inserir no Vídeo", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Enviar para esse Vídeo", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filtrar lista de Vídeos", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Navegação na lista de Vídeos", "custom-post-type-ui" ),
		"items_list" => __( "Lista de Vídeos", "custom-post-type-ui" ),
		"attributes" => __( "Atributos de Vídeos", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Vídeo", "custom-post-type-ui" ),
		"item_published" => __( "Vídeo publicado", "custom-post-type-ui" ),
		"item_published_privately" => __( "Vídeo publicado de forma privada.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Vídeo revertido para rascunho.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Vídeo agendado", "custom-post-type-ui" ),
		"item_updated" => __( "Vídeo atualizado.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Vídeo ascendente:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Vídeos", "custom-post-type-ui" ),
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
		"hierarchical" => false,
		"rewrite" => [ "slug" => "video", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 10,
		"menu_icon" => "dashicons-format-video",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions" ],
		"show_in_graphql" => false,
	];

	register_post_type( "video", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

// Taxonomy

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Tipos.
	 */

	$labels = [
		"name" => __( "Tipos", "custom-post-type-ui" ),
		"singular_name" => __( "Tipo", "custom-post-type-ui" ),
		"menu_name" => __( "Tipos", "custom-post-type-ui" ),
		"all_items" => __( "Todos os Tipos", "custom-post-type-ui" ),
		"edit_item" => __( "Editar Tipo", "custom-post-type-ui" ),
		"view_item" => __( "Ver Tipo", "custom-post-type-ui" ),
		"update_item" => __( "Atualizar nome do Tipo", "custom-post-type-ui" ),
		"add_new_item" => __( "Adicionar novo Tipo", "custom-post-type-ui" ),
		"new_item_name" => __( "Novo Tipo", "custom-post-type-ui" ),
		"parent_item" => __( "Tipo ascendente", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Tipo ascendente:", "custom-post-type-ui" ),
		"search_items" => __( "Pesquisar Tipos", "custom-post-type-ui" ),
		"popular_items" => __( "Tipos mais populares", "custom-post-type-ui" ),
		"separate_items_with_commas" => __( "Separe Tipos com vírgulas", "custom-post-type-ui" ),
		"add_or_remove_items" => __( "Adicionar ou excluir Tipos", "custom-post-type-ui" ),
		"choose_from_most_used" => __( "Escolher entre os termos mais usados de Tipos", "custom-post-type-ui" ),
		"not_found" => __( "Nenhum Tipos encontrado", "custom-post-type-ui" ),
		"no_terms" => __( "Nenhum Tipos", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Navegação na lista de Tipos", "custom-post-type-ui" ),
		"items_list" => __( "Lista de Tipos", "custom-post-type-ui" ),
		"back_to_items" => __( "Voltar para Tipos", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Tipos", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tipo', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "tipo",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "tipo", [ "video" ], $args );

}
add_action( 'init', 'cptui_register_my_taxes' );