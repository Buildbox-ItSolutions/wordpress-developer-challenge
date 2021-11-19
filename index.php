<?php get_header(); ?>

	<main id="main">
		<section id="hero">
			<?php get_template_part('template-parts/content/hero'); ?>
		</section>
		<section id="filmes">
			<?php get_template_part('template-parts/content/filmes'); ?>
		</section>
		<section id="documentarios">
			<?php get_template_part('template-parts/content/documentarios'); ?>
		</section>
		<section id="series">
			<?php get_template_part('template-parts/content/series'); ?>
		</section>
	</main>

<?php get_footer(); ?>
