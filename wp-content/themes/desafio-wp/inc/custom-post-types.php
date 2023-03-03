<?php

    function custom_post_type_config(){
        $videos = array(
            "label" => "Vídeos",
                "labels" => array(
                    "name" => "Vídeos",
                    "singular_name" => "Vídeo"
                ),
            "description" => "Cadastro de vídeos.",
            "public" => true,
            "public_queryable" => true,
            'show_in_rest' => true,
            "show_ui" => true,
            "show_in_menu" => true, 
            "show_in_nav_menus" => true,
            "menu_icon" => "dashicons-star-filled",
            "rewrite" => array("slug" => "video", "with_front" => true),
            "supports" => array("title","editor", "thumbnail", "excerpt"),
			"taxonomies" => array("tipo-de-video"),
        );		
        register_post_type("video", $videos);
    }

    add_action("init", "custom_post_type_config");

?>