<!DOCTYPE html>
<head>
<html <?php language_attributes();?>
    <meta charset="<?php bloginfo('charset'); ?>
    <meta http-equiv= "X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? wp_head(); ?>
    </head>
<body class="site"?php body_class(); ?>
<? wp_body_open();?> 
<div id="page" class="site">
    <header class="header-play">
        <section class="top-bar">
                <div class="logo-area">
                    <?php 
                        if( has_custom_logo() ){
                            the_custom_logo();
                        }else
                        {  ?>
                            <a href="<?php echo esc_html(home_url( '/' )); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
                            <?php
                        }  ?>
                    </div>
                    <nav>
                    <div class="menu-area">
                <nav class="main-menu">
                    <? wp_nav_menu(array('theme_location' => 'playtheme_main_menu', 'depth'=> 1)); ?>
                    </div>
                    </nav>
        </section>
    </header>
</div>
