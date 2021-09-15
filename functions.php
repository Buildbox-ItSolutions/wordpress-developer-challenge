<?php 

/**
 * Register Custom Navigation Walker
 */


function theme_prefix_setup() {
	
    register_nav_menus(
        array(
        'primary-menu' => __( 'Primary Menu' ),
        'secondary-menu' => __( 'Secondary Menu' )
        )
    );    

	add_theme_support( 'custom-logo', array(
		'height'      => 33,
		'width'       => 104,
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

function theme_prefix_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );

wp_enqueue_style( 'slider', get_template_directory_uri() . '/assets/css/style.css',false,'1.1','all');



/* auto select menus */


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class($classes, $item) {
    global $naventries;
    $naventries[$item->ID] = $item;
    if($item->type == 'taxonomy') {
        global $post;
        $terms = get_the_terms($post->ID, $item->object);

        $currentTerms = array();
        if ( $terms && ! is_wp_error( $terms ) ) {
            foreach($terms as $term) {
                $currentTerms[] = $term->slug;
            }
        }

        if(is_array($currentTerms) && count($currentTerms) > 0) {
            $currentTerm = get_term($item->object_id, $item->object);
            if(in_array($currentTerm->slug, $currentTerms)) {
                $classes[] = 'current-menu-item';
            }
        }
    } 

     return $classes;
}




/**
 * REGISTERING CTP AND TAX
*/


if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_613ee869388f7',
        'title' => 'Videos',
        'fields' => array(
            array(
                'key' => 'field_613ee9821574d',
                'label' => 'Descrição',
                'name' => 'descricao',
                'type' => 'textarea',
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
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_613ee8704b6d8',
                'label' => 'Tempo de Duração',
                'name' => 'tempo_de_duracao',
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
                'key' => 'field_613ee8984b6d9',
                'label' => 'Sinopse',
                'name' => 'sinopse',
                'type' => 'textarea',
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
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_613ee8a74b6da',
                'label' => 'Embed de Vídeo',
                'name' => 'embed_de_video',
                'type' => 'oembed',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'width' => '',
                'height' => '',
            ),
            array(
                'key' => 'field_613ee91b4b6db',
                'label' => 'Imagem de Capa',
                'name' => 'imagem_de_capa',
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
                'preview_size' => 'full',
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
                'key' => 'field_613efe1e6b2a4',
                'label' => 'video_category',
                'name' => 'video_category',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'tipo_de_video',
                'field_type' => 'select',
                'allow_null' => 0,
                'add_term' => 1,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'multiple' => 0,
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
        'hide_on_screen' => array(
            0 => 'featured_image',
        ),
        'active' => true,
        'description' => '',
    ));
    
    endif;		



function cptui_register_my_cpts_video() {

    /**
     * Post Type: videos.
     */
    
    $labels = [
        "name" => __( "videos", "Desafio WP" ),
        "singular_name" => __( "video", "Desafio WP" ),
        "menu_name" => __( "Vídeo", "Desafio WP" ),
        "all_items" => __( "Todos Vídeos", "Desafio WP" ),
    ];
    
    $args = [
        "label" => __( "videos", "Desafio WP" ),
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
        "rewrite" => [ "slug" => "video", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
        "show_in_graphql" => false,
    ];
    
    register_post_type( "video", $args );
    }
    
    add_action( 'init', 'cptui_register_my_cpts_video' );
    
    
    function cptui_register_my_taxes() {
    
        /**
         * Taxonomy: Tipos de video.
         */
    
        $labels = [
            "name" => __( "Tipos de video", "Desafio WP" ),
            "singular_name" => __( "Tipo de Video", "Desafio WP" ),
        ];
    
        
        $args = [
            "label" => __( "Tipos de video", "Desafio WP" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tipo_de_video', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "tipo_de_video",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => true,
            "show_in_graphql" => false,
            'meta_box_cb' => 'post_categories_meta_box',
        ];
        register_taxonomy( "tipo_de_video", [ "video" ], $args );
    }
    add_action( 'init', 'cptui_register_my_taxes' );
    
    
    function cptui_register_my_taxes_tipo_de_video() {
    
        /**
         * Taxonomy: Tipos de video.
         */
    
        $labels = [
            "name" => __( "Tipos de video", "Desafio WP" ),
            "singular_name" => __( "Tipo de Video", "Desafio WP" ),
        ];
    
        
        $args = [
            "label" => __( "Tipos de video", "Desafio WP" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tipo_de_video', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "tipo_de_video",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => true,
            "show_in_graphql" => false,
            'meta_box_cb' => 'post_categories_meta_box',
        ];
        register_taxonomy( "tipo_de_video", [ "video" ], $args );
    }
    add_action( 'init', 'cptui_register_my_taxes_tipo_de_video' );


?>

