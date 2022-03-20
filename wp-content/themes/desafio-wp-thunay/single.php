<?php 
	/*
		Template de exibição dos arquivos individuais do site(Posts, vídeos, etc...)
	*/
	get_header(); 
?>
<section class="singlePrincipal">
	<div class="container">
		<div class="row">
			<?php get_template_part('template-parts/single', 'conteudo-filme') ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>