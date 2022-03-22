<?php
    add_action('init', 'type_post_documentarios');
 
    function type_post_documentarios() { 
        $labels = array(
            'name' => _x('Documentários', 'post type general name'),
            'singular_name' => _x('Documentário', 'post type singular name')
        );

        $args = array (
            'labels' => $labels,
            'public' => true,            
            'supports' => array('title', 'editor', 'custom-fields'),
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-editor-video',
            'rewrite' => array(
                'slug' => 'documentarios',
            ),
        );

        register_post_type('documentarios', $args);
        flush_rewrite_rules();  
    }
