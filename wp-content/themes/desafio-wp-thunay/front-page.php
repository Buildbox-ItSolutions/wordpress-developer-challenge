<?php 
	/*
		Template para exibir a página inicial do site.
	*/
	get_header(); 
	$args = array(					
		'post_type'   => 'video',
		'posts_per_page' => 1,
		'order' => 'DESC',
		'orderby' => 'date'
	);
	$the_query = new WP_Query( $args );

	if ($the_query->have_posts() ) :
		while ( $the_query-> have_posts()) :
			$the_query->the_post(); 
			get_template_part('template-parts/video-principal', 'front-page');
		endwhile;
		wp_reset_postdata();
	else: 
		get_template_part('template-parts/video-principal', 'front-page-sem-videos');	
	endif;

	get_template_part('template-parts/listar-categorias', 'front-page');

	get_footer(); 
?>