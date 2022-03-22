<?php
    add_action('init', 'type_post_series');
 
    function type_post_series() { 
        $labels = array(
            'name' => _x('Séries', 'post type general name'),
            'singular_name' => _x('Série', 'post type singular name')
        );

        $args = array (
            'labels' => $labels,
            'public' => true,            
            'supports' => array('title', 'editor', 'custom-fields'),
            'has_archive' => true,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-format-video',
            'rewrite' => array(
                'slug' => 'series',
            ),
        );

        register_post_type('series', $args);
        flush_rewrite_rules();  
    }
