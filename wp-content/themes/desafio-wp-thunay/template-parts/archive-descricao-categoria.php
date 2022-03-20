<?php
	$category = get_queried_object();
	$idCategoria = $category->term_id;
	$nomeCategoria = $category->name;
	$descricaoCategoria = $category->description; 
?>					
<h1><?php echo $nomeCategoria; ?></h1> 
<?php
	if(!$descricaoCategoria == ""){ ?>
		<h2><?php echo $descricaoCategoria; ?></h2> <?php
	}else{ ?>
		<h2>Nenhuma descrição disponível para esta categoria.</h2> <?php
		if(is_user_logged_in()){ ?>
			<h3><a href="<?php echo get_home_url(); ?>/wp-admin/term.php?taxonomy=category&tag_ID=<?php echo $idCategoria; ?>&post_type=video&wp_http_referer=%2Fplay%2Fwp-admin%2Fedit-tags.php%3Ftaxonomy%3Dcategory%26post_type%3Dvideo">Clique aqui</a> para adicionar uma descrição.</h3> <?php
		}
	} 
?>