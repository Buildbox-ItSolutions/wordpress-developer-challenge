<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordpress Developer Challenge Theme wp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="<?php bloginfo('charset'); ?>" >
  <meta name="description" content="<?php bloginfo('description '); ?>">
  
  <?php wp_head(); ?>
</head>
<body>
<header class="header w-100 sticky-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php bloginfo("url") ?>">
        <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
      
      
          if(has_custom_logo()) {
            echo '<img src="'. esc_url($logo[0]). '" class="navbar-brand__img" alt="'. get_bloginfo('name'). '" title="'. get_bloginfo('name'). '">';
          }else {
            echo '<p class="m-0 text-white">'. get_bloginfo('name'). '</p>';
          }
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
