<?php 
	/*
		Template para exibir urls que geram erro 404 no site.
	*/
	get_header() 
?>
<section class="section404">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Oops, Não encontramos a página que você estava tentando procurar.</h1>
				<h2><a alt="<?php the_title(); ?>" title="<?php the_title(); ?>" href="<?php echo get_home_url() ?>">Clique aqui</a> para retornar para a página principal.</a></h2>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>