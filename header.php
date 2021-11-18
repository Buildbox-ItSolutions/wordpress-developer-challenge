<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="main">
    <nav id="header" class="navbar navbar-expand-lg navbar-dark fixed-top px-0">
        <div class="container">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id , 'full');
            if (has_custom_logo()) {
                echo '<a href="/" class="logo navbar-brand"><img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
            } else {
                echo '<a href="/" class="logo navbar-brand">' . get_bloginfo('name') . '</a>';
            }
            echo '
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            '.get_template_part('template-parts/header/nav');
            ?>
        </div>
    </nav>