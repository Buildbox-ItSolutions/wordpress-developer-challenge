<header>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>


<meta name="viewport" content="width=device-width, initial-scale=1">
</header>
<nav class="navbar navbar-expand-md fixed-top justify-content-between" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="mx-auto">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                <a class="navbar-brand mx-auto" href="">
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                        echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
                        
                    ?>
                </a>
            </button>
        </div>

        <a class="navbar-brand d-none d-sm-none d-md-block d-xl-block" href="<?php echo home_url(); ?>">
            <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
                
            ?>
        </a>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary-menu',
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'bs-example-navbar-collapse-1',
            'menu_class' => 'nav navbar-nav ml-auto',
            'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
            'walker' => new WP_Bootstrap_Navwalker())
        );
        ?>
    </div>
</nav>