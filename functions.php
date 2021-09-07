<?php
/**
 * Tamanho padrão conteúdo.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
** Classes do tema.
** ============================================================ */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/core/classes/class-acf-required.php';


/**
** Setup do tema.
** ============================================================ */
if ( ! function_exists( 'play_setup_features' ) ) {
	function play_setup_features() {

		/**
		** Suporte para multiplos idiomas.
		** ============================================================ */
		load_theme_textdomain( 'play', get_template_directory() . '/languages' );

		/**
		** Registrando menu principal.
		** ============================================================ */
		register_nav_menus(
			array(
				'main-menu' => __( 'Menu principal', 'play' )
			)
		);

		/*
		** Suporte aos post_thumbnails.
		** ============================================================ */
		add_theme_support( 'post-thumbnails' );

		/**
		** Header customizado.
		** ============================================================ */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);
		add_theme_support( 'custom-header', $default );

		/**
		** Background customizado.
		** ============================================================ */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		/**
		** Customização do Editor Style.
		** ============================================================ */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		** Switch default core markup for search form, comment form, and comments to output valid HTML5.
		** ============================================================ */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		** Título do documento gerenciado pelo WP
		** ============================================================ */
		add_theme_support( 'title-tag' );

		/*
		** Registrando logo customizado.
		** ============================================================ */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
	}
}
add_action( 'after_setup_theme', 'play_setup_features' );

/**
** Regras de reescrita para novos CPTs e taxonomias .
** ============================================================ */
function play_flush_rewrite() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'play_flush_rewrite' );

/**
** Carregando scripts do site.
** ============================================================ */
function play_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Play main stylesheet.
	wp_enqueue_style( 'play-style', get_stylesheet_uri(), array(), null, 'all' );
	
	// General Styles.
	if (is_front_page()) {
		wp_enqueue_style( 'play-single', $template_url . '/assets/css/style-front-min.css', array(), null, 'all' );
		wp_enqueue_style( 'owl-carousel', $template_url . '/assets/css/owl.carousel.min.css' );
		wp_enqueue_style( 'owl-carousel-theme', $template_url . '/assets/css/owl.theme.default.min.css' );
	} else if (is_singular('video')){
		wp_enqueue_style( 'play-single', $template_url . '/assets/css/style-single-min.css', array(), null, 'all' );
	} else if (is_tax('categoria')||is_post_type_archive()||is_search()){
		wp_enqueue_style( 'play-archive', $template_url . '/assets/css/style-archive-min.css', array(), null, 'all' );
	}

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Html5Shiv
	wp_enqueue_script( 'html5shiv', $template_url . '/assets/js/html5.js' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// General scripts.
	if ( defined( 'WP_LOCAL_DEV' ) && WP_LOCAL_DEV ) {
		if (is_front_page()) {
			wp_enqueue_script( 'owl-carousel', $template_url . '/assets/js/owl.carousel.min.js#defer', array('jquery'), false, true );
			wp_enqueue_script( 'play-carousel', $template_url . '/assets/js/play-carousel.js#defer', array('jquery'), null, true );
		} else if (is_singular('video')){
			wp_enqueue_script( 'play-single', $template_url . '/assets/js/play-single.js#defer', array(), null, true );
		}
		wp_enqueue_script( 'play-main', $template_url . '/assets/js/main.js#defer', array(), null, true );
	} else {
		if (is_front_page()) {
			wp_enqueue_script( 'owlcarousel', $template_url . '/assets/js/owl.carousel.min.js#defer', array('jquery'), false, true );
			wp_enqueue_script( 'play-carousel', $template_url . '/assets/js/play-carousel-min.js#defer', array('jquery'), null, true );
		} else if (is_singular('video')){
			wp_enqueue_script( 'play-single', $template_url . '/assets/js/play-single-min.js#defer', array(), null, true );
		}
		wp_enqueue_script( 'play-main', $template_url . '/assets/js/main.min.js#defer', array(), null, true );
	}

}
add_action( 'wp_enqueue_scripts', 'play_enqueue_scripts', 1 );


