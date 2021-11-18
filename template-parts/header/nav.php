<?php
if(has_nav_menu('primary')) {
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'container' => 'div',
      'fallback_cb' => false,
      'container_class' => 'collapse navbar-collapse',
      'container_id' => 'navbarText',
      'menu_class' => 'navbar-nav ml-auto'
    )
  );
}