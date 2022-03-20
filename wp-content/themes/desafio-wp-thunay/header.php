<?php
	/*
		Template para exibir o cabeçalho do site.
	*/ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
  <!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.helper.ie8.js"></script><![endif]-->
  <?php 
  	wp_head(); 

    get_template_part('template-parts/header', 'fonts');
    get_template_part('template-parts/header', 'icone-navs');
  ?>
</head>
<body>
  <?php get_template_part('template-parts/header', 'navs'); ?>