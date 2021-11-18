<?php
  /**
   * The template for displaying the footer
   *
   * Contains the closing of the #content div and all content after.
   *
   * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
   *
   * @package Wordpress Developer Challenge Theme wp
   */

?>
<footer class="footer">
  <div class="container">
    <!-- Custom logo -->
    <?php get_template_part( 'template-parts/custom', 'logo'); ?>
    <span>© 2020 — Play — Todos os direitos reservados.</span>
  </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
