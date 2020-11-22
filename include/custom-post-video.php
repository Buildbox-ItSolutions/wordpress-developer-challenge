<?php

// Vídeo Custom Post Type 
function create_video_cpt() {
	$labels = array(
		'name' => _x( 'Vídeos', 'Post Type General Name'),
		'singular_name' => _x( 'Vídeo', 'Post Type Singular Name'),
		'menu_name' => _x( 'Vídeos', 'Admin Menu text'),
		'name_admin_bar' => _x( 'Vídeo', 'Add New on Toolbar'),
		'all_items' => __( 'Todos vídeos'),
		'add_new_item' => __( 'Adicionar novo vídeo'),
		'add_new' => __( 'Novo'),
		'new_item' => __( 'Novo vídeo'),
		'edit_item' => __( 'Editar vídeo'),
		'update_item' => __( 'Atualizar vídeo'),
		'view_item' => __( 'Ver vídeo'),
		'view_items' => __( 'Ver vídeos'),
		'search_items' => __( 'Procurar vídeo'),
		'not_found' => __( 'Não encontrado'),
		'not_found_in_trash' => __( 'Não encontrado na lixeira'),
		'featured_image' => __( 'Capa do vídeo'),
		'set_featured_image' => __( 'Definir capa do vídeo'),
		'remove_featured_image' => __( 'Remover capa do vídeo'),
		'use_featured_image' => __( 'Usar como capa do vídeo'),
	);
	$args = array(
		'label' => __( 'Vídeo'),
		'description' => __( 'Galeria de Vídeos'),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-video',
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'video', $args );
}
add_action( 'init', 'create_video_cpt', 0 );

// Vídeo Taxonomy 
function create_categoria_video() {
	$labels = array(
		'name'              => _x( 'Categorias', 'taxonomy general name'),
		'singular_name'     => _x( 'Categoria', 'taxonomy singular name'),
		'search_items'      => __( 'Procurar categorias'),
		'all_items'         => __( 'Todas categorias'),
		'edit_item'         => __( 'Editar categoria'),
		'update_item'       => __( 'Atualizar categoria'),
		'add_new_item'      => __( 'Adicionar categoria'),
		'new_item_name'     => __( 'Nova categoria'),
		'menu_name'         => __( 'Categoria dos vídeos'),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Categoria dos vídeos'),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
	);
	register_taxonomy( 'categoria-video', array('video'), $args );
}
add_action( 'init', 'create_categoria_video' );


// Vídeo Meta Box Class
class informacoesMetabox {
	private $screen = array('video');

	private $meta_fields = array(
		array(
			'label' => 'Tempo de Duração',
			'id' => 'video_duracao',
			'type' => 'text',
		),
		array(
			'label' => 'Embed do vídeo',
			'id' => 'video_embed',
			'type' => 'textarea',
		),
		array(
			'label' => 'Sinopse do vídeo',
			'id' => 'video_sinopse',
			'type' => 'textarea',
		),
	);

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}

	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'informacoes',
				__( 'Informações'),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'normal',
				'high'
			);
		}
	}

	public function meta_box_callback( $post ) {
		wp_nonce_field( 'informacoes_data', 'informacoes_nonce' );
		//echo 'Informações adicionais do vídeo';
		$this->field_generator( $post );
	}

	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				if ( isset( $meta_field['default'] ) ) {
					$meta_value = $meta_field['default'];
				}
			}
			switch ( $meta_field['type'] ) {
				case 'textarea':
					$input = sprintf(
						'<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>',
						$meta_field['id'],
						$meta_field['id'],
						$meta_value
					);
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}

	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['informacoes_nonce'] ) )
			return $post_id;
		$nonce = $_POST['informacoes_nonce'];
		if ( !wp_verify_nonce( $nonce, 'informacoes_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}

if (class_exists('informacoesMetabox')) {
	new informacoesMetabox;
};