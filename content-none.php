<?php
/**
 * The template for displaying a "No posts found" message.
 */
?>

<header class="page-header no-content">
	<h1 class="page-title"><?php _e( 'Sem conteúdo', 'play' ); ?></h1>
</header>

<div class="page-content no-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Pronto para publicar seu primeiro post? <a href="%1$s">Comece aqui</a>.', 'play' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p><?php _e( 'Desculpe, mas nada corresponde aos seus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.', 'play' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php _e( 'Parece que não conseguimos encontrar o que você está procurando. Talvez pesquisar possa ajudar.', 'play' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->
