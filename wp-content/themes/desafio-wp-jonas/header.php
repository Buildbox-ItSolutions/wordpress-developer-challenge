<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   <header id="header">
      <div class="container d-grid align-content-center align-items-center">
         <div class="logo-container d-flex">
            <?php if (has_custom_logo()) : ?>
               <?php the_custom_logo(); ?>
            <?php else : ?>
               <a href="<?php bloginfo('home'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
         </div>

         <div class="navigation-container justify-self-end">
            <?php
            wp_nav_menu(
               [
                  'container' => '',
                  'theme_location' => 'header-menu'
               ]
            );
            ?>
         </div>

         <div class="mobile-navigation-container">
            <?php
            wp_nav_menu(
               [
                  'container' => '',
                  'theme_location' => 'header-menu',
                  'walker' => new CustomMenu(),
               ]
            );
            ?>
         </div>
      </div>
   </header>