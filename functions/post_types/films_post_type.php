<?php
  function filmsType()
  {
    $labels = array(
      'name'               => 'Filmes',
      'singular_name'      => 'Filme',
      'menu_name'          => 'Filmes',
      'name_admin_bar'     => 'Filmes',
      'add_new'            => 'Adicionar Novo',
      'add_new_item'       => 'Adicionar novo',
      'new_item'           => 'Novo Item',
      'edit_item'          => 'Editar Item',
      'view_item'          => 'Ver Item',
      'all_items'          => 'Todos os Itens',
      'search_items'       => 'Procurar Filmes',
      'parent_item_colon'  => 'Parent Filmes',
      'not_found'          => 'Nenhum item encontrado',
      'not_found_in_trash' => 'Nenhum item encontrado na lixeira'
    );
    
    $args = array(
      'labels'             => $labels,
      'description'        => 'Todos os itens',
      'public'             => true,
      'show_in_rest'       => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'menu_icon'          => 'dashicons-controls-play',
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'filmes' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => true,
      'menu_position'      => null,
      'supports'           => array( 'title')
    );
    
    register_post_type( 'films', $args );
    
    flush_rewrite_rules();
  }
  add_action('init', 'filmsType');
  
  add_action( 'init', 'films_taxonomy' );
  function films_taxonomy() {
    register_taxonomy(
      'films_taxonomy',
      'films',
      array(
        'label' => __( 'Categoria' ),
        'rewrite' => array( 'slug' => 'categoria_filmes' ),
        'hierarchical' => true,
      )
    );
  }
