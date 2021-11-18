    <section id="footerMenu">

        <div class="grid-container">

            <div class="grid-x">

                <?php if( have_rows('footer_menu', 'option') ): ?>
                    <?php while( have_rows('footer_menu', 'option') ) : the_row(); ?>
                        <?php
                            $icone = get_sub_field('icone');
                            $link = get_sub_field('link');
                            $texto = get_sub_field('texto');
                        ?>
                        <div class="cell small-4">

                            <a href="<?php echo $link; ?>" class="icon">
                                <?php echo $icone; ?>
                                <?php echo $texto; ?>
                            </a>

                        </div>
                        <?php endwhile; endif; ?>

            </div>

        </div>

    </section>

    <footer>
    
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell auto">

                    <img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="" width="104">
                    <p>&copy; <?php echo date('Y'); ?> — Play — Todos os direitos reservados.</p>

                </div>
            </div>
        </div>

    </footer>

<?php wp_footer(); ?>

</body>
</html>