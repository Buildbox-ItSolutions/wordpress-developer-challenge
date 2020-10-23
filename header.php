<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <?php

   wp_head();

   ?>
</head>

<body <?php body_class() ?>>
   <header class="header">
      <div class="header__container container">
         <div class="header__logo">
            <a href="<?php bloginfo('url') ?>">
               <svg class="logo-svg" width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3 22v-20l18 10-18 10z" />
               </svg>
               <?php bloginfo("title"); ?>
            </a>
         </div>
         <nav class="header__nav">
            <ul class="header__menu">
               <?php

               wp_list_categories(array(
                  'current_category' => is_tax('genres') ? get_queried_object_id() : 0,
                  'taxonomy' => 'genres',
                  'title_li' => '',
                  'use_desc_for_title' => false
               ));

               ?>
            </ul>
         </nav>
      </div>
   </header>
