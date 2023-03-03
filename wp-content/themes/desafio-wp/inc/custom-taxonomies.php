<?php 
   function custom_taxonomies_config(){
        $args = array(
            "label" => "Tipo de vídeo",
            "public" => true,
            "rewrite" => true,
            "hierarchical" => true,
            'rewrite' => array( 'slug' => 'tipo-de-video' ),
            "show_admin_column" => true,
            "show_in_rest" => true,
        );
        register_taxonomy("tipo-de-video", "tax_tipo_de_video", $args);
    }

    add_action("init", "custom_taxonomies_config");
   
?>