<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php wp_head(); ?>

</head>
<body>

    <header>

        <div class="grid-container">

            <div class="grid-x grid-padding-x align-middle">

                <div class="cell small-12 medium-4">

                    <h1><img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt=""></h1>

                </div>

                <div class="cell small-12 medium-8 hide-for-small-only">
                    <ul class="menu align-right">
                        <li><a href="">Filmes</a></li>
                        <li><a href="">Documentários</a></li>
                        <li><a href="">Séries</a></li>
                    </ul>
                </div>

            </div>

        </div>
        
    </header>