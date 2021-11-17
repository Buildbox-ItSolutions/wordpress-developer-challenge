<?php

/**
 * The template for displaying the header

 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
    <meta property="og:title" content="<?php if (is_single()) {
                                            wp_title();
                                        } else {
                                            bloginfo('name');
                                        } ?>" />
    <meta property="og:type" content="blog" />
    <meta property="og:url" content="<?php echo get_permalink() ?>" />
    <meta property="og:site_name" content="<?php bloginfo('name') ?>" />
    <?php foreach (get_representative_images() as $image_url) : ?>
        <meta property="og:image" content="<?php echo $image_url ?>" />
    <?php endforeach; ?>
    <title><?php wp_title(); ?></title>
</head>

<body <?php body_class(); ?>>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid nav-wrapper">
                    <a class="navbar-brand home-logo" href="<?php echo get_site_url(); ?>">


                        <img src="<?php echo get_logo_url(); ?>" alt="" width="100px">
                    </a>

                    <div class="" id="navbarNavAltMarkup">
                        <?php
                        wp_nav_menu(array('theme_location' => 'main-menu', 'menu_id' => 'primary-menu', 'container' => 'ul', 'menu_class' => 'navbar-nav ms-auto d-inline-flex flex-row align-items-end', 'add_li_class'  => 'nav-item', 'link_class' => 'nav-link'));
                        ?>

                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>