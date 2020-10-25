<?php 
//Include
require get_template_directory().'/include/setup.php';
require_once dirname(__FILE__).'/include/custom-posts/videos_CPT.php';

//Hooks
add_action("wp_enqueue_scripts", "play_theme_styles");
add_action("after_setup_theme", "play_after_setup");

//Menu active
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

?>