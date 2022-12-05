<footer class="site-footer">
            <div class="container-footer">
                <div class="logo-footer">
                    <?php 
                        if( has_custom_logo() ){
                            the_custom_logo();
                        }else
                        {  ?>
                            <a href="<?php echo esc_html(home_url( '/' )); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
                            <?php
                        }  ?>
                    </div>
                    <div class="copyright">
                    <p><?php echo esc_html(get_theme_mod( 'set_copyright', __( 'Copyright X - All Rights Reserved', 'tarotheme' ) )); ?></p>
                </div>

            </div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>