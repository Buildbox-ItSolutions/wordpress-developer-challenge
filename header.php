<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Play é uma plataforma de streaming de filmes, documentários e séries">
  
  <?php wp_head(); ?>

</head>
<body>

    <header>

        <div class="grid-container">

            <div class="grid-x grid-padding-x align-middle">

                <div class="cell small-12 medium-4">

                    <a href="<?php bloginfo('home') ?>" title="Voltar para a tela inicial"><h1><img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" width="120" alt=""></h1></a>

                </div>

                <div class="cell small-12 medium-8 hide-for-small-only">
                    <ul class="menu align-right">
                        <?php 
                            wp_nav_menu( array(
                                'menu'           => 'header',
                                'container'      => '',
                                'items_wrap'    => '%3$s',
                            ) );
                        ?>
                    </ul>
                </div>

            </div>

        </div>
        
    </header>