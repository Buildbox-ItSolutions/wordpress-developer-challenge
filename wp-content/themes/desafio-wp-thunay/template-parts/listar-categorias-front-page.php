<?php
  $taxonomies = get_terms( array(
    'taxonomy' => 'tipo',
    'hide_empty' => true
  ));

	foreach($taxonomies as $category) { 
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
		$the_query = new WP_Query( $args ); ?>
		<section class="listaFilmes">
			<div class="container">
				<div class="row">
					<div class="col-12 categoria categoria<?php echo $category->name ?>">
						<h2><a alt="<?php echo $category->name;	?>" title="<?php echo $category->name; ?>" href="<?php echo get_term_link( $category ) ?>"><?php echo $category->name; ?></a></h2>
					</div> <?php
					if ( $the_query->have_posts() ) : ?>
							<div class="sliderCaroussel slider<?php echo $category->name; ?>"> <?php
								while ( $the_query->have_posts() ) : $the_query->the_post(); 
									get_template_part('template-parts/listar-filmes','front-page');
								endwhile; 
								wp_reset_postdata(); 
							?>
						</div> <?php
					endif; ?>
				</div>
			</div>
		</section> <?php
	} 
?>