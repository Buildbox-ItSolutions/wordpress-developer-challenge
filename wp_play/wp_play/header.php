<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Navigation Bar -->
    <div class="navigation">

        <!-- Logo Box -->
        <div class="navigation__logo-box">
            <a href="<?php echo esc_html(home_url('/')); ?>">
                <!-- Display the site logo -->
                <img class="navigation__logo-img" src="<?php echo WP_PLAY_LOGO_PATH; ?>">
            </a>
        </div>

        <!-- Navigation Menu -->
        <nav class="navigation__nav">
            <ul>
                <?php
                // Get categories from the 'video_type' taxonomy
                $categories = get_terms(array(
                    'taxonomy' => 'video_type',
                    'hide_empty' => false,
                ));

                // Create an array to store menu categories
                $menu_categories = [];

                if (!empty($categories)) {
                    foreach ($categories as $category) {
                        // Access category properties
                        $category_id = $category->term_id;
                        $category_name = $category->name;
                        $category_link = get_term_link($category);

                        // Store category data in the $menu_categories array
                        $menu_categories[$category_id] = array(
                            'category_name' => $category_name,
                            'category_link' => $category_link,
                        );
                    }
                }

                // Sort menu categories by category ID
                ksort($menu_categories);

                // Loop through menu categories and display them as navigation items
                foreach ($menu_categories as $category_id => $item) {
                    ?>
                    <li class="navigation__menu-item">
                        <!-- Display category name as a link to the category archive page -->
                        <a href="<?php echo $item['category_link']; ?>">
                            <?php echo $item['category_name']; ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
