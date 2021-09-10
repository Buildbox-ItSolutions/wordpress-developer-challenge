<?php 

//Custom Image Size
function my_custom_images(){
    add_image_size( 'large', 1400, 380, true );
    add_image_size( 'medium', 768, 380, true );

}
add_action('after_setup_theme','my_custom_images');



// Taxonomy: Categorias.
function cptui_register_my_taxes_categorias() {
	$labels = [
		"name" => __( "Categorias", "custom-post-type-ui" ),
		"singular_name" => __( "categoria", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Categorias", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'categorias', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "categorias",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "categorias", [ "videos" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_categorias' );

//ACF
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_61357b45d2dfd',
        'title' => 'Detalhes do Vídeo',
        'fields' => array(
            array(
                'key' => 'field_61357b5f6e6bc',
                'label' => 'Thumbnail',
                'name' => 'thumbnail',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_6139378f8d388',
                'label' => 'Duração',
                'name' => 'duracao',
                'type' => 'number',
                'instructions' => 'Duração do filme em minutos',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 180,
                'placeholder' => '',
                'prepend' => '',
                'append' => 'minutos',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_61357c40203ef',
                'label' => 'Vídeo',
                'name' => 'video',
                'type' => 'oembed',
                'instructions' => 'Copie e cole o URL do vídeo',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'width' => 1280,
                'height' => 720,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'meus_filmes',
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

//Custom Post Type: Meus Filmes
function cptui_register_my_cpts_meus_filmes() {

	$labels = [
		"name" => __( "Meus Filmes", "custom-post-type-ui" ),
		"singular_name" => __( "Meu Filme", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Meus Filmes", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "meus_filmes", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-video-alt2",
		"supports" => [ "title", "editor" ],
		"taxonomies" => [ "categorias" ],
		"show_in_graphql" => false,
	];

	register_post_type( "meus_filmes", $args );
}

add_action( 'init', 'cptui_register_my_cpts_meus_filmes' );




?>