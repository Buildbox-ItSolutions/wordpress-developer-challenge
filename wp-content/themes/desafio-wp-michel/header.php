<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="author" content="Michel Lucas"/>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
        <?php wp_head(); ?>
    </head>
    <body class="<?php echo implode(' ', get_body_class()); ?>">
        <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
        <nav class="bg-dark end-0 mt-0 navbar navbar-dark navbar-expand pb-3 pe-2 pe-sm-3 position-fixed ps-2 ps-sm-3 pt-3 start-0" style="z-index: 99;"> 
            <div class="container-md pe-0 ps-0"> <a class="bg-dark d-flex justify-content-center navbar-brand pb-4 pb-sm-2 pt-4 pt-sm-2 text-white" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-play.svg" width="70px"/></a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler14" aria-controls="" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> 
                </button>
                <div class="collapse navbar-collapse " id="navbarToggler14"> 
                    <?php if ( has_nav_menu( 'primary' ) ) : ?>
                        <?php
                            PG_Smart_Walker_Nav_Menu::$options['template'] = '<li class="align-items-center d-flex flex-column nav-item"> <a class="align-items-center d-flex flex-column gap-1 nav-link pb-0 pb-sm-2 text-center {CLASSES}" id="{ID}" {ATTRS}>{TITLE}</a> 
                                                    </li>';
                            PG_Smart_Walker_Nav_Menu::$options['current_class'] = 'active';
                            wp_nav_menu( array(
                                'container' => '',
                                'theme_location' => 'primary',
                                'items_wrap' => '<ul class="%2$s d-flex d-sm-flex h-100 justify-content-around justify-content-sm-end navbar-nav w-100" id="%1$s">%3$s</ul>',
                                'walker' => new PG_Smart_Walker_Nav_Menu()
                        ) ); ?>
                    <?php endif; ?> 
                </div>                 
            </div>             
        </nav>
        <main>