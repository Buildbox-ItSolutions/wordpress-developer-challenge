<?php
    add_action('init', 'type_post_filmes');
 
    function type_post_filmes() { 
        $labels = array(
            'name' => _x('Filmes', 'post type general name'),
            'singular_name' => _x('Filme', 'post type singular name')
        );

        $args = array (
            'labels' => $labels,
            'public' => true,            
            'supports' => array('title', 'editor', 'custom-fields'),
            'has_archive' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-video-alt2',
            'rewrite' => array(
                'slug' => 'filmes',
            ),
        );

        register_post_type('filmes', $args);
        flush_rewrite_rules();  
    }
