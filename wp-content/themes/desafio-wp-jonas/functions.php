<?php

function desafioWPThemeSetup()
{
   add_theme_support('title-tag');

   add_theme_support('custom-logo');

   add_theme_support('widgets');

   add_theme_support('page-attributes');

   add_theme_support('post-thumbnails');

   add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'desafioWPThemeSetup');


function desafioWPRegisterMenus()
{
   $locations = [
      'header-menu' => __('Header menu', 'desafio-wp'),
   ];

   register_nav_menus($locations);
}
add_action('init', 'desafioWPRegisterMenus');


function desafioWPEnqueue()
{
   wp_enqueue_style('owlcarousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4');
   wp_enqueue_style('desafio-wp', get_template_directory_uri() . '/assets/css/styles.css', array(), wp_get_theme()->get('Version'));

   wp_enqueue_script('jquery-scripts', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.6.0', true);
   wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '2.3.4', true);
   wp_enqueue_script('desafio-wp', get_template_directory_uri() . '/assets/js/scripts.js', array(), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'desafioWPEnqueue');


class CustomMenu extends Walker_Nav_Menu
{
   function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
   {
      if (!empty($output)) {
         $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
      }

      if (!empty($item->classes) && in_array('menu-item-movies', $item->classes)) {
         $moviesSVG = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 112v288c0 26.51-21.49 48-48 48h-288c-26.51 0-48-21.49-48-48v-288c0-26.51 21.49-48 48-48h288C362.5 64 384 85.49 384 112zM576 127.5v256.9c0 25.5-29.17 40.39-50.39 25.79L416 334.7V177.3l109.6-75.56C546.9 87.13 576 102.1 576 127.5z"/></svg>';

         $output .= '<a href="' . $item->url . '">' . $moviesSVG;
      }

      if (!empty($item->classes) && in_array('menu-item-documentaries', $item->classes)) {
         $documentariesSVG = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M463.1 32h-416C21.49 32-.0001 53.49-.0001 80v352c0 26.51 21.49 48 47.1 48h416c26.51 0 48-21.49 48-48v-352C511.1 53.49 490.5 32 463.1 32zM111.1 408c0 4.418-3.582 8-8 8H55.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8L111.1 408zM111.1 280c0 4.418-3.582 8-8 8H55.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8V280zM111.1 152c0 4.418-3.582 8-8 8H55.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8L111.1 152zM351.1 400c0 8.836-7.164 16-16 16H175.1c-8.836 0-16-7.164-16-16v-96c0-8.838 7.164-16 16-16h160c8.836 0 16 7.162 16 16V400zM351.1 208c0 8.836-7.164 16-16 16H175.1c-8.836 0-16-7.164-16-16v-96c0-8.838 7.164-16 16-16h160c8.836 0 16 7.162 16 16V208zM463.1 408c0 4.418-3.582 8-8 8h-47.1c-4.418 0-7.1-3.582-7.1-8l0-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8V408zM463.1 280c0 4.418-3.582 8-8 8h-47.1c-4.418 0-8-3.582-8-8v-48c0-4.418 3.582-8 8-8h47.1c4.418 0 8 3.582 8 8V280zM463.1 152c0 4.418-3.582 8-8 8h-47.1c-4.418 0-8-3.582-8-8l0-48c0-4.418 3.582-8 7.1-8h47.1c4.418 0 8 3.582 8 8V152z"/></svg>';

         $output .= '<a href="' . $item->url . '">' . $documentariesSVG;
      }
      if (!empty($item->classes) && in_array('menu-item-series', $item->classes)) {
         $seriesSVG = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"/></svg>';

         $output .= '<a href="' . $item->url . '">' . $seriesSVG;
      }

      $output .=  '<span>' . $item->title . '</span></a>';
   }

   function end_el(&$output, $item, $depth = 0, $args = null)
   {
      $output .= '</li>';
   }
}