/**
** Async para scripts marcados.
** ============================================================ */
function add_defer_forscript($url)
{
    if (strpos($url, '#defer')===false)
        return $url;
    else if (is_admin())
        return str_replace('#defer', '', $url);
    else
        return str_replace('#defer', '', $url)."' defer='defer";
}
add_filter('clean_url', 'add_defer_forscript', 11, 1);


/**
** Nova url do estilo do tema.
** ============================================================ */
function play_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style-min.css';
}
add_filter( 'stylesheet_uri', 'play_stylesheet_uri', 10, 2 );


/**
** Core Helpers.
** ============================================================ */
require_once get_template_directory() . '/core/helpers.php';

/**
** Admin customizado.
** ============================================================ */
require_once get_template_directory() . '/inc/admin.php';

/**
** Otimizar funções WP.
** ============================================================ */
require_once get_template_directory() . '/inc/optimize.php';

/**
** Modelo de tags customizado.
** ============================================================ */
require_once get_template_directory() . '/inc/template-tags.php';


/**
** CPT Vídeos
** ============================================================ */
function play_video_cpt() {
    $video = new Play_Post_Type(
        'Vídeo',
        'video'
    );

    $video->set_labels(
        array(
            'menu_name' => __( 'Meus Videos', 'play' )
        )
    );

    $video->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon' => 'dashicons-controls-play',
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true
        )
    );
}
function play_video_taxonomy() {
    $video = new Play_Taxonomy(
        'Categoria',
        'categoria',
        'video'
    );

    $video->set_labels(
        array(
            'menu_name' => __( 'Tipos de vídeo', 'play' )
        )
    );

    $video->set_arguments(
        array(
            'hierarchical' => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest' 		=> true
        )
    );
}
add_action( 'init', 'play_video_cpt', 1 );
add_action( 'init', 'play_video_taxonomy', 1 );


/**
** Campos personalizados para vídeos (ACF)
** ============================================================ */
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_61350025b279e',
	'title' => 'Configurações de vídeos',
	'fields' => array(
		array(
			'key' => 'field_6135003c8c9d4',
			'label' => 'Tempo de duração',
			'name' => 'duracao',
			'type' => 'number',
			'instructions' => 'Em minutos',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array(
			'key' => 'field_6135024b8c9d5',
			'label' => 'Sinopse',
			'name' => 'sinopse',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'delay' => 0,
		),
		array(
			'key' => 'field_6135026a8c9d6',
			'label' => 'ID do vídeo',
			'name' => 'id',
			'type' => 'text',
			'instructions' => 'Informe apenas o ID do vídeo que se encontra ao final da URL.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => 'https://www.youtube.com/watch?v=',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_61360002eb1b1',
			'label' => 'Imagem Grande',
			'name' => 'bg_video',
			'type' => 'image',
			'instructions' => 'Imagem para thumb de vídeo e fundo de destaque',
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
		0 => 'the_content',
		1 => 'excerpt',
		2 => 'discussion',
		3 => 'comments',
		4 => 'send-trackbacks',
	),
	'active' => true,
	'description' => '',
));

endif;		


/*
** Habilitar upload SVG
** ============================================================ */
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }
  $filetype = wp_check_filetype( $filename, $mimes );
  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];
}, 10, 4 );
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );


/*
** ACF - função para validar se tem dados nos campos
** ============================================================ */
function campo($campo, $options = 'options') {
	$retorno = get_field($campo, $options);
	if(empty($retorno)) {
		return false;
	}
	return $retorno;
}

/*
** Categorias padrões
** ============================================================ */
add_action( 'after_switch_theme', 'play_categoria' );
function play_categoria(){ 
    $playCategorias = 'categoria';

    $categorias = [
        "filmes" => "Filmes",
        "documentarios" => "Documentários",
        "series" => "Séries",
    ];
    foreach ($categorias as $slug => $name) {
        wp_insert_term($name, $playCategorias, [
            'slug' => $slug,
        ]);
    }
}