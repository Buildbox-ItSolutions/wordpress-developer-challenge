<!DOCTYPE html>
<html lang="pt-br">

<!-- header -->
	
<head>
	
	<meta charset="UTF-8">
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title> Play  <?php if(is_front_page() != true){echo '- '. str_replace( '.php', '', basename( $_SERVER['REQUEST_URI'] ) ); }  ?></title>
	
	<link rel="icon" href="<?php echo get_site_url() ?>/wp-content/uploads/2021/11/favicon_32x32.png" type="image/x-icon" />

	<?php wp_head() ?>

	</head>

<body id="<?php echo str_replace( '.php', '', basename( $_SERVER['REQUEST_URI'] ) ) ?>" <?php body_class() ?>>

    <main id="conteudo">

      <header id="header">

        <div class="container">

          <div class="row">

            <div class="col-md-12 py-4 d-flex header-externo">

                <a href="<?php echo get_site_url() ?>">

                  <img src="<?php echo get_site_url() ?>/wp-content/uploads/2021/11/logo_play.png" alt="Logo da Play" title="Logo da Play">

                </a>
				
				<!-- Menu superior -->

                <nav class="navbar">

                  <div class="container-fluid px-0">

						<?php 
							
							$categorias = get_categories();
							
							foreach($categorias as $categoria){ 
						  	
						  ?>
						
						  
						 		<a class="ms-5 text-white menu_items" href="<?php echo get_term_link($categoria->term_taxonomy_id) ?> " title="<?php echo $categoria->name; ?>" <?php if($categoria->name == "Sem categoria"){echo "style='display:none;'";} ?>><b><?php echo $categoria->name; ?></b></a>
					      
						  <?php } ?>

                  </div>

                </nav>

            </div>

          </div>

        </div>

      </header>