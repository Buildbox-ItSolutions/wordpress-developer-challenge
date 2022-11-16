<?php

//create Custom Post Types "Videos"

add_action( 'init', 'custom_post_video', 0 );

function custom_post_video() {

	$labels = array(
		'singular_name'         => _x( 'Video', 'Video', 'play_theme' ),
		'name'                  => _x( 'Videos', 'Video', 'play_theme' ),
		'menu_name'             => __( 'Videos', 'play_theme' ),
		'name_admin_bar'        => __( 'Video', 'play_theme' ),
		'archives'              => __( 'Item Archives', 'play_theme' ),
		'attributes'            => __( 'Video Attributes', 'play_theme' ),
		'parent_item_colon'     => __( 'Parent Item:', 'play_theme' ),
		'all_items'             => __( 'All Videos', 'play_theme' ),
		'add_new_item'          => __( 'Add New Item', 'play_theme'),
		'add_new'               => __( 'Add New', 'play_theme' ),
		'new_item'              => __( 'New Video', 'play_theme' ),
		'edit_item'             => __( 'Edit Video', 'play_theme' ),
		'update_item'           => __( 'Update Video', 'play_theme' ),
		'view_item'             => __( 'View Video', 'play_theme' ),
		'view_items'            => __( 'View Videos', 'play_theme' ),
		'search_items'          => __( 'Search Video', 'play_theme' ),
		'not_found'             => __( 'Not found', 'play_theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'play_theme'),
		'featured_image'        => __( 'Featured Image', 'play_theme' ),
		'set_featured_image'    => __( 'Set featured image', 'play_theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'play_theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'play_theme' ),
		'insert_into_item'      => __( 'Insert into item','play_theme'),
		'uploaded_to_this_item' => __( 'Uploaded to this video', 'play_theme' ),
		'items_list'            => __( 'Videos list', 'play_theme' ),
		'items_list_navigation' => __( 'Videos list navigation', 'play_theme' ),
		'filter_items_list'     => __( 'Filter items list', 'play_theme' ),
	);
	$args = array(
		'label'                 => __( 'videos', 'play_theme' ),
		'description'           => __( 'videos', 'play_theme' ),
		'labels'                => $labels,
		'supports'              => array ('title','thumbnail','custom-fields'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 1,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'          	=> 'dashicons-format-video',

	);
	register_post_type('videos', $args );

}


// add customfields 

function playtheme_add_custom_box() {
	$screens = [ 'post', 'videos' ];{
		add_meta_box(
			'playtheme_box_',                 // Unique ID
			'Cadastro de Vídeos',      // Box title
			'playtheme_custom_box_html',  // Content callback, must be of type callable
			$screens                            // Post type
		);
	}
}
add_action( 'add_meta_boxes', 'playtheme_add_custom_box' );

function playtheme_custom_box_html ( $post ) 
{
		$vlenght = get_post_meta( $post->ID, 'playtheme_video_lenght', true );
		$vsinopse = get_post_meta( $post->ID, 'playtheme_video_sinopse', true );
		$vembed = get_post_meta( $post->ID, 'playtheme_video_embed', true );
		$vdescription = get_post_meta( $post->ID, 'playtheme_video_description', true );
		$vcover = get_post_meta( $post->ID, 'playtheme_upload_file', true );
		$vcoverlink = get_post_meta( $post->ID, 'playtheme_video_cover', true );

	?>
        <div class="custom-fields">
        <input type="hidden" name="playtheme_nonce" 
		value="<?php echo wp_create_nonce( "playtheme_nonce" ); ?>"/>
				
        <label for="playtheme_video_embed">Código Embed</label>
        <input class="small_input" type="oembed" name="playtheme_video_embed" id="playtheme_video_embed" 
                value="<?php echo ( isset( $vembed ) ) ? esc_html( $vembed) : ''; ?>">
	 
        <label for="playtheme_video_lenght">Duração do Vídeo</label>
		<input class="small_input" type= "textarea" name="playtheme_video_lenght" id="playtheme_video_lenght" 
                value="<?php echo ( isset( $vlenght ) ) ? esc_html( $vlenght ) : ''; ?>">
		    
        <label for="playtheme_video_description">Descrição</label>
		<input class="input_all" type="textarea"  name="playtheme_video_description" id="playtheme_video_description" 
                value="<?php echo ( isset( $vdescription ) ) ? esc_html( $vdescription ) : ''; ?>">
		  
        <label for="playtheme_video_sinopse">Sinopse</label>
        <input class="input_all" type="textarea" name="playtheme_video_sinopse"  id="playtheme_video_sinopse" 
                value="<?php echo ( isset( $vsinopse ) ) ? esc_html( $vsinopse ) : ''; ?>" >

				
		<label for="playtheme_upload_file">Carregar Imagem de Capa</label>
		<p> Clique no botão para fazer o upload de um documento. 
			Após o término do upload, clique em <em>Inserir no post</em>.</p>
		<input id="playtheme_upload_file" type="text" size="150" name="playtheme_upload_file" style="width: 85%;" class="input-video"
		value= "<?php if( ! empty( $vcover ) ) echo $vcover; ?>" >
		<input id="upload_file_button" type="button" class="button-upload" value="Fazer upload" >

						
									<?php }
									//Replicate Wordpress Uploader
									add_action( 'admin_head', 'playtheme_meta_uploader_script' );
									function playtheme_meta_uploader_script() { ?>
										<script type="text/javascript">
											jQuery(document).ready(function() {
											
												var formfield;
												var header_clicked = false;
											
												jQuery( '#upload_file_button' ).click( function() {
													formfield = jQuery( '#playtheme_upload_file' ).attr( 'name' );
													tb_show( '', 'media-upload.php?TB_iframe=true' );
													header_clicked = true;
												
													return false;		});
												
												window.original_send_to_editor = window.send_to_editor;
												
													window.send_to_editor = function( html ) {
													if ( header_clicked ) {
														fileurl = jQuery( html ).attr( 'href' );
														jQuery( '#playtheme_upload_file' ).val( fileurl );
														header_clicked = false;
														tb_remove();
													}
													else
													{
												  		window.original_send_to_editor( html );
												  	}
												}
											});
									  </script>
									<?php 
	
}


//save fields
function playtheme_save_postdata( $post_id ) {

	if( isset( $_POST['playtheme_nonce'] ) ){
		if( ! wp_verify_nonce( $_POST['playtheme_nonce'], 'playtheme_nonce' ) ){
			return;
		}
	}

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	if( isset( $_POST['post_type'] ) && $_POST['post_type'] === 'videos' ){
		if( ! current_user_can( 'edit_page', $post_id ) ){
			return;
		}elseif( ! current_user_can( 'edit_post', $post_id ) ){
			return;
		}
	}

	if ( array_key_exists( 'playtheme_video_embed', $_POST ) ) {
		update_post_meta(
			$post_id,
			'playtheme_video_embed',
			$_POST['playtheme_video_embed']
		);
	}

	if ( array_key_exists( 'playtheme_video_lenght', $_POST ) ) {
		update_post_meta(
			$post_id,
			'playtheme_video_lenght',
			$_POST['playtheme_video_lenght']
		);
	}

	if ( array_key_exists( 'playtheme_video_sinopse', $_POST ) ) {
		update_post_meta(
			$post_id,
			'playtheme_video_sinopse',
			$_POST['playtheme_video_sinopse']
		);
	}

	if ( array_key_exists( 'playtheme_video_description', $_POST ) ) {
		update_post_meta(
			$post_id,
			'playtheme_video_description',
			$_POST['playtheme_video_description']
		);

		
}
}
add_action( 'save_post', 'playtheme_save_postdata' );

//save cover image

add_action( 'save_post', 'playtheme_meta_uploader_save' );

function playtheme_meta_uploader_save( $post_id ) {

	if ( ! current_user_can( 'edit_post', $post_id ) ) return $post_id;
	$arquivo = $_POST['playtheme_upload_file'];
	add_post_meta( $post_id, 'playtheme_upload_file', $arquivo, true ) or update_post_meta( $post_id, 'playtheme_upload_file', $arquivo );

	return $post_id;
	if ( array_key_exists( 'playtheme_upload_file', $_POST ) ) {
		update_post_meta(
			$post_id,
			'playtheme_upload_file',
			$_POST['playtheme_upload_file']
		);
}

}