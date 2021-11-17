<?php
/**
 * The template for displaying the footer

 */

?>
</main>

<footer class="d-flex align-items-center">
  <div class="container">


   <p><a class="home-logo" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_logo_url(); ?>" alt="" width="100px"></a></p>

<p>© <?php echo date("Y"); ?> — Play — Todos os direitos reservados.</p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>