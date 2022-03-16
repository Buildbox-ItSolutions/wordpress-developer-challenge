<footer id="footer">
   <div class="container d-flex flex-wrap-wrap">
      <div class="logo-container d-flex">
         <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
         <?php else : ?>
            <a href="<?php bloginfo('home'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
         <?php endif; ?>
      </div>

      <div class="credits-container">
         <p>&copy; &mdash; <?php bloginfo('name'); ?> &mdash; <?php _e('Todos os direitos reservados.', 'desafio-wp') ?></p>
      </div>
   </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>