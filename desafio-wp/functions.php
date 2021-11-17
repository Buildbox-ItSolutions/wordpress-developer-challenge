<?php

/**
 * Dependancy installer
 */
require_once('dep-installer.php');


/**
 * Adds basic theme support
 */

add_theme_support('post-thumbnails');

add_theme_support('title-tag');


/**
 * Adds basic image sizes
 */

add_image_size('full-cover', 1920);

add_image_size('poster-thumb', 248, 387, true);

/**
 * Adds logo support
 */

function custom_logo_support()
{

    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'custom_logo_support');

/**
 * Calls for core css and js
 */

function import_styles_and_scripts()
{

    wp_enqueue_style('gfonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;900&display=swap', array(), false, 'all');
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('stylesheet', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), false, 'all');
    wp_enqueue_style('stylesheet-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array(), false, 'all');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', array(), false, true);

    if (is_front_page()) {

        wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), false, 'all');

        wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), false, true);

        wp_enqueue_script('swiper-actions-js', get_stylesheet_directory_uri() . '/assets/js/swiper.js', array(), false, true);
    }

    if (get_post_type() == 'videos') {

        wp_enqueue_style('plyr-css', 'https://cdn.plyr.io/3.6.9/plyr.css', array(), false, 'all');

        wp_enqueue_script('plyr-js', 'https://cdn.plyr.io/3.6.9/plyr.js', array(), false, true);

        wp_enqueue_script('plyr-actions-js', get_stylesheet_directory_uri() . '/assets/js/plyr.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'import_styles_and_scripts');

/**
 * Main nav menu
 */

function main_menu()
{
    register_nav_menu('main-menu', __('Menu Principal'));
}
add_action('init', 'main_menu');

/**
 * Additional menu classes
 */

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

/**
 * Adds icons for known menu items
 */

function add_menu_icons($item_output, $item)
{

    if ('Filmes' == $item->title) {

        return '<div class="icon-container d-lg-none d-md-none"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16"><defs><style>.a{fill:#fff;}</style></defs><path class="a" d="M23.458,6.111a1,1,0,0,0-1.039.075L17,10.057V7a3,3,0,0,0-3-3H3A3,3,0,0,0,0,7V17a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V13.943l5.419,3.87A.988.988,0,0,0,23,18a1.019,1.019,0,0,0,.458-.11A1,1,0,0,0,24,17V7A1,1,0,0,0,23.458,6.111ZM15,17a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V7A1,1,0,0,1,3,6H14a1,1,0,0,1,1,1Zm7-1.943L17.721,12,22,8.943Z" transform="translate(0 -4)"/></svg></div><a href="' . $item->url . '" class="nav-link">' . $item->title . '</a>';
    }
    if ('Documentários' == $item->title) {

        return '<div class="icon-container d-lg-none d-md-none"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"><defs><style>.a{fill:#fff;}</style></defs><path class="a" d="M19.82,1H4.18A3.184,3.184,0,0,0,1,4.18V19.82A3.184,3.184,0,0,0,4.18,23H19.82A3.184,3.184,0,0,0,23,19.82V4.18A3.184,3.184,0,0,0,19.82,1ZM18,8h3v3H18Zm-2,3H8V3h8ZM6,11H3V8H6ZM3,13H6v3H3Zm5,0h8v8H8Zm10,0h3v3H18Zm3-8.82V6H18V3h1.82A1.181,1.181,0,0,1,21,4.18ZM4.18,3H6V6H3V4.18A1.181,1.181,0,0,1,4.18,3ZM3,19.82V18H6v3H4.18A1.181,1.181,0,0,1,3,19.82ZM19.82,21H18V18h3v1.82A1.181,1.181,0,0,1,19.82,21Z" transform="translate(-1 -1)"/></svg></div><a href="' . $item->url . '" class="nav-link">' . $item->title . '</a>';
    }

    if ('Séries' == $item->title) {

        return '<div class="icon-container d-lg-none d-md-none"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"><defs><style>.a{fill:#fff;}</style></defs><g transform="translate(-1 -1)"><path class="a" d="M12,1A11,11,0,1,0,23,12,11.013,11.013,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9.01,9.01,0,0,1,12,21Z"/><path class="a" d="M16.555,11.168l-6-4A1,1,0,0,0,9,8v8a1,1,0,0,0,1.555.832l6-4a1,1,0,0,0,0-1.664ZM11,14.132V9.869L14.2,12Z"/></g></svg></div><a href="' . $item->url . '" class="nav-link">' . $item->title . '</a>';
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_menu_icons', 10, 2);

/**
 * Adds video post type
 */

function videos_custom_post_type()
{
    $labels = array(
        'name'                => __('Videos'),
        'singular_name'       => __('vídeo'),
        'menu_name'           => __('Vídeos'),
        'parent_item_colon'   => __('Vídeo Pai'),
        'all_items'           => __('Todos os Vídeos'),
        'view_item'           => __('Ver Vídeo'),
        'add_new_item'        => __('Adicionar Novo'),
        'add_new'             => __('Adicionar Novo'),
        'edit_item'           => __('Editar Vídeo'),
        'update_item'         => __('Atualizar Vídeo'),
        'search_items'        => __('Buscar Vídeo'),
        'not_found'           => __('Não encontrado'),
        'not_found_in_trash'  => __('Não encontrado na lixeira')
    );
    $args = array(
        'label'               => __('videos'),
        'description'         => __('Vídeos'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
        'public'              => true,
        'hierarchical'        => false,
        'menu_icon'           => 'dashicons-video-alt3',
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'taxonomies'           => array('formatos'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );
    register_post_type('videos', $args);
}

add_action('init', 'create_videos_custom_taxonomy', 0);

add_action('init', 'videos_custom_post_type', 0);

/**
 * Adds video post type taxonomy
 */

function create_videos_custom_taxonomy()
{

    $labels = array(
        'name' => _x('Formatos', 'taxonomy general name'),
        'singular_name' => _x('formato', 'taxonomy singular name'),
        'search_items' =>  __('Buscar formatos'),
        'all_items' => __('Todos os Formatos'),
        'parent_item' => __('Formato Pai'),
        'parent_item_colon' => __('Formato pai:'),
        'edit_item' => __('Editar formato'),
        'update_item' => __('Utualizar formato'),
        'add_new_item' => __('Adicionar novo formato'),
        'new_item_name' => __('Nome do novo formato'),
        'menu_name' => __('Formatos'),
    );

    register_taxonomy('formatos', array('videos'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'formatos'),
    ));
}

/**
 * Populates taxonomy with known media types
 */

function custom_taxonomy()
{

 

    if (!term_exists('Documentários', 'formatos')) {
        wp_insert_term(
            'Documentários',
            'formatos',
            array(
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque sed felis eu commodo. Duis dapibus eu arcu varius ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin vel lorem malesuada, pellentesque purus eget, porttitor purus. Etiam eleifend facilisis lobortis. Curabitur erat lacus, ullamcorper ut magna a, maximus pellentesque dolor.',
                'slug'        => 'documentarios'
            )
        );
    }

    if (!term_exists('Séries', 'formatos')) {
        wp_insert_term(
            'Séries',
            'formatos',
            array(
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque sed felis eu commodo. Duis dapibus eu arcu varius ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin vel lorem malesuada, pellentesque purus eget, porttitor purus. Etiam eleifend facilisis lobortis. Curabitur erat lacus, ullamcorper ut magna a, maximus pellentesque dolor.',
                'slug'        => 'series'
            )
        );
    }


    if (!term_exists('Filmes', 'formatos')) {
        wp_insert_term(
            'Filmes',
            'formatos',
            array(
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque sed felis eu commodo. Duis dapibus eu arcu varius ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin vel lorem malesuada, pellentesque purus eget, porttitor purus. Etiam eleifend facilisis lobortis. Curabitur erat lacus, ullamcorper ut magna a, maximus pellentesque dolor.',
                'slug'        => 'filmes'
            )
        );
    }
}

// Hook into the 'init' action
add_action('init', 'custom_taxonomy', 0);

/**
 * ACF'fields for video post type
 */

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key' => 'video_fields',
        'title' => 'Campos de Vídeo',
        'fields' => array(
            array(
                'key' => 'description',
                'label' => 'Descrição',
                'name' => 'description',
                'type' => 'text',
            ),
            array(
                'key' => 'synopsis',
                'label' => 'Sinopse',
                'name' => 'synopsis',
                'type' => 'textarea',
            ),
            array(
                'key' => 'duration',
                'label' => 'Duração',
                'name' => 'duration',
                'placeholder' => 'Em minutos',
                'type' => 'number',
            ),
            array(
                'key' => 'embed',
                'label' => 'Embed (YouTube)',
                'name' => 'embed',
                'placeholder' => 'Urls válidas do youtube, exemplo: https://www.youtube.com/embed/Rio16skrp2w',
                'type' => 'text',
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'videos',
                ),
            ),
        ),
        'position' => 'acf_after_title',

    ));
}

/**
 * Gets logo url
 */

function get_logo_url()
{

    $logo = get_theme_mod('custom_logo');
    $image = wp_get_attachment_image_src($logo, 'full');
    $image_url = $image[0];
    if ($image_url) {

        return $image_url;
    } else {

        return get_template_directory_uri() . '/assets/img/logo.svg';
    }
}

/**
 * Populates main menu
 */

function get_terms_list_and_put_on_menu()
{

    if (!has_nav_menu('maintopmenu')) {

        $menu_id = wp_create_nav_menu('maintopmenu');

        $terms = get_terms('formatos', array('hide_empty' => false));

        foreach ($terms as $term) {

            wp_update_nav_menu_item(
                $menu_id,
                0,
                array(
                    'menu-item-title' => $term->name,
                    'menu-item-object-id' => $term->term_id,
                    'menu-item-db-id' => 0,
                    'menu-item-object' => 'formatos',
                    'menu-item-parent-id' => 0,
                    'menu-item-type' => 'taxonomy',
                    'menu-item-url' => '',
                    'menu-item-status' => 'publish'
                )
            );
        }
    }
}

add_action('init', 'get_terms_list_and_put_on_menu');

$locations = get_theme_mod('nav_menu_locations');

$menu_id = wp_get_nav_menu_object('maintopmenu', true)->term_id;

if ($locations['main-menu'] !=  $menu_id) {

    $locations['main-menu'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}

/**
 * Adds data for description and open graph
 */

function get_representative_images()
{
    global $post;
    $images = array(' ');
    if (has_post_thumbnail($post->ID)) { // check if the post has a Post Thumbnail assigned to it.
        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
        array_unshift($images, $image_url[0]);
    }
    return $images;
}

function insert_meta_description()
{
    global $post;
    if (is_singular()) {
        $des_post = strip_tags(get_field("description", $post->ID));
        $des_post = strip_shortcodes(get_field("description", $post->ID));
        $des_post = str_replace(array("\n", "\r", "\t"), ' ', $des_post);
        $des_post = mb_substr($des_post, 0, 300, 'utf8');
        echo '<meta name="description" content="' . $des_post . '" />' . "\n";
    }
    if (is_home()) {
        echo '<meta name="description" content="' . get_bloginfo("description") . '" />' . "\n";
    }
    if (is_category()) {
        $des_cat = strip_tags(category_description());
        echo '<meta name="description" content="' . $des_cat . '" />' . "\n";
    }
}
add_action('wp_head', 'insert_meta_description');

/**
 * Adds favicon support
 */

function myfavicon()
{
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('wpurl') . '/favicon.ico" />' . "\n";
}
add_action('wp_head', 'myfavicon');
