<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
    <?php wp_title('|',true,'right'); ?>
    </title>
	<?php wp_head(); ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-57x57.png' ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-60x60.png' ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-72x72.png' ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-76x76.png' ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-114x114.png' ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-120x120.png' ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-144x144.png' ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-152x152.png' ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() . '/assets/img/favicons/apple-icon-180x180.png' ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= get_template_directory_uri() . '/assets/img/favicons/android-icon-192x192.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() . '/assets/img/favicons/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= get_template_directory_uri() . '/assets/img/favicons/favicon-96x96.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() . '/assets/img/favicons/favicon-16x16.png' ?>">
    <link rel="manifest" href="<?= get_template_directory_uri() . '/assets/img/favicons/manifest.json' ?>">
    <meta name="msapplication-TileColor" content="#000">
    <meta name="msapplication-TileImage" content="<?= get_template_directory_uri() . '/assets/img/favicons/ms-icon-144x144.png' ?>">
    <meta name="theme-color" content="#000">
    <link rel="stylesheet" href="<?= get_template_directory_uri()?> ./assets/css/main-minify.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="navmenu">
                <div class="logo">
                    <a href="<?= get_site_url() ?>">
                        <img class="logomarca" src="<?= get_template_directory_uri()?> ./assets/img/logo-play.svg" alt="logo">
                    </a>
                </div>
                <?php
                    //funcção para pegar a url atual
                    function current_location()
                    {
                        if (isset($_SERVER['HTTPS']) &&
                            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
                            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
                            $protocol = 'https://';
                        } else {
                            $protocol = 'http://';
                        }
                        return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    }
                    $current_url = current_location();
                    $urlFilmesDesk = get_site_url() . '/category/filmes/';
                    $urlDocumentariosDesk = get_site_url() . '/category/documentarios/';
                    $urlSeriesDesk = get_site_url() . '/category/series/';
                ?>
                <nav class="menu">
                    <ul>
                        <li><a <?= $current_url == $urlFilmesDesk ? 'class="active"' : ''; ?> href="<?= get_site_url() . '/category/filmes' ?>">Filmes</a></li>
                        <li><a <?= $current_url == $urlDocumentariosDesk ? 'class="active"' : ''; ?> href="<?= get_site_url() . '/category/documentarios' ?>">Documentários</a></li>
                        <li><a <?= $current_url == $urlSeriesDesk ? 'class="active"' : ''; ?> href="<?= get_site_url() . '/category/series' ?>">Séries</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>