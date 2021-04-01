<?php

function style_tema() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '1.0' );
    wp_enqueue_style('slick', get_template_directory_uri() .'/assets/css/slick.css', array(), '1.0' );
    wp_enqueue_style('fonts', get_template_directory_uri() .'/assets/css/fonts.css', array(), '1.0' );
    wp_enqueue_style('style', get_template_directory_uri() .'/style.css', array(), '1.0' );
    wp_enqueue_style('style-1024', get_template_directory_uri() .'/assets/css/style-1024.css', array(), '1.0', '(max-width: 1024px)' );
    wp_enqueue_style('style-540', get_template_directory_uri() .'/assets/css/style-375.css', array(), '1.0', '(max-width: 540px)' );



}

add_action('wp_enqueue_scripts', 'style_tema');

add_action( 'wp_footer', 'scripts_tema' );
function scripts_tema() {
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ));
  // wp_add_inline_script( 'bootstrap', 'add-your-inline-js-code-here');
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array ( 'jquery' ));
  // wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), 1.1, true);
wp_enqueue_script(
    'custom-script',
    get_stylesheet_directory_uri() . '/assets/js/script.js',
    array( 'jquery' )
);
        }



add_theme_support('post-thumbnails');
set_post_thumbnail_size( 825, 510, true );

add_theme_support(
  'html5',
  array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'script',
    'style',
  )
);

add_theme_support(
  'post-formats',
  array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'status',
    'audio',
    'chat',
  )
);



function modify_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr) {
    $id = get_post_thumbnail_id(); // gets the id of the current post_thumbnail (in the loop)
    $src = wp_get_attachment_image_src($id, $size); // gets the image url specific to the passed in size (aka. custom image size)
    $alt = get_the_title($id); // gets the post thumbnail title
    $class = $attr['class']; // gets classes passed to the post thumbnail, defined here for easier function access

    // Check to see if a 'retina' class exists in the array when calling "the_post_thumbnail()", if so output different <img/> html
    if (strpos($class, 'retina') !== false) {
        $html = '<img src="" alt="" data-src="' . $src[0] . '" data-alt="' . $alt . '" class="' . $class . '" />';
    } else {
        $html = '<picture>
          <source srcset="' . $src[0] . '" type="image/jpeg">
          <img src="' . $src[0] . '" class="' . $class . '" alt="' . $alt . '" />
        </picture>';
    }

    return $html;
}
add_filter('post_thumbnail_html', 'modify_post_thumbnail_html', 99, 5);
