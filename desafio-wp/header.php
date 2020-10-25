<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="container-grid">
            <div class="logo">
                <?php 
                    if(has_custom_logo()){
                        the_custom_logo();
                    }
                ?>
            </div>
          
            <?php 
                if(has_nav_menu( 'primary' )){
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container' =>  'nav',
                        'fallback_cb' => false, 
                    ));
                }
            ?>
        </div>
    </header>