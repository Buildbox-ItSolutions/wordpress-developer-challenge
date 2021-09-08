<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Título do site
function wpdocs_theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }
     
    global $page, $paged;
 
    $title .= get_bloginfo( 'name', 'display' );

    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }
    return $title;
}
add_filter( 'wp_title', 'wpdocs_theme_name_wp_title', 10, 2 );

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_61368c42005a8',
		'title' => 'Videos',
		'fields' => array(
			array(
				'key' => 'field_61368c487fafd',
				'label' => 'Descrição',
				'name' => 'descricao',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '100',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => 'wpautop',
			),
			array(
				'key' => 'field_61368c657fafe',
				'label' => 'Imagem de capa',
				'name' => 'imagem_de_capa',
				'type' => 'image',
				'instructions' => 'Tamanho mínimo 1024 x 560. (JPG ou JPEG)',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'large',
				'library' => 'all',
				'min_width' => 1024,
				'min_height' => 560,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => 'jpg, jpeg',
			),
			array(
				'key' => 'field_61368dcd7faff',
				'label' => 'Capinha',
				'name' => 'capinha',
				'type' => 'image',
				'instructions' => 'Tamanho mínimo 250 x 390 (JPG ou JPEG)',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => 250,
				'min_height' => 390,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => 'jpg,jpeg',
			),
			array(
				'key' => 'field_61368f857fb00',
				'label' => 'Link do Youtube',
				'name' => 'link_do_video',
				'type' => 'oembed',
				'instructions' => 'Link do Youtube, ex: https://youtu.be/uNAxHLp7wv8',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
			array(
				'key' => 'field_6136904b7fb01',
				'label' => 'Tempo do vídeo',
				'name' => 'tempo_do_video',
				'type' => 'number',
				'instructions' => 'Em minutos ex.: 120',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
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
		),
		'active' => true,
		'description' => '',
	));
	
	endif;		
	


function cptui_register_my_cpts_video() {

	/**
	 * Post Type: Vídeos.
	 */

	$labels = [
		"name" => __( "Vídeos", "custom-post-type-ui" ),
		"singular_name" => __( "Vídeo", "custom-post-type-ui" ),
		"menu_name" => __( "Meus Vídeos", "custom-post-type-ui" ),
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
		"menu_icon" => "dashicons-format-video",
		"supports" => [ "title", "editor" ],
		"taxonomies" => [ "category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "video", $args );
}

add_action( 'init', 'cptui_register_my_cpts_video' );


//Criar categorias
function insert_category() {
	if(!term_exists('Filmes')) {
		wp_insert_term(
			'Filmes', 'video', array( 'description' => 'Categoria de Filmes.', 'slug' => 'filmes'),
			'Séries', 'video', array( 'description' => 'Categoria de Séries.', 'slug' => 'series' ),
			'Documentários', 'video', array( 'description' => 'Categoria de Documentários.', 'slug' => 'documentarios' )
		);
	  }
	}
add_action( 'after_setup_theme', 'insert_category' );





if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_61368c42005a8',
		'title' => 'Videos',
		'fields' => array(
			array(
				'key' => 'field_61368c487fafd',
				'label' => 'Descrição',
				'name' => 'descricao',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '100',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => 'wpautop',
			),
			array(
				'key' => 'field_61368c657fafe',
				'label' => 'Imagem de capa',
				'name' => 'imagem_de_capa',
				'type' => 'image',
				'instructions' => 'Tamanho mínimo 1024 x 560. (JPG ou JPEG)',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'large',
				'library' => 'all',
				'min_width' => 1024,
				'min_height' => 560,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => 'jpg, jpeg',
			),
			array(
				'key' => 'field_61368dcd7faff',
				'label' => 'Capinha',
				'name' => 'capinha',
				'type' => 'image',
				'instructions' => 'Tamanho mínimo 250 x 390 (JPG ou JPEG)',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => 250,
				'min_height' => 390,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => 'jpg,jpeg',
			),
			array(
				'key' => 'field_61368f857fb00',
				'label' => 'Link do Youtube',
				'name' => 'link_do_video',
				'type' => 'oembed',
				'instructions' => 'Link do Youtube, ex: https://youtu.be/uNAxHLp7wv8',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'width' => '',
				'height' => '',
			),
			array(
				'key' => 'field_6136904b7fb01',
				'label' => 'Tempo do vídeo',
				'name' => 'tempo_do_video',
				'type' => 'number',
				'instructions' => 'Em minutos ex.: 120',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
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
		),
		'active' => true,
		'description' => '',
	));
	
	endif;		



//minify html
class FLHM_HTML_Compression
{
protected $flhm_compress_css = true;
protected $flhm_compress_js = true;
protected $flhm_info_comment = true;
protected $flhm_remove_comments = true;
protected $html;
public function __construct($html)
{
if (!empty($html))
{
$this->flhm_parseHTML($html);
}
}
public function __toString()
{
return $this->html;
}
protected function flhm_bottomComment($raw, $compressed)
{
$raw = strlen($raw);
$compressed = strlen($compressed);
$savings = ($raw-$compressed) / $raw * 100;
$savings = round($savings, 2);
return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
}
protected function flhm_minifyHTML($html)
{
$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
$overriding = false;
$raw_tag = false;
$html = '';
foreach ($matches as $token)
{
$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
$content = $token[0];
if (is_null($tag))
{
if ( !empty($token['script']) )
{
$strip = $this->flhm_compress_js;
}
else if ( !empty($token['style']) )
{
$strip = $this->flhm_compress_css;
}
else if ($content == '<!--wp-html-compression no compression-->')
{
$overriding = !$overriding; 
continue;
}
else if ($this->flhm_remove_comments)
{
if (!$overriding && $raw_tag != 'textarea')
{
$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
}
}
}
else
{
if ($tag == 'pre' || $tag == 'textarea')
{
$raw_tag = $tag;
}
else if ($tag == '/pre' || $tag == '/textarea')
{
$raw_tag = false;
}
else
{
if ($raw_tag || $overriding)
{
$strip = false;
}
else
{
$strip = true; 
$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content); 
$content = str_replace(' />', '/>', $content);
}
}
} 
if ($strip)
{
$content = $this->flhm_removeWhiteSpace($content);
}
$html .= $content;
} 
return $html;
} 
public function flhm_parseHTML($html)
{
$this->html = $this->flhm_minifyHTML($html);
if ($this->flhm_info_comment)
{
$this->html .= "\n" . $this->flhm_bottomComment($html, $this->html);
}
}
protected function flhm_removeWhiteSpace($str)
{
$str = str_replace("\t", ' ', $str);
$str = str_replace("\n",  '', $str);
$str = str_replace("\r",  '', $str);
$str = str_replace("// The customizer requires postMessage and CORS (if the site is cross domain).",'',$str);
while (stristr($str, '  '))
{
$str = str_replace('  ', ' ', $str);
}   
return $str;
}
}
function flhm_wp_html_compression_finish($html)
{
return new FLHM_HTML_Compression($html);
}
function flhm_wp_html_compression_start()
{
ob_start('flhm_wp_html_compression_finish');
}
add_action('get_header', 'flhm_wp_html_compression_start');
