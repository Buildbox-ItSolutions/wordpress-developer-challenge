<?php	
	$category = get_queried_object();
	$idCategoria = $category->term_id;
	$nomeCategoria = $category->name;
	$descricaoCategoria = $category->description;

	$args = array(					
		'post_type'   => 'video',
		'order' => 'DESC',
		'orderby' => 'date',
		'tax_query' => array(
		    array(
		        'taxonomy' => 'tipo',
		        'field' => 'name',
		        'terms' => array($category->name)
		    )
		)
	);
	$the_query = new WP_Query( $args );	

	if ($the_query->have_posts() ) :
		while ( $the_query-> have_posts()) :
 			$the_query->the_post(); ?>
			<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
				<a alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>">
					<div class="capaListaFilmes" style="background-image: url(<?php echo get_field('imagem_capa'); ?>)"></div>
				</a> <?php
				if (!empty(get_field('tempo_duracao'))) { ?>
					<button class="btnTempo">
						<a alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>">
							<?php echo get_field('tempo_duracao'); ?>m
						</a>
					</button> <?php
				} ?>
				<h3><a alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			</div> <?php
		endwhile;
		wp_reset_postdata(); 
	else: ?>
		<h2>Não há nenhum vídeo com esta categoria no momento.</h2> <?php
		if(is_user_logged_in()){ ?>
			<h2><a href="<?php echo get_home_url(); ?>/wp-admin/post-new.php?post_type=video">Clique aqui</a> para adicionar um novo vídeo</h2> <?php
		} 
	endif;
?>			
					