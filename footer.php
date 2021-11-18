    <footer id="footer">
      <div class="container">
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id , 'full');
        ?>
        <p><a href="/"><img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>"></a></p>
        <p>© 2021 - Play - Todos os direitos reservados</p>
      </div>
      <?php WP_footer(); ?>
    </footer>
  </body>
</html>