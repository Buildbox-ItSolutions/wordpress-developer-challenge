<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 */
?>
<footer id="footer" role="contentinfo">
	<div class="container">
		<?php if(play_the_custom_logo()): 
			play_the_custom_logo();
		else : ?>
			<a class="logo" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="103" /></a>
		<?php endif; ?>
		<p>&copy; <?php echo date( 'Y' ); ?>  —  <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a>  —  <?php _e( 'Todos os direitos reservados', 'play' ); ?> </p>
	</div><!-- .container -->
</footer><!-- #footer -->
<?php if(wp_is_mobile()){
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	echo '<nav id="nav-play">';
	$menu_name = 'main-menu';
	$locations = get_nav_menu_locations();
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
	echo '<ul>';
	foreach ( $menuitems as $term ) {
		$cat_link = $term->url;
		switch ($term->title) {
		case 'Filmes':
			echo '<li><a href="' . esc_url( $cat_link ) . '" class="';
			if(strpos($url,$cat_link) !== false){ echo "current";}
			echo '"><img src="'. get_template_directory_uri() .'/assets/img/filmes.svg" height="22"/><span>' . $term->title . '</span></a></li>';
			break;
		case 'Documentários':
			echo '<li><a href="' . esc_url( $cat_link ) . '" class="';
			if(strpos($url,$cat_link) !== false){ echo "current";}
			echo '"><img src="'. get_template_directory_uri() .'/assets/img/documentarios.svg" height="22"/><span>' . $term->title . '</span></a></li>';
			break;
		case 'Séries':
			echo '<li><a href="' . esc_url( $cat_link ) . '" class="';
			if(strpos($url,$cat_link) !== false){ echo "current";}
			echo '"><img src="'. get_template_directory_uri() .'/assets/img/series.svg" height="22"/><span>' . $term->title . '</span></a></li>';
			break;
		}
	}
	echo '</ul>';
	echo '</div>';
	echo '</nav>';
} ?>
<?php wp_footer(); ?>
</body>
</html>
