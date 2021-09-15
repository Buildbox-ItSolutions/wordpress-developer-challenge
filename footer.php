<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Desafio WP
 * @since Twenty Nineteen 1.0
 */

?>
<nav id="sticky_footer" class="navbar fixed-bottom menu_rodape d-block d-sm-none">
  <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
</nav>
<footer id="footer" class="footer d-flex  ">
      <div class="container-fluid d-flex flex-column ">
	  <a class="navbar-brand" href="<?php echo home_url(); ?>">
            <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';                
            ?>
        </a>
		
        <span class="footer__copyright">© 2020 — Play — Todos os direitos reservados.</span>
      </div>
    </footer>

<?php wp_footer(); ?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>

<script>
//stop fixed bottom menu at footer
$(document).scroll(function() {
    checkOffset();
});

function checkOffset() {
    if($('#sticky_footer').offset().top + $('#sticky_footer').height() 
                                           >= $('#footer').offset().top - 10)
        $('#sticky_footer').toggleClass('hide_fixed_Footer');
    if($(document).scrollTop() + window.innerHeight < $('#footer').offset().top)
        $('#sticky_footer').toggleClass('hide_fixed_Footer'); // restore when you scroll up
}

function checkOffset() {
    if($('#sticky_footer').offset().top + $('#sticky_footer').height() 
                                           >= $('#footer').offset().top - 10)
        $('#sticky_footer').css('position', 'relative');
    if($(document).scrollTop() + window.innerHeight < $('#footer').offset().top)
        $('#sticky_footer').css('position', 'fixed'); // restore when you scroll up
}
</script>