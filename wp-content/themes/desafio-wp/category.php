<?php get_header(); 

$categoria = get_queried_object();
$categorias = get_categories();
$cat_slug = $categoria->slug;
?>

<!-- Página interna das categorias -->


<section id="categorias">
	
	<div class="container">
	
		<div class="row">
			
			<div class="categoria-externa col-md-12 d-flex my-5 pt-5 ">
				
				<div class="col-md-6 categoria-info">
				
					<p class="h1 pb-3 vermelho text-capitalize"><?php echo $categoria->name; ?></p>
					
					<p class="col-md-10 text-white info"><?php echo $categoria->description; ?></p>
					
				</div>
				
				<div class="categoria-videos col-md-6 d-flex flex-wrap flex-row justify-content-start px-0 mb-5">
					
				
					<?php

						//repetidor das Categorias do Post Type Filmes

						$$cat_slug = get_posts( array(
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
								//Repetidor dos VIDEOS

							foreach($$cat_slug as $cat){ 
							$tag = get_the_tags($cat->ID);

					?>
					<a title="<?php echo $cat->post_title ?>" href="<?php echo get_permalink($cat->ID) ?>" class="d-flex flex-column item align-items-start">

						<img class="thumb mb-3 rounded" src="<?php echo get_the_post_thumbnail_url($cat->ID)?>" width="100%" height="350">

						<div class="border border-light rounded mb-3 text-white"><span class="px-4"><?php echo $tag[0]->name ?>m</span></div>

						<p class="text-white h3 titulo mb-0"><b><?php echo $cat->post_title ?></b></p>

					</a>
					<?php } ?>
						
					
				</div>
			
			</div>
		
		</div>
	
	</div>

</section>

<?php get_sidebar() ?>

<?php get_footer(); ?>