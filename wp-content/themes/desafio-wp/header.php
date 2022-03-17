<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php bloginfo('name'); wp_title(' | '); ?></title>
  <meta name="description" content="Quando criamos a Play Stream nós queriamos que as pessoas assistissem filmes, séries e documentários. Eramos apaixonados pelo que faziamos.">
  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:url" content="https://seusite.com" />
  <meta property="og:image" content="https://seusite.com/image/og-image.png" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body>
<?php $path_url = get_template_directory_uri() . '/assets'; ?>
<!-- Header -->
<header class="header-bg">
  <div class="header container">
    <div class="logo"><a href="/"><img src="<?= $path_url; ?>/logo.svg" alt="Logo Play"></a></div>
    <ul class="header__menu">
      <li><a href="/categoria/filmes">Filmes</a></li>
      <li><a href="/categoria/documentarios">Documentários</a></li>
      <li><a href="/categoria/series">Séries</a></li>
    </ul>
  </div>
</header>