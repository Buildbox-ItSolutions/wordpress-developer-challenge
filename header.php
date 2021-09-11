<!DOCTYPE html>
<html lang="p-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Work+Sans&display=swap" rel="stylesheet">
    <link  href="./assets/fonts/CircularSpotifyTxT-Light.eot" rel="stylesheet">
    <script src="https://kit.fontawesome.com/839f710714.js" crossorigin="anonymous"></script>
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <nav class="container">
        <div class="nav">
            <a href="/" class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo play.svg" alt=""></a>
            <ul class="menu">
                <li><a href="/filmes">Filmes</a></li>
                <li><a href="/documentarios">Documentários</a></li>
                <li><a href="/series">Séries</a></li>
            </ul>
        </div>
        <div class="nav-mobile">
            <div>
                <a href="./filmes">
                    <i class="fas fa-video"></i>
                    <span>Filmes</span>
                </a>
            </div>
            <div>
                <a href="./documentarios">
                    <i class="fas fa-film"></i>
                    <span>Documentários</span>
                </a>
            </div>
            <div>
                <a href="./series">
                    <i class="fas fa-play"></i>
                    <span>
                        Séries
                    </span>
                </a>
            </div>
        </div>
    </nav>