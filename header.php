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
<header>
  <nav class="nav">
    <div class="container">
      <a href="<?php bloginfo("url") ?>">
        <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
      
      
          if(has_custom_logo()) {
            echo '<img src="'. esc_url($logo[0]). '" alt="'. get_bloginfo('name'). '" title="'. get_bloginfo('name'). '">';
          }else {
            echo '<p class="m-0 text-white">'. get_bloginfo('name'). '</p>';
          }
        ?>
      </a>
  
      <ul class="menu">
        <?php wp_list_categories( array(
          'title_li'           => __( '' ),
          'orderby'    => 'name',
          'taxonomy'   => 'films_taxonomy',
        ) ); ?>
      </ul>
    </div>
  </nav>
</header>
