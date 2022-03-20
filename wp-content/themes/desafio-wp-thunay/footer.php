<?php
	/*
		Template para exibir o rodapé do site.
	*/ 
?>
<footer>
	<div class="container">
		<div class="row">
			<?php get_template_part('template-parts/footer', 'content'); ?>
		</div>
	</div>
	<?php get_template_part('template-parts/footer', 'scripts-carroussel'); ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>