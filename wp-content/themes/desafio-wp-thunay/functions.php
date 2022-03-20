<?php
	/*
		Arquivo de funções do site.
	*/

	//Adicionar styles.css ao tema.
	function adicionar_estilo_tema() {
		wp_enqueue_style ('adicionar_estilo_tema', get_stylesheet_uri ());
	}
	add_action ('wp_enqueue_scripts', 'adicionar_estilo_tema');

	//adicionar script.js no footer
	function adicionar_css_js_tema() {
	    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'adicionar_css_js_tema' );

	//Adicionar Suporte para Menus no tema 
	add_theme_support( 'menus' );

	//Adicionar suporte para taxonomias personalizadas
	add_action( 'init', 'add_custom_taxonomies', 0 );

	// Adicionar Advanced Custom Fields ao tema
	define( 'MY_ACF_PATH', get_stylesheet_directory() . '/assets/acf/' );
	define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/assets/acf/' );

	include_once( MY_ACF_PATH . 'acf.php' );

	add_filter('acf/settings/url', 'my_acf_settings_url');
	function my_acf_settings_url( $url ) {
		return MY_ACF_URL;
	}

	add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
	function my_acf_settings_show_admin( $show_admin ) {
		return false;
	}		

	// Criar os campos personalizados para o post personalizado Vídeo
	if( function_exists('acf_add_local_field_group') ):
		acf_add_local_field_group(array (
			'key' => 'videos',
			'title' => 'Vídeos',
			'fields' => array (
				array (
					'key' => 'imagem_capa',
					'label' => 'Imagem de Capa',
					'name' => 'imagem_capa',
					'type' => 'image',
					'return_format' => 'url',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'descricao',
					'label' => 'Descrição',
					'name' => 'descricao',
					'type' => 'wysiwyg',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'tempo_duracao',
					'label' => 'Tempo de Duração',
					'name' => 'tempo_duracao',
					'type' => 'range',
					'min' => '1',
					'max' => '999',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => 'm',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'sinopse',
					'label' => 'Sinopse',
					'name' => 'sinopse',
					'type' => 'wysiwyg',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => 'm',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'video',
					'label' => 'Link do Vídeo',
					'name' => 'video',
					'type' => 'oembed',
					'width' => '100%',
					'height' => '500',
					'prefix' => '',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => 'm',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
			'location' => array (
				array (
					array (
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
			'hide_on_screen' => array('[0]' => 'the_content'),
		));
	endif;

	//Criar post personalizado chamado Vídeo
	add_action( 'init', 'criar_custom_post_video' );
	function criar_custom_post_video() {
	    register_post_type( 'video',
	        array(
	            'labels' => array(
	                'name' => 'Vídeos',
	                'singular_name' => 'Vídeo',
	                'add_new' => 'Adicionar Novo',
	                'add_new_item' => 'Adicionar Novo Vídeo',
	                'edit' => 'Editar',
	                'edit_item' => 'Editar Vídeo',
	                'new_item' => 'Novo Vídeo',
	                'view' => 'Ver',
	                'view_item' => 'Ver Vídeo',
	                'search_items' => 'Pesquisar Vídeos',
	                'not_found' => 'Nenhum Vídeo encontrado',
	                'not_found_in_trash' => 'Nenhum Vídeo encontrado na Lixeira',
	                'parent' => 'Parent Vídeo'
	            ),
	 
	            'public' => true,
	            'menu_position' => 15,
	            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
	            'taxonomies' => array('category', 'post_tag'),
	            'menu_icon' => 'dashicons-video-alt3',
	            'has_archive' => true
	        )
	    );
	}

	//Criar taxonomia personalizada para os posts de Vídeo chamada tipo
	add_action( 'init', 'add_custom_taxonomies', 0 );
	function add_custom_taxonomies() {
	  register_taxonomy('tipo', 'video', array(
		    'hierarchical' => true,
		    'show_in_nav_menus' => true,
		    'labels' => array(
		      'name' => _x( 'Categoria dos Vídeos', 'taxonomy general name' ),
		      'singular_name' => _x( 'Categoria do Vídeo', 'taxonomy singular name' ),
		      'search_items' =>  __( 'Pesquisar Categoria dos Vídeos' ),
		      'all_items' => __( 'Todas as Categorias dos Vídeos' ),
		      'parent_item' => __( 'Parent Categoria do Vídeo' ),
		      'parent_item_colon' => __( 'Parent Categoria do Vídeo:' ),
		      'edit_item' => __( 'Editar Categoria do Vídeo' ),
		      'update_item' => __( 'Atualizar Categoria do Vídeo' ),
		      'add_new_item' => __( 'Adicionar Nova Categoria do Vídeo' ),
		      'new_item_name' => __( 'Novo Nome de Categoria do Vídeo' ),
		      'menu_name' => __( 'Categorias dos Vídeos' ),
		    ),
		    'rewrite' => array(
		      'slug' => 'tipo',
		      'with_front' => false, 
		      'hierarchical' => false
		    )
	  	));
	}    

	// Criar os termos Filmes, Documentários e Séries para as taxonomias personalizadas tipo
	add_action( 'init', 'create_filme_terms', 0 );
	function create_filme_terms(){
	   	wp_insert_term(
		  'Filmes', 
		  'tipo',
		  array(
		    'slug' => 'filmes',
		    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque sed felis eu commodo. Duis dapibus eu arcu varius ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin vel lorem malesuada, pellentesque purus eget, porttitor purus. Etiam eleifend facilisis lobortis. Curabitur erat lacus, ullamcorper ut magna a, maximus pellentesque dolor.',
		    'parent' => 0
		  )
		);
	}
	add_action( 'init', 'create_documentario_terms', 0 );
	function create_documentario_terms(){
	  	wp_insert_term(
		  'Documentários', // the term 
		  'tipo', // the taxonomy
		  array(
		    'slug' => 'documentarios',
		    'description' => 'In augue augue, sollicitudin nec laoreet non, gravida ac nulla. Vivamus at accumsan arcu. Donec finibus, enim quis pellentesque tincidunt, sapien metus interdum eros, sit amet tristique libero nulla sit amet nulla. Fusce egestas, libero sit amet lobortis mollis, ipsum est pellentesque nisi, non rutrum erat tortor ac mi. In nec felis erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum tristique gravida volutpat.',
		    'parent' => 0
		  )
		);
	}
	add_action( 'init', 'create_series_terms', 0 );
	function create_series_terms(){
	  	wp_insert_term(
		  'Séries', // the term 
		  'tipo', // the taxonomy
		  array(
		    'slug' => 'series',
		    'description' => 'Praesent et risus est. Nullam nec euismod arcu. Integer massa sem, iaculis sit amet ante et, fermentum sollicitudin est. Proin egestas felis arcu, eget egestas nisi accumsan non. Donec tincidunt et ipsum nec consectetur. Fusce dapibus, urna id cursus accumsan, lacus diam sagittis enim, in facilisis lorem purus in magna. Aenean sed augue commodo, auctor purus ac, varius purus. Etiam vel congue ligula, id porttitor dui. Aenean interdum mi ante, in volutpat quam laoreet quis. Donec aliquam convallis tempus.',
		    'parent' => 0
		  )
		);
	}

	//Ordernar os termos da taxonomia personalizada tipo por data de criação ascendente.(do mais novo para o mais velho).
	function wp_custom_sort_get_terms_args( $args, $taxonomies ) 
	{
	    $args['orderby'] = 'ID';
	    $args['order']   = 'ASC';
	 
	    return $args;
	}
	add_filter( 'get_terms_args', 'wp_custom_sort_get_terms_args', 10, 'tipo' );

	//Remover a aba de Tags e Categorias do painel administrativo
	function ft_remove_metaboxes() {
		remove_meta_box( 'categorydiv', 'video', 'normal' );
		remove_meta_box( 'tagsdiv-post_tag', 'video', 'normal' );
	}
	add_action( 'admin_menu', 'ft_remove_metaboxes' );

	add_action('init', 'myprefix_remove_tax');
	function myprefix_remove_tax() {
	    register_taxonomy('category', array());
	    register_taxonomy('post_tag', array());
	}

	// Função que verifica se existe algum post com o slug digitado(retorna true ou false)
	function post_exists_by_slug( $post_slug ) {
	    $args_posts = array(
	        'post_type'      => 'video',
	        'post_status'    => 'any',
	        'name'           => $post_slug,
	        'posts_per_page' => 1,
	    );
	    $loop_posts = new WP_Query( $args_posts );
	    if ( ! $loop_posts->have_posts() ) {
	        return false;
	    } else {
	        $loop_posts->the_post();
	        return $loop_posts->post->ID;
	    }
	}

	//Insere posts predefinidos no post personalizado Vídeo quando o usuário instala o tema.
	add_action('after_switch_theme', 'wpmix_publish_post');
	function wpmix_publish_post() {
		global $user_ID;

		// Post 1
		$slug = 'etiam-maximus-lorem';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Etiam maximus lorem',
			'post_content' => 'Lorem ipsum dolor sit amet',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Praesent et risus est. Nullam nec euismod arcu. Integer massa sem, iaculis sit amet ante et, fermentum sollicitudin est. Proin egestas felis arcu, eget egestas nisi accumsan non. Donec tincidunt et ipsum nec consectetur. Fusce dapibus, urna id cursus accumsan, lacus diam sagittis enim, in facilisis lorem purus in magna. Aenean sed augue commodo, auctor purus ac, varius purus. Etiam vel congue ligula, id porttitor dui. Aenean interdum mi ante, in volutpat quam laoreet quis. Donec aliquam convallis tempus.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Praesent et risus est. Nullam nec euismod arcu. Integer massa sem, iaculis sit amet ante et, fermentum sollicitudin est. Proin egestas felis arcu, eget egestas nisi accumsan non. Donec tincidunt et ipsum nec consectetur. Fusce dapibus, urna id cursus accumsan, lacus diam sagittis enim, in facilisis lorem purus in magna. Aenean sed augue commodo, auctor purus ac, varius purus. Etiam vel congue ligula, id porttitor dui. Aenean interdum mi ante, in volutpat quam laoreet quis. Donec aliquam convallis tempus.',
                'video' => 'https://www.youtube.com/watch?v=qZSf9Og3g78'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-karley-saagi-2062882.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 2
		$slug = 'duis-commodo-orci';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Duis commodo orci',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Imperdiet vulputate ac libero praesent suscipit ligula duis euismod, metus fringilla facilisis convallis luctus pretium mollis hendrerit euismod, lacinia habitant eu dapibus volutpat congue luctus.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Pharetra inceptos mattis vehicula scelerisque vivamus amet integer nulla tincidunt aenean himenaeos, vestibulum suscipit primis est elementum cubilia nunc id primis augue, sociosqu molestie potenti sem pretium nibh conubia commodo vivamus tincidunt.',
                'video' => 'https://www.youtube.com/watch?v=dRK7c3Je9ts'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-perchek-industrie-5451980.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 3
		$slug = 'duis-molestie-ligula-eget';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Duis molestie ligula eget',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Sed porta venenatis velit sit integer quam, sapien est duis risus inceptos aptent libero, ad malesuada nulla suspendisse quam.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Metus augue purus aliquam est cursus morbi blandit cursus nostra tempus lectus, cras purus ligula integer quisque habitant maecenas imperdiet nunc dui nec pretium, praesent sapien donec amet tincidunt est venenatis dictum diam cursus. nulla sem tristique porttitor cras vulputate gravida dapibus elit, est urna iaculis dolor rhoncus primis ipsum sit, elementum neque nec cras iaculis molestie eu.',
                'video' => 'https://www.youtube.com/watch?v=BNSeGVLnMUw'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-chris-peeters-12801.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 4
		$slug = 'aliquam-accumsan-nulla';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Aliquam accumsan nulla',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Mattis quisque at senectus commodo ad varius vel eleifend, odio urna eget a nisi justo id, taciti consequat amet lectus ligula aliquam lobortis.',
                'tempo_duracao'   => 121,
                'sinopse' => 'Luctus laoreet adipiscing donec lacinia ultrices class nunc, consectetur torquent et viverra sem ante euismod, etiam ut libero sagittis integer etiam. amet sodales malesuada in tellus velit consequat ultrices, etiam laoreet nam vivamus netus cras, donec nisl litora vitae feugiat ante. porttitor quis id vel risus dictum ligula ullamcorper adipiscing, vivamus cras elementum class morbi ultricies ipsum, pharetra at vivamus ut senectus diam commodo. ',
                'video' => 'https://www.youtube.com/watch?v=Ey-KrdUtCQY'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-francesco-ungaro-1525041.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 5
		$slug = 'in-mattis';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'In mattis',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Aptent mollis sit dictum class euismod convallis quam, tortor sollicitudin fermentum nisl dictumst taciti cursus lorem, litora nam congue at sit quam. curabitur amet facilisis elementum dapibus cubilia phasellus rutrum neque praesent pulvinar lectus morbi, habitant gravida ornare mauris quis in dapibus pharetra erat ut.',
                'tempo_duracao'   => 113,
                'sinopse' => 'Lacinia justo interdum platea nostra platea mollis, inceptos in pellentesque aptent ultrices posuere fermentum, risus integer netus lacus quam. facilisis metus vitae amet tortor aenean nullam donec massa lacus pellentesque ullamcorper, ultrices nisi interdum risus euismod arcu egestas ante quisque. metus condimentum ultricies vestibulum pretium lacinia himenaeos dui porta platea cubilia vehicula pulvinar tempus inceptos, per mattis accumsan himenaeos odio malesuada quisque sapien porta velit felis vitae.',
                'video' => 'https://www.youtube.com/watch?v=IbJRLeenTSQ'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-pixabay-2346.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 6
		$slug = 'aenean-convallis-tortor';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Aenean convallis tortor',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Nisl pretium mi sit torquent diam facilisis diam in elit litora risus nostra fames metus, lorem varius curae curabitur amet in velit imperdiet sodales tempor et aenean arcu.',
                'tempo_duracao'   => 134,
                'sinopse' => 'Mollis metus himenaeos fusce consequat consectetur quam rhoncus aptent, ultrices ac hendrerit elementum aliquet tortor cras, lacus et suspendisse posuere porta sodales accumsan. platea risus nullam arcu tempus nunc quisque sit diam in, viverra nisi elit platea vel diam nibh duis, nullam phasellus fusce conubia inceptos rutrum integer lacus.',
                'video' => 'https://www.youtube.com/watch?v=s71R46atvf4'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-pixabay-277253.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 7
		$slug = 'maecenas-tempus-mi-a-ex-malesuada';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Maecenas tempus mi a ex malesuada',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Ante praesent leo gravida semper pharetra vitae fusce, sapien justo aenean eleifend lectus turpis fusce nec, nullam consectetur quis arcu luctus blandit. sagittis facilisis enim sociosqu enim vehicula nostra sollicitudin, lectus elementum nullam in nisi fusce, imperdiet.',
                'tempo_duracao'   => 95,
                'sinopse' => 'Dictumst ut senectus vehicula ut eleifend himenaeos vestibulum congue, augue nam nisi dapibus arcu est lacinia ut, orci aenean aliquam proin elit turpis vehicula. molestie rhoncus ornare leo donec tristique vivamus dictumst, fringilla habitasse consequat et eget ultrices, dui placerat sociosqu vitae purus habitasse. potenti ipsum ad pretium augue netus phasellus pretium torquent mattis, ad praesent nam feugiat dapibus duis purus aliquam curabitur placerat, lacus praesent quam morbi platea ante ut justo. suspendisse justo.',
                'video' => 'https://www.youtube.com/watch?v=s71R46atvf4'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-dazzle-jam-1190208.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 8
		$slug = 'nunc-pellentesque-arcu-sed';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Nunc pellentesque arcu sed',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Ligula aptent nec taciti at primis semper dapibus viverra proin aliquet litora mi duis pulvinar, praesent elementum suscipit mauris sagittis commodo at cubilia nam vulputate tortor iaculis. in aliquam habitant mattis non quis integer vulputate rhoncus, suspendisse .',
                'tempo_duracao'   => 100,
                'sinopse' => 'lementum lorem est torquent integer mattis luctus egestas imperdiet hendrerit cras, hac enim dapibus torquent vehicula maecenas tortor gravida fringilla facilisis, et sagittis elit orci feugiat ut malesuada mollis ultrices. etiam sodales congue litora augue ad nisi amet, nisi fusce aenean conubia euismod sit, mollis inceptos duis maecenas donec sociosqu. in quam fames ornare himenaeos donec porttitor vehicula auctor pretium praesent aliquam tincidunt adipiscing volutpat, morbi posuere aliquet metus aliquam molestie imperdiet eget.',
                'video' => 'https://www.youtube.com/watch?v=p0zuRoa2BH4'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-ivy-son-3490257.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}

		// Post 9
		$slug = 'proin-sollicitudi';
		$category_id = get_term_by('name', 'filmes', 'tipo');
		$new_post = array(
			'post_title' => 'Proin sollicitudi',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Nulla primis dapibus rhoncus gravida placerat condimentum inceptos luctus viverra convallis arcu, facilisis lorem quam vivamus sodales vel semper mauris quisque dolor, dictumst curabitur sodales nulla dictumst mauris integer per netus mattis. fames sagittis.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Nisi taciti condimentum senectus taciti in ac congue dolor elementum pretium, dictum nullam eget a dui aliquam ut risus. aliquam quam sapien interdum congue aliquam senectus nunc, dui taciti aliquam congue sapien egestas consequat aenean, arcu in commodo varius at est. per consectetur faucibus potenti porta varius mollis, phasellus bibendum phasellus fusce hac eget potenti, adipiscing mollis suspendisse condimentum sagittis porta, ligula dui fames nam fringilla. posuere eros consequat etiam ut eu a semper sollicitudin quisque ad.',
                'video' => 'https://www.youtube.com/watch?v=OvioeS1ZZ7o'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-gabriel-hohol-3593922.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 10
		$slug = 'quisque-sollicitudin-sed';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Quisque sollicitudin sed',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Dui praesent elementum tempus cursus nullam quisque a imperdiet, sed amet nostra eleifend donec conubia hac quisque, elementum ultricies netus donec per vulputate lobortis. ullamcorper ad proin laoreet sagittis nec vel mollis donec integer amet suscipit.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Fermentum sapien conubia torquent aenean mauris et quisque amet at, consectetur posuere nisi conubia eget ipsum magna fringilla pharetra metus, massa est vulputate vel cubilia luctus aliquet sagittis. in quisque taciti phasellus at mollis rhoncus non, neque lacus nunc integer pulvinar diam nec facilisis, vivamus lacus malesuada sagittis conubia aliquam. himenaeos ultricies phasellus curabitur amet erat nisi faucibus fermentum orci lorem, lectus vestibulum porttitor tortor lacinia risus semper curabitur malesuada, dolor faucibus dapibus.',
                'video' => 'https://www.youtube.com/watch?v=zhaTkKdovgM'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-mati-mango-5533926.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		} 

		// Post 11
		$slug = 'phasellus-senectus-rhoncus';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Phasellus senectus rhoncus',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Litora ligula aptent dapibus interdum luctus netus lobortis condimentum mi nulla, proin gravida taciti eget semper nullam quisque sociosqu integer, tincidunt fusce posuere mauris ornare orci sed accumsan faucibus. elementum vitae facilisis pellentesque laoreet faucibus.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Justo himenaeos feugiat gravida sollicitudin cras dictum class posuere curae himenaeos imperdiet felis blandit, donec nulla tempor eros commodo nisi blandit nisl donec fames dui rhoncus. odio cursus consequat orci arcu nunc metus magna egestas et, libero class inceptos viverra tempor suscipit vulputate bibendum, venenatis quis dictum euismod urna rutrum luctus massa. eros tempor suscipit aenean suspendisse pretium quisque, magna gravida est himenaeos donec a, mauris pharetra bibendum maecenas dictum. eget arcu.',
                'video' => 'https://www.youtube.com/watch?v=76_J1jZLp5s'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-gabriel-pompeo-4338508.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		} 

		// Post 12
		$slug = 'augue-nisi-commodo';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Augue nisi commodo',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Ornare cras habitant neque aliquam dui sodales porttitor facilisis tellus, lectus est dolor bibendum per erat fringilla purus, sollicitudin eu magna at pretium elementum tincidunt taciti. ipsum nulla semper suspendisse nulla pellentesque porttitor blandit orci morbi, primis.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Quisque molestie eu aptent felis aliquam semper ut praesent et sapien quis aenean, eu libero netus purus donec aptent felis auctor cursus blandit. egestas purus sollicitudin sit mattis non sodales class sollicitudin, himenaeos eu eleifend vulputate ligula nam habitasse, ultrices iaculis potenti sociosqu ante mattis fames. quisque aliquet curae sit libero ullamcorper himenaeos sapien ultrices, vehicula feugiat erat lectus litora etiam elit cras, egestas dui velit platea nisi suscipit orci. in cursus vel gravida sit vulputate primis tristique.',
                'video' => 'https://www.youtube.com/watch?v=b-EaSASfMSI'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-jayson-marquez-4850421.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		} 
		// Post 13
		$slug = 'lacinia-aliquet-lacus';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Lacinia aliquet lacus',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Mi duis iaculis mattis lacus nisl augue quis tortor, luctus netus potenti iaculis dui quam malesuada, metus netus cursus enim purus vulputate felis. aliquam consectetur ante hendrerit duis aliquet quis elit dapibus sociosqu, maecenas quis volutpat scelerisque.',
                'tempo_duracao'   => 121,
                'sinopse' => 'lit eros phasellus fermentum enim at euismod ut risus, mauris amet adipiscing fringilla habitasse ligula donec sagittis ullamcorper, vitae eu gravida augue feugiat consectetur congue. ligula blandit fermentum quis praesent posuere quis sit maecenas, aliquam sagittis rutrum etiam lacinia sit malesuada integer, rutrum tellus vehicula tempus ad morbi quam. sollicitudin per ante tortor dictumst torquent posuere felis ut non aliquet, velit nulla semper curabitur ultrices cubilia nisi libero massa pulvinar, nullam aliquam faucibus bibendum.',
                'video' => 'https://www.youtube.com/watch?v=BCTF0TqIlZw'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-thiago-matos-4576085.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		} 
		// Post 14
		$slug = 'nunc-vitae-mollis';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Nunc vitae mollis',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Dapibus etiam rhoncus nullam platea etiam vestibulum hendrerit dictumst porta curabitur, quam amet porta facilisis purus taciti augue mauris cras, lacus cursus torquent imperdiet amet netus felis nulla sapien. proin curabitur quis auctor orci fermentum.',
                'tempo_duracao'   => 113,
                'sinopse' => 'Etiam viverra himenaeos nisl eros vel nulla sapien eget fermentum felis non amet platea suscipit, donec turpis nunc dictum porttitor convallis vivamus dictum consectetur torquent etiam primis. senectus neque rutrum viverra fusce nec tristique in, urna consequat condimentum dui vel cras nec, senectus imperdiet sociosqu platea tempus scelerisque. adipiscing velit ullamcorper quam vivamus cras aenean condimentum lacinia faucibus lacinia, imperdiet nisi porttitor inceptos lectus fusce pellentesque eu ullamcorper, primis.',
                'video' => 'https://www.youtube.com/watch?v=R_bwIgebcJ0'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-kehn-hermano-3849167.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		} 
		// Post 15
		$slug = 'molestie-lectus-mi';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Molestie lectus mi',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Phasellus ut sodales risus praesent posuere lobortis non donec purus class eu, maecenas consequat donec per aliquam lectus nulla felis porta sollicitudin. iaculis ac aliquet potenti erat at felis, sapien posuere ultricies amet suspendisse diam aptent, litora fames.',
                'tempo_duracao'   => 134,
                'sinopse' => 'A etiam lacus sollicitudin taciti egestas fusce cubilia dolor urna ornare amet odio euismod tortor senectus fames sed fusce, sociosqu phasellus tempus litora pharetra donec curae sollicitudin aliquam sapien posuere eros ante pulvinar quis bibendum turpis. placerat nisi primis aliquam nostra sagittis eros condimentum, tincidunt fames facilisis aenean cursus. duis orci imperdiet senectus conubia ornare libero posuere sollicitudin magna, consectetur aptent duis luctus ultrices pellentesque mollis dictumst, vestibulum donec nam.',
                'video' => 'https://www.youtube.com/watch?v=tkBzNEwIGms'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-cottonbro-4753879.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		} 
		// Post 16
		$slug = 'nullam-convallis-nullam';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Nullam convallis nullam',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Inceptos ac ante commodo nec dui scelerisque vivamus ac tristique quisque tristique vitae, nunc semper ad augue nam ultrices lacus luctus litora mauris. proin enim condimentum aliquam auctor curabitur lacinia justo iaculis ipsum sollicitudin suscipit ac.',
                'tempo_duracao'   => 134,
                'sinopse' => 'Metus suspendisse vestibulum egestas nullam vel volutpat auctor non vehicula vulputate, curabitur diam et accumsan quisque at magna donec quisque. id feugiat imperdiet risus maecenas fringilla conubia molestie mauris, lacus condimentum massa habitant nibh laoreet himenaeos posuere commodo, duis odio mattis congue dolor dapibus lobortis. interdum nullam tristique volutpat donec rutrum molestie duis, libero non sed tristique congue egestas duis, enim ligula tincidunt volutpat diam cras. faucibus quisque sit.',
                'video' => 'https://www.youtube.com/watch?v=uuiY28D3Ikk'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-rafael-paul-4797134.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 17
		$slug = 'duis-rutrum-taciti';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Duis rutrum taciti',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Quis tellus lorem aenean taciti aliquam, augue sem aliquam purus nisi eget, a elit lorem turpis. ultrices scelerisque curabitur iaculis ultrices proin vivamus semper ut, dictum ut conubia praesent consequat morbi aenean vel massa, vel a massa ac cras vestibulum.',
                'tempo_duracao'   => 95,
                'sinopse' => 'Sociosqu etiam quam interdum nibh ac senectus platea ipsum eu, rhoncus molestie quam duis ut nunc nulla hendrerit et, primis nulla suscipit lobortis vitae facilisis placerat rhoncus. at eros tellus sociosqu risus netus aliquam mi amet, inceptos mi nec in malesuada lectus id lobortis vitae, conubia etiam imperdiet habitant aptent nostra iaculis. pretium ipsum dolor etiam nulla eget etiam eros et himenaeos eleifend senectus class, ut ac imperdiet iaculis class nunc fusce nibh pulvinar proin scelerisque. hendrerit ligula et lobortis.',
                'video' => 'https://www.youtube.com/watch?v=pGk6G9tjFmA'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-jayson-marquez-4850412.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 18
		$slug = 'bibendum-lacus-hendrerit';
		$category_id = get_term_by('name', 'documentarios', 'tipo');
		$new_post = array(
			'post_title' => 'Bibendum lacus hendrerit',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Sociosqu erat dictum blandit mauris cubilia amet aenean fames egestas nisl platea venenatis, egestas suspendisse justo fermentum pretium et vitae malesuada justo a curabitur, aliquam leo dapibus blandit urna lorem nam gravida praesent gravida amet.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Adipiscing suspendisse ligula libero sollicitudin fames metus, mi venenatis suscipit turpis himenaeos duis, eu condimentum aliquam habitant nisi. aptent placerat molestie nostra torquent donec amet platea sociosqu, curabitur sed aenean interdum lobortis ut mollis eu eget, neque fringilla elit aenean massa quisque fusce. interdum praesent risus hac etiam potenti etiam porta conubia posuere quisque himenaeos dictumst, quam proin mollis nec ultrices amet sollicitudin nisi class augue phasellus vehicula dictumst, taciti a iaculis.',
                'video' => 'https://www.youtube.com/watch?v=VAMuj4EtlL0'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-andrea-piacquadio-3760259.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 19
		$slug = 'fermentum-luctus-etiam';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Fermentum luctus etiam',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Mollis nunc malesuada taciti enim luctus nostra mollis, sodales vehicula viverra ultricies ut posuere lorem, condimentum pharetra sociosqu vehicula cubilia ipsum. magna fermentum faucibus at duis nunc ante torquent inceptos, primis odio etiam habitant.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Libero felis in et convallis lacus ligula tempor elit accumsan felis, vel sagittis etiam quam quisque sociosqu sodales non urna, malesuada enim lorem felis amet class magna ultrices donec. ut non egestas at turpis ligula posuere curae pharetra iaculis in, et senectus interdum vestibulum ultricies quis ullamcorper purus. cubilia et dictum massa ipsum pellentesque vel arcu felis dapibus, senectus phasellus vel rhoncus curabitur gravida luctus enim, pretium curabitur fusce interdum turpis donec tortor fringilla. suspendisse aliquam vivamus.',
                'video' => 'https://www.youtube.com/watch?v=WrZ6fKelwOU'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-gabb-tapic-3568544.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 20
		$slug = 'hac-vulputate-blandit';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Hac vulputate blandit',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Pulvinar id erat fringilla hac senectus nullam tristique, venenatis per ligula luctus suscipit adipiscing urna platea, imperdiet vivamus neque quisque ipsum sagittis. per nisi massa ac cras malesuada dapibus aenean pretium porttitor ante velit, in cubilia duis.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Quisque dictumst condimentum ad velit malesuada etiam potenti tortor massa senectus class, aliquet at etiam vitae dictumst etiam gravida euismod quisque. nibh at neque fusce dictumst lorem sit enim lacus, diam mattis primis fusce luctus curabitur vitae posuere tristique, pretium auctor sagittis imperdiet aenean sapien quisque. torquent sem ut phasellus sit mattis lorem quis dolor pulvinar, curabitur consectetur diam sit rhoncus curabitur donec volutpat, venenatis inceptos ut non nec sollicitudin hac et. nisl feugiat eu.',
                'video' => 'https://www.youtube.com/watch?v=d9GAO4T0woA'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-jess-vide-5008377.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 21
		$slug = 'ante-fermentum-ultricies';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Ante fermentum ultricies',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Tristique fusce quis potenti sapien tincidunt donec convallis ut consectetur, euismod porttitor est pretium eleifend sagittis etiam eu lobortis, tortor potenti sapien eu est interdum sodales semper. sed fames tortor quam maecenas sagittis tincidunt sit.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Phasellus augue lacinia iaculis libero odio suspendisse, dui quis congue suspendisse ac nullam pulvinar, amet urna aenean tortor ad. et nibh ultrices facilisis et viverra arcu posuere duis, nostra feugiat viverra eu risus blandit phasellus, tristique egestas inceptos dapibus convallis elementum fermentum. pellentesque aenean iaculis bibendum etiam nam id, eleifend curae magna congue dolor primis proin, cubilia erat ante tempor senectus. at aliquam mollis ante euismod dui, mattis vehicula lorem volutpat sed faucibus, donec.',
                'video' => 'https://www.youtube.com/watch?v=J1f2VHIZ-CU'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-burak-k-1253049.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 22
		$slug = 'class-praesent-tincidunt';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Class praesent tincidunt',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Sem rhoncus euismod molestie bibendum pulvinar potenti iaculis enim tempus tincidunt, tristique in etiam curabitur auctor orci mattis vel sem ornare phasellus, amet fames quis dictumst nulla et fames inceptos fringilla. lobortis sodales blandit aenean.',
                'tempo_duracao'   => 121,
                'sinopse' => 'Sodales non sodales lacus congue dolor semper augue eget eleifend, commodo nulla per vitae platea pharetra egestas et, vivamus nec quis nostra lectus aliquam nisi feugiat. euismod interdum vivamus fusce nunc quis neque iaculis felis, duis faucibus gravida consectetur curabitur duis aenean pellentesque, ullamcorper interdum vehicula porta cras tortor eu, iaculis tincidunt viverra porttitor orci egestas accumsan. egestas fermentum aptent magna himenaeos viverra nec bibendum dolor blandit platea, varius mi hendrerit.',
                'video' => 'https://www.youtube.com/watch?v=7dzwzjc5JnI'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-ekaterina-belinskaya-4674351.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 23
		$slug = 'est-hac-ac-semper';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Est hac ac semper',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Proin habitasse congue dolor felis in rutrum lacinia, mattis per aliquam interdum nostra ligula ultricies, at netus consequat fusce iaculis litora. volutpat lacinia ut class fermentum hac quisque fermentum enim iaculis commodo metus lorem lacus, hendrerit aliquam taciti.',
                'tempo_duracao'   => 113,
                'sinopse' => 'Lacinia ullamcorper ultricies pretium ut rutrum nibh accumsan, ipsum velit convallis dictumst elit lacus, arcu tellus dapibus et egestas tincidunt. enim ornare ad ullamcorper tristique potenti pretium turpis congue, et aenean egestas accumsan egestas sit quisque neque, sociosqu senectus inceptos risus mattis imperdiet ultricies. risus condimentum conubia tristique quisque feugiat praesent felis ipsum arcu quam, sollicitudin eget aenean integer eleifend amet in metus mauris, dapibus a semper purus massa justo viverra lacinia.',
                'video' => 'https://www.youtube.com/watch?v=6IQDetyGw8w'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-paul-kerby-genil-3703961.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 24
		$slug = 'leo-litora-pharetra';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Leo litora pharetra',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Potenti arcu tortor nisi gravida nostra nec gravida lectus sodales aptent, neque mauris ipsum lacinia rhoncus augue arcu nisi eget litora, hac porttitor lectus nullam tortor tincidunt aenean magna a. taciti posuere nibh ullamcorper eleifend a conubia dui, quisque dolor.',
                'tempo_duracao'   => 134,
                'sinopse' => 'Diam curae aptent sollicitudin class quis per elit, maecenas eget elementum tristique eget venenatis, interdum himenaeos volutpat maecenas semper vestibulum. netus ultrices elit ullamcorper donec dictum nullam curae aliquam malesuada rutrum amet, sit dictum ut consequat dui iaculis dapibus etiam taciti sagittis, vestibulum placerat cursus platea adipiscing convallis ipsum quisque pretium lacinia. potenti fames dui faucibus ultrices netus ad purus, consequat conubia habitant cursus pharetra facilisis, gravida blandit vel ante.',
                'video' => 'https://www.youtube.com/watch?v=sOd5-2RskiU'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-joey-kyber-134643.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 25
		$slug = 'quisque-vitae-ut-ultricies';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Quisque vitae ut ultricies',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Curae aenean tortor feugiat dolor praesent fringilla curae ut, ullamcorper sem blandit commodo faucibus aenean massa, sapien libero massa etiam fermentum euismod erat. ut dictum aliquam mauris placerat enim bibendum lectus condimentum, ut rutrum blandit.',
                'tempo_duracao'   => 95,
                'sinopse' => 'Congue eleifend tellus potenti gravida suscipit eros varius potenti, est inceptos nec inceptos duis risus dictumst gravida, vivamus sit nullam habitasse suscipit senectus pellentesque. lectus tempus elit nisi senectus lorem enim nullam, pharetra pretium eget fusce hendrerit ac commodo fames, eu augue libero praesent tortor vivamus. praesent ullamcorper commodo arcu aliquam ut porttitor risus, phasellus est tortor tincidunt morbi ultrices diam, porta non suspendisse aenean malesuada felis. hendrerit viverra duis cubilia .',
                'video' => 'https://www.youtube.com/watch?v=Jh4QFaPmdss'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-zachary-debottis-2568539.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 26
		$slug = 'mattis-ut-est-tincidunt';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Mattis ut est tincidunt',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'In netus rutrum ut mi nunc nisi nec aenean per metus, nibh pulvinar massa sagittis aenean condimentum primis eget suspendisse, habitasse fermentum nibh curabitur potenti class lectus nostra porta. suscipit sit faucibus torquent suscipit massa nisi potenti quis nisi.',
                'tempo_duracao'   => 100,
                'sinopse' => 'Metus donec convallis vehicula sed nec senectus ullamcorper lorem laoreet, leo posuere convallis malesuada sapien quam lectus justo, curae varius porttitor habitasse enim taciti class habitant. dictumst curabitur accumsan aliquam enim placerat torquent odio tellus, viverra nulla proin dolor ante augue consequat molestie lectus, ac purus luctus lobortis interdum potenti libero. posuere porta sodales senectus porttitor risus porta integer proin aenean netus, nostra donec urna ultricies fermentum neque integer libero.',
                'video' => 'https://www.youtube.com/watch?v=RT0N9w8vfGA'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-anastasia-shuraeva-4513214.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
		// Post 27
		$slug = 'lectus-habitant-ante';
		$category_id = get_term_by('name', 'series', 'tipo');
		$new_post = array(
			'post_title' => 'Lectus habitant ante',
			'post_status' => 'publish',
			'post_author' => $user_ID,
			'post_type' => 'video',
            'meta_input'   => array(
                'descricao' => 'Felis gravida tempus porttitor molestie ultricies vel fames dolor, arcu aenean suscipit bibendum potenti erat semper, ornare euismod potenti quam mollis consectetur netus. habitasse suscipit ornare orci aenean nec aenean, porta fringilla integer porttitor fusce.',
                'tempo_duracao'   => 130,
                'sinopse' => 'Quam class interdum maecenas diam purus vulputate primis eleifend donec aptent conubia sit vulputate, nisi non molestie orci taciti rhoncus et malesuada velit erat neque convallis. purus eleifend sed vel risus eget cras conubia curabitur eros, lorem metus lacus dui suspendisse potenti sagittis cursus platea inceptos, urna eleifend facilisis rhoncus fusce et quis posuere. aliquam netus sollicitudin sodales inceptos praesent molestie purus nibh per, venenatis posuere neque nec nostra pharetra diam vivamus, odio risus enim porttitor.',
                'video' => 'https://www.youtube.com/watch?v=ttDhd724468'
            ),			
		);
		if( !post_exists_by_slug( $slug ) ) {
			$post_id = wp_insert_post($new_post);	

			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$url     = get_template_directory_uri().'/assets/img/pexels-steve-682375.jpg';
			$image = media_sideload_image( $url, $post_id, '', 'id' );

			update_post_meta( $post_id, 'imagem_capa', $image ); 
			wp_set_object_terms( $post_id, intval( $category_id->term_id ), 'tipo' );
		}
	}
?>