<?php 
	/*
		Template para exibir informaçõs das categorias e taxonomias no site.
	*/
	get_header(); 
?>
<section class="archivePrincipal">
	<div class="container">
		<div class="row">
			<div class="col-xxl-6 col-xl-5 col-lg-6 col-md-12 col-tm-12 col-sm-12 descricaoArchive">
				<?php get_template_part('template-parts/archive', 'descricao-categoria'); ?>
			</div>
			<div class="col-xxl-6 col-xl-7 col-lg-6 col-md-12 col-tm-12 col-sm-12 listaArchives"> 
				<?php get_template_part('template-parts/archive', 'lista-filmes'); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>