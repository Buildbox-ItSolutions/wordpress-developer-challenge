<?php
function videos() {
	$labels = array(
			'name'               => _x( 'Videos', 'post type general name'),
			'singular_name'      => _x( 'Videos', 'post type singular name'),
			'menu_name'          => _x( 'Videos', 'admin menu'),
			'name_admin_bar'     => _x( 'Videos', 'add new on admin bar'),
			'add_new'            => _x( 'Novo', 'Video'),
			'add_new_item'       => __( 'Adicionar novo video'),
			'new_item'           => __( 'Novo Video'),
			'edit_item'          => __( 'Editar Video'),
			'view_item'          => __( 'Ver Video'),
			'all_items'          => __( 'Todos os Videos'),
			'search_items'       => __( 'Pesquisar Videos'),
			'parent_item_colon'  => __( 'Parent Videos:'),
			'not_found'          => __( 'Não encontrado.'),
			'not_found_in_trash' => __( 'Nenhum arquivo na lixeira.')
		);

		$supports = array(
			'editor',
			//'author',
			'post-formats',
			'thumbnail',
			'title',
			//'excerpt',
		);

		$details = array(
			'labels' => $labels,
			'description' => 'Galeria de Videos',
			'public' => true,
			'menu_position' => 20,
			'supports' => $supports,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-portfolio',
			'register_meta_box_cb' => 'videos_meta_box'

		);
		register_post_type('videos', $details);
}
add_action ('init', 'videos');

//Taxonomies Category for the Videos
add_action( 'init', 'taxonomies_videos', 0 );

function taxonomies_videos() {
 $labels = array(
	'name'              => _x( 'Categorias', 'taxonomy general name' ),
	'singular_name'     => _x( 'Categoria', 'taxonomy singular name' ),
	'search_items'      => __( 'Pesquisar Categorias' ),
	'all_items'         => __( 'Todas as Categorias' ),
	'parent_item'       => __( 'Categoria Pai' ),
	'parent_item_colon' => __( 'Parent Category:' ),
	'edit_item'         => __( 'Editar Categoria' ),
	'update_item'       => __( 'Update Recipe Category' ),
	'add_new_item'      => __( 'Adicionar nova categoria' ),
	'new_item_name'     => __( 'Nova Categoria' ),
	'menu_name'         => __( 'Categorias' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);

	register_taxonomy( 'videos_cat', 'videos', $args );
}

// Metaboxes Videos
function videos_meta_box(){
	add_meta_box( 'campos_videos', __('Informações'), 'campos_videos', 'videos', 'normal', 'high' );
}

function campos_videos(){
	global $post;

		$videos_tempo = get_post_meta( $post->ID, 'videos_tempo', true );
		$videos_sinopse = get_post_meta( $post->ID, 'videos_sinopse', true );
		$videos_descricao = get_post_meta( $post->ID, 'videos_descricao', true );
	?>
	<div id="content-videos">
		<br>
		<label for="videos_sinopse">Sinopse: </label>
		<input type="text" name="videos_sinopse" id="videos_sinopse" cols="30" rows="10" value="<?php echo $videos_sinopse; ?>">
		<br>

		<br>
		<label for="videos_tempo">Duração: </label>
		<input type="text" name="videos_tempo" id="videos_tempo" value="<?php echo $videos_tempo; ?>">
		<br>

		<br>
		<label for="videos_descricao">Descricao: </label>
		<input type="text" name="videos_descricao" id="videos_descricao" value="<?php echo $videos_descricao; ?>">
		<br>
	</div>
	
<?php
}

function salvar_campos_videos(){
	global $post;
	update_post_meta( $post->ID, 'videos_tempo', $_POST['videos_tempo'] );
	update_post_meta( $post->ID, 'videos_sinopse', $_POST['videos_sinopse'] );
	update_post_meta( $post->ID, 'videos_descricao', $_POST['videos_descricao'] );
}
add_action( 'save_post' , 'salvar_campos_videos' );

?>