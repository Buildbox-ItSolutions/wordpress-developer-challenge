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
<body <?php body_class(); ?>>
<header class="header">
  <nav class="nav">
    <div class="container">
      <!-- Custom logo -->
      <?php get_template_part( 'template-parts/custom', 'logo'); ?>
  
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
