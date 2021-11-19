<!DOCTYPE html>
<html lang="pr_BR">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php wp_head();?>
        <?php echo get_template_part('assets/favicon/icons');?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        
    </head>
<body <?php body_class();?> >
    
<header>
    <div class="wrapper">
        <div class="logo-header">
            <?php
                echo logo_play();
            ?>
        </div>
        <nav>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu_principal',
                    'container' => false,
                )
            );
            ?>
        </nav>
    </div>
</header>
