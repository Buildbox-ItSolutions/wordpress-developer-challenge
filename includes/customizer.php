<?php
function rc_after_setup() {
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("custom-logo");
}
add_action('after_setup_theme', "rc_after_setup");

add_image_size('full-cover', 1920);

add_image_size('poster-thumb', 248, 387, true);