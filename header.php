<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php wp_head() ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/assets/img/favicon.png" type="image/x-icon">
    <title>Play</title>
</head>
<body <?php body_class() ?>>

<?php $videos = new WP_Query(array("post_type" => "video", "posts_per_page" => 1)) ?>
<?php if (is_home() && $videos->have_posts()) : // Só será exibido na Home ?>
    <!-- Último vídeo cadastrado -->
    <?php while ($videos->have_posts()) : $videos->the_post() ?>
        <?php if (has_post_thumbnail()) : // Verifica se tem thumbnail ?>
            <header class="header header--full" style="background-image: url('<?= get_the_post_thumbnail_url(get_the_ID(), "video-full-thumbnails") ?>">
        <?php else : ?>
            <header class="header header--full">
        <?php endif ?>
        <!-- Infos do último vídeo cadastrado -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>
                        <?php $categoria = get_the_terms($post->ID, 'categoria-video') // Verifica se tem categoria ?>
                        <?php if (isset($categoria[0]->slug)) : ?>
                            <a href="<?= $categoria[0]->taxonomy . "/" .  $categoria[0]->slug ?>" class="btn btn__small btn__small--white"><?= $categoria[0]->name ?></a> 
                        <?php endif ?>
                        <?php if (get_post_meta( $post->ID, "video_duracao", true )) : // Verifica se tem tempo de duração ?>
                            <span class="btn btn__small btn__small"><?= get_post_meta( $post->ID, "video_duracao", true ) ?></span>
                        <?php endif ?>
                    </p>
                    <h1 class="header__tittle"><?php the_title() ?></h1>
                    <p><a href="<?php the_permalink() ?>" class="btn btn__big">Mais informações</a></p>
                </div>
            </div>
        </div>
    <?php endwhile ?>
<?php else : ?>
    <header class="header">
<?php endif ?>
<?php wp_reset_postdata() ?>
    <!-- Menu -->
    <nav class="nav">
        <div class="container nav__bar">
            <a href="<?= home_url() ?>" class="logo"><img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="Play"></a>
            <ul class="nav__links">
                <li><a href="<?= home_url() ?>/categoria-video/filmes" class="nav__link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" fill="#fff" viewBox="0 0 24 16"><defs></defs><path class="a" d="M23.458,6.111a1,1,0,0,0-1.039.075L17,10.057V7a3,3,0,0,0-3-3H3A3,3,0,0,0,0,7V17a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V13.943l5.419,3.87A.988.988,0,0,0,23,18a1.019,1.019,0,0,0,.458-.11A1,1,0,0,0,24,17V7A1,1,0,0,0,23.458,6.111ZM15,17a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V7A1,1,0,0,1,3,6H14a1,1,0,0,1,1,1Zm7-1.943L17.721,12,22,8.943Z" transform="translate(0 -4)"/></svg>Filmes</a></li>
                <li><a href="<?= home_url() ?>/categoria-video/documentarios" class="nav__link"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#fff" viewBox="0 0 22 22"><defs></defs><path class="a" d="M19.82,1H4.18A3.184,3.184,0,0,0,1,4.18V19.82A3.184,3.184,0,0,0,4.18,23H19.82A3.184,3.184,0,0,0,23,19.82V4.18A3.184,3.184,0,0,0,19.82,1ZM18,8h3v3H18Zm-2,3H8V3h8ZM6,11H3V8H6ZM3,13H6v3H3Zm5,0h8v8H8Zm10,0h3v3H18Zm3-8.82V6H18V3h1.82A1.181,1.181,0,0,1,21,4.18ZM4.18,3H6V6H3V4.18A1.181,1.181,0,0,1,4.18,3ZM3,19.82V18H6v3H4.18A1.181,1.181,0,0,1,3,19.82ZM19.82,21H18V18h3v1.82A1.181,1.181,0,0,1,19.82,21Z" transform="translate(-1 -1)"/></svg>Documentários</a></li>
                <li><a href="<?= home_url() ?>/categoria-video/series" class="nav__link"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#fff" viewBox="0 0 22 22"><defs></defs><g transform="translate(-1 -1)"><path class="a" d="M12,1A11,11,0,1,0,23,12,11.013,11.013,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9.01,9.01,0,0,1,12,21Z"/><path class="a" d="M16.555,11.168l-6-4A1,1,0,0,0,9,8v8a1,1,0,0,0,1.555.832l6-4a1,1,0,0,0,0-1.664ZM11,14.132V9.869L14.2,12Z"/></g></svg>Séries</a></li>
            </ul>
        </div>
    </nav>
</header>