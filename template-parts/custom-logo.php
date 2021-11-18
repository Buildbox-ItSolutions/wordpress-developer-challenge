<a href="<?php bloginfo("url") ?>">
  <?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
    
    
    if(has_custom_logo()) {
      echo '<img src="'. esc_url($logo[0]). '" alt="'. get_bloginfo('name'). '" title="'. get_bloginfo('name'). '">';
    }else {
      echo '<p class="m-0 text-white">'. get_bloginfo('name'). '</p>';
    }
  ?>
</a>
