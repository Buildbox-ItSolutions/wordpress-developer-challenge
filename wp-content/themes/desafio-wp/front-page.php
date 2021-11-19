<?php get_header(); 

$categorias = get_categories();

$banner = get_field('banner_da_home', 11);
$categoria = get_the_category($banner['video']->ID);
$tag = get_the_tags($banner['video']->ID);
$link = get_permalink($banner['video']->ID);

?>

<!-- Homepage -->


<section id="banner" style="background-image: url('<?php echo get_the_post_thumbnail_url($banner['video']->ID) ?>');" title="<?php echo $banner['video']->post_title ?>" alt="<?php echo $banner['video']->post_title ?>" class="overflow-hidden">
	
	<div class="container">
	
		<div class="row">
		
			<div class="col-md-10 banner_info">
				
				<div class="d-flex mb-3">
					
					<!-- Informações para o Banner -->

					<a class="border fundo_branco preto rounded mb-3 me-3 pt-1" href="<?php echo get_term_link($categoria[0]->term_id) ?>" title="<?php echo $categoria[0]->name ?>"><span title="Categoria: <?php echo $categoria[0]->name ?>" class="px-5"><?php echo $categoria[0]->name ?></span></a>

					<div class="border border-light rounded mb-3 text-white"><span title="Tempo de Filme: <?php echo $tag[0]->name ?> minutos" class="px-5"><?php echo $tag[0]->name ?>m</span></div>

				</div>

				<p class="display-3 mb-4 text-white"><?php echo $banner['video']->post_title ?></p>

				<a title="<?php echo $banner['video']->post_title ?>" href="<?php echo $link ?>" class="px-5 py-3 vermelho_fundo rounded text-white">Mais informações</a>

			</div>
		
		</div>
		
	</div>
		
</section>
		
<section id="categoria" class="pt-5">
	
	<div class="container-fluid px-0 overflow-hidden">
		
		<div class="row">
			
			<div class="col-md-12 conteudo">
				
				<?php
				
				//repetidor das Categorias do Post Type Filmes
				
				foreach ($categorias as $categoria){
					$cat_dados = get_cat_name($categoria->term_id);

					if($cat_dados != 'Sem categoria'){
					$$cat_dados = get_posts( array(
							'post_type' => 'Filmes',
							'numberposts' => -1,
							'post_status' => 'publish',
							'tax_query' => array(
												array(
													'taxonomy' => 'category',
													'field' => 'id',
													'terms' => $categoria->term_id,
													'operator' => 'IN',
													)
												),
									));
						
				?>
				
				<!-- Título da categoria -->
				
				<p class="h1 py-4 text-capitalize"><a href="<?php echo get_term_link($categoria->term_id) ?>" class="vermelho" title="<?php echo $cat_dados ?>"><?php echo $cat_dados ?></a></p>
				
				<div class="d-flex owl-carousel owl-theme carr" >
					
				<!-- informações dos Vídeos -->
		
					<?php 
					
					//Repetidor dos VIDEOS
					
					foreach($$cat_dados as $cat){ 
					$tag = get_the_tags($cat->ID);

					?>
					
					<a title="<?php echo $cat->post_title ?>" href="<?php echo get_permalink($cat->ID) ?>" class="d-flex flex-column item align-items-start me-4">

						<img class="thumb mb-3 rounded" src="<?php echo get_the_post_thumbnail_url($cat->ID)?>" width="100%" height="450">

						<div class="border border-light rounded mb-3 text-white"><span class="px-5"><?php echo $tag[0]->name ?>m</span></div>

						<p class="text-white h2 titulo"><b><?php echo $cat->post_title ?></b></p>

					</a>

					<?php } ?>
					
				</div>
				
				
				
				<?php } } ?>
			
			</div>
		
		</div>
		
	</div>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>