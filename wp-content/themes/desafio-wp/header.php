<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php if( !is_front_page() ){?>
    <div class="speace-header"></div>
    <?php } ?>
    <header class="header">
        <div class="container"> 
            <div class="grid-4 logo">
                <?= !empty(get_custom_logo()) ? get_custom_logo() : get_bloginfo('name'); ?>
            </div>
            <div class="grid-5 menu-header">
                <?php wp_nav_menu(['theme_location' => 'menu_desktop']); ?>
            </div>
        </div>
    </header>
    <div class="menu-mobile">        
        <?php wp_nav_menu(['theme_location' => 'menu_mobile']); ?>
    </div>
    <main>