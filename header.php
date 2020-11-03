<!DOCTYPE html>
<html lang="enp
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title(); ?></title>
  <?php wp_head();?>
</head>
  <body>
     <header>
        <div class="container-row">
          <div class="logo">
            <a href="/" class="play-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/play.svg" alt=""></a>                       
          </div>
          <nav>          
				    <?php wp_nav_menu( array( 'theme_location' => 'menu_principal') ); ?> 			
          </nav>
        </div>
     </header>
