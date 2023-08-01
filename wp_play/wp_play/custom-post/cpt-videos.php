<?php

if( ! class_exists( 'Custom_Post_Video' )){
class Custom_Post_Video{

public function __construct() {
	add_action( 'init', array( $this, 'create_post_type' ) );
	add_action( 'init', array( $this, 'create_taxonomy' ) );
	add_action('init', array($this,'create_categories'));
	add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
	add_action( 'wp_insert_post', array( $this, 'save_post' ), 10, 2 );
	add_filter('manage_posts_columns', array($this, 'custom_add_featured_image_column'));
    add_filter('manage_custom_post_type_posts_columns', array($this, 'custom_add_featured_image_column'));
	add_action('manage_posts_custom_column',array($this, 'custom_display_featured_image_column'), 10, 2);
	add_action('manage_custom_post_type_posts_custom_column', array($this,'custom_display_featured_image_column'), 10, 2);
	add_action('after_switch_theme', array($this,'insert_videos_posts_on_theme_activation'));
	add_action('after_setup_theme', array($this,'set_categories_after_theme_setup'));
	add_action('switch_theme', array($this,'delete_videos_posts_on_theme_uninstallation'));
	//add_filter('template_include',array($this, 'custom_template_for_category'));
}

//create post type
public function create_post_type(){
	register_post_type(
		'videos',
		array(
			'label' => esc_html__( 'video', 'wp_play' ),
			'description'   => esc_html__( 'videos', 'wp_play' ),
			'labels' => array(
				'name'  => esc_html__( 'Videos', 'wp_play' ),
				'singular_name' => esc_html__( 'video', 'wp_play' ),
			),
			'public'    => true,
			'supports'  => array( 'title', 'editor', 'thumbnail' ),
			'rewrite'   => array( 'slug' => 'videos' ),
			'hierarchical'  => true,
			'show_in_menu'  => true,
			'menu_position' => 1,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export'    => true,
			'has_archive'   => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_in_rest'  => true,
			'menu_icon' => 'dashicons-format-video',
			'taxonomies' => array('video_type',),
		)
	);
}

	public function create_taxonomy() {
		register_taxonomy(
			'video_type',
			'videos',
			array(
				'labels' => array(
					'name' => 'Video Types',
					'singular_name' => 'Video Type',
				),
				'hierarchical' => true,
				'show_in_rest' => true,
				'public' => true,
				'show_admin_column' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
			)
		);

    }

// Add default terms to the existing 'video_type' taxonomy

public function create_categories() {
    $taxonomy = 'video_type';
    $default_terms = array(
        'Filmes' => 'Movies category description.',
        'Documentários' => 'Documentaries category description.',
        'Séries' => 'Series category description.'
    );

    foreach ($default_terms as $term => $description) {
        if (!term_exists($term, $taxonomy)) {
            $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus dolor, finibus in facilisis quis, pulvinar nec nisi. In malesuada, risus eu lacinia hendrerit, neque neque mattis nunc, nec auctor eros lorem nec urna. Proin dapibus eleifend placerat. Proin vel porta nisl, nec maximus elit.';
            $args = array(
                'description' => $description
            );
            wp_insert_term($term, $taxonomy, $args);
        }
    }
}

	
//add meta-box
public function add_meta_boxes(){
	add_meta_box(
		'wp_play_meta_box',
		esc_html__( 'Registro de Videos', 'videos' ),
		array( $this, 'add_inner_meta_boxes' ),
		'videos',
		'normal',
		'high'
	);
}

//import custom fields
public function add_inner_meta_boxes(){
	require_once "metabox.php";
}

public function save_post( $post_id ) {

	// Check if the nonce is set and valid.
	if ( ! isset( $_POST['wp_play_nonce'] ) || ! wp_verify_nonce( $_POST['wp_play_nonce'], 'wp_play_nonce' ) ) {
		return;
	}

	// Check if the current user can edit the post.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Check if the post type is 'videos'.
	if ( 'videos' !== get_post_type( $post_id ) ) {
		return;
	}

	// Save fields
	if ( isset( $_POST['bx_play_video_duration'] ) ) {
        $duration = sanitize_text_field( $_POST['bx_play_video_duration'] );
        update_post_meta( $post_id, 'bx_play_video_duration', $duration );
    }

    if ( isset( $_POST['bx_play_video_ID'] ) ) {
        $embed = sanitize_text_field( $_POST['bx_play_video_ID'] );
        update_post_meta( $post_id, 'bx_play_video_ID', $embed );
    }
}


	// Add custom column to display featured image in admin columns
	public function custom_add_featured_image_column($columns) {
		$columns['featured_image'] = __('Featured Image', 'text-domain');
		return $columns;
	}
		
	// Display featured image in custom column
	public function custom_display_featured_image_column($column, $post_id) {
		if ($column === 'featured_image') {
			$thumbnail = get_the_post_thumbnail($post_id, array(50, 50));
			echo $thumbnail;
		}
	}

public function insert_videos_posts_on_theme_activation() {
	$thumbnails = array(
	 'pexels-anastasia-shuraeva-4513214.jpg',
	 'pexels-andrea-piacquadio-3760259.jpg',
	 'pexels-burak-k-1253049.jpg',
	 'pexels-chris-peeters-12801.jpg',
	 'pexels-cottonbro-4753879.jpg',
	 'pexels-dazzle-jam-1190208.jpg',
	 'pexels-ekaterina-belinskaya-4674351.jpg',
	 'pexels-francesco-ungaro-1525041.jpg',
	 'pexels-gabb-tapic-3568544.jpg',
	 'pexels-gabriel-hohol-3593922.jpg',
	 'pexels-gabriel-pompeo-4338508.jpg',
	 'pexels-ivy-son-3490257.jpg',
	 'pexels-jayson-marquez-4850412.jpg',
	 'pexels-jayson-marquez-4850421.jpg',
	 'pexels-jess-vide-5008377.jpg',
	 'pexels-joey-kyber-134643.jpg',
	 'pexels-karley-saagi-2062882.jpg',
	 'pexels-kehn-hermano-3849167.jpg',
	 'pexels-mati-mango-5533926.jpg',
	 'pexels-maxime-francis-2246476.jpg',
	 'pexels-paul-kerby-genil-3703961.jpg',
	 'pexels-perchek-industrie-5451980.jpg',
	 'pexels-pixabay-2346.jpg',
	 'pexels-pixabay-277253.jpg',
	 'pexels-rafael-paul-4797134.jpg',
	 'pexels-steve-682375.jpg',
	 'pexels-thiago-matos-4576085.jpg',
	 'pexels-zachary-debottis-2568539.jpg',
  );
  
  $titles = array(
	  'Lorem ipsum dolor sit amet',
	  'Consectetur adipiscing elit',
	  'Sed do eiusmod tempor incididunt',
	  'Ut labore et dolore magna aliqua',
	  'Ut enim ad minim veniam',
	  'Quis nostrud exercitation ullamco',
	  'Laboris nisi ut aliquip ex ea commodo',
	  'Duis aute irure dolor in reprehenderit',
	  'Voluptate velit esse cillum dolore',
	  'Eu fugiat nulla pariatur',
	  'Excepteur sint occaecat cupidatat non proident',
	  'Sunt in culpa qui officia deserunt mollit',
	  'Anim id est laborum',
	  'Lorem ipsum dolor sit amet',
	  'Quis nostrud exercitation ullamco',
	  'Consectetur adipiscing elit',
	  'Sed do eiusmod tempor incididunt',
	  'Ut labore et dolore magna aliqua',
	  'Ut enim ad minim veniam',
	  'Quis nostrud exercitation ullamco',
	  'Laboris nisi ut aliquip ex ea commodo',
	  'Duis aute irure dolor in reprehenderit',
	  'Voluptate velit esse cillum dolore',
	  'Eu fugiat nulla pariatur',
	  'Excepteur sint occaecat cupidatat non proident',
	  'Sunt in culpa qui officia deserunt mollit',
	  'Anim id est laborum',
	  'Lorem ipsum dolor sit amet',
	  
  );
  
  $paragraphs = array(
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
	  'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
	  'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
	  );
  
	  
	$post_type = 'videos';
	$custom_field_duration_key = 'bx_play_video_duration';
	$custom_field_id_key = 'bx_play_video_ID';
	$embed_video_ID = 'https://www.youtube.com/watch?v=nnf9tKwdYxs';
  
	// Check if the posts have already been added
	if (get_option('videos_posts_added')) {
	 return; 
  }
 
    for ($i = 0; $i < 28; $i++) {
	  $random_duration = rand(45, 120);
	  
  
	  // Set thumbnail
	  $thumbnail_path = get_template_directory() . '/assets/image/' . $thumbnails[$i];
  
	  // Check if the image exists
	  if (file_exists($thumbnail_path)) {
		  // Prepare the image filename for uploading
		  $thumbnail_filename = basename($thumbnail_path);
  
		  // Check if the image has already been uploaded to the media library
		  $attachment = get_page_by_title($thumbnail_filename, OBJECT, 'attachment');
  
		  // If not uploaded, then upload and get the ID
		  if (empty($attachment)) {
			  $upload_file = wp_upload_bits($thumbnail_filename, null, file_get_contents($thumbnail_path));
  
			  if (!$upload_file['error']) {
				  $wp_filetype = wp_check_filetype($thumbnail_filename, null);
				  $attachment_args = array(
					  'post_mime_type' => $wp_filetype['type'],
					  'post_title'     => sanitize_file_name($thumbnail_filename),
					  'post_content'   => '',
					  'post_status'    => 'inherit'
				  );
  
				  $attachment_id = wp_insert_attachment($attachment_args, $upload_file['file']);
				  require_once(ABSPATH . 'wp-admin/includes/image.php');
				  $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
				  wp_update_attachment_metadata($attachment_id, $attachment_data);
			  }
		  } else {
			  // Image already exists in the media library
			  $attachment_id = $attachment->ID;
		  }
  
		  $post_args = array(
			  'post_title'     => $titles[$i],
			  'post_content'   => $paragraphs[$i],
			  'post_type'      => $post_type,
			  'post_status'    => 'publish',
		  );
  
		  $post_id = wp_insert_post($post_args);
  
		  if ($post_id) {
			  update_post_meta($post_id, $custom_field_duration_key, $random_duration);
			  update_post_meta($post_id, $custom_field_id_key, $embed_video_ID);
  
			  // Set the thumbnail if available
			  if ($attachment_id) {
				  set_post_thumbnail($post_id, $attachment_id);
			  }
 		  }
	  	}
  	}
  update_option('videos_posts_added', true);
}

  public function set_categories_after_theme_setup(){
	$args = array(
		'post_type' => 'videos', 
		'posts_per_page' => -1, 
		'fields' => 'ids', 
	);
	
	$custom_posts_ids = get_posts($args);

	for($p = 0; $p<28; $p++){
	$post_id = $custom_posts_ids[$p];
	
	$categories = array('documentarios', 'filmes', 'series');
	$category_count = count($categories);
	$random_category = $categories[$p % $category_count];
	
	wp_set_object_terms($post_id, $random_category, 'video_type');
	}
}
  

	
	   
 public function delete_videos_posts_on_theme_uninstallation() {
	$post_type = 'videos';
	update_option('videos_posts_added', false);
	
	// Get all posts of the 'videos' post type
	$videos_posts = get_posts(array(
		'post_type' => $post_type,
		'numberposts' => -1,
		'post_status' => 'any', 
	));
  
	foreach ($videos_posts as $video_post) {
		wp_delete_post($video_post->ID, true); 
	}
  
  } 
}
}

new Custom_Post_Video;