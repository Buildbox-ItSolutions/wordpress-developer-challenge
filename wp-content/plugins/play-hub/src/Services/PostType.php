<?php

namespace Src\Services;

class PostType
{

   public $postTypes = [];

   public function registerService()
   {
      $this->postTypes();

      add_action('init', [$this, 'registerPostType']);
   }

   public function postTypes()
   {
      $this->postTypes[] = [
         'post_type' => 'videos',
         'args' => [
            'label' => __('Vídeos', 'play-hub'),
            'labels' => [
               'name'                  => __('Vídeos', 'play-hub'),
               'singular_name'         => __('Vídeo', 'play-hub'),
               'menu_name'             => __('Vídeos', 'play-hub'),
               'name_admin_bar'        => __('Vídeos', 'play-hub'),
               'add_new'               => __('Adicionar novo', 'play-hub'),
               'add_new_item'          => __('Adicionar novo vídeo', 'play-hub'),
               'new_item'              => __('Novo vídeo', 'play-hub'),
               'edit_item'             => __('Editar vídeo', 'play-hub'),
               'view_item'             => __('Ver vídeo', 'play-hub'),
               'all_items'             => __('Todos os vídeos', 'play-hub'),
               'search_items'          => __('Procurar vídeos', 'play-hub'),
               'parent_item_colon'     => __('Parent trainings:', 'play-hub'),
               'not_found'             => __('Vídeos não encontrados.', 'play-hub'),
               'not_found_in_trash'    => __('Vídeos não encontrados na lixeira.', 'play-hub'),
               'featured_image'        => __('Imagem de capa do vídeo', 'play-hub'),
               'set_featured_image'    => __('Definir imagem de capa', 'play-hub'),
               'remove_featured_image' => __('Remover imagem de capa', 'play-hub'),
               'use_featured_image'    => __('Use como imagem de capa', 'play-hub'),
               'archives'              => __('Arquivo de vídeos', 'play-hub'),
               'insert_into_item'      => __('Inserir no vídeo', 'play-hub'),
               'uploaded_to_this_item' => __('Carregado para este vídeo', 'play-hub'),
               'filter_items_list'     => __('Filter trainings list', 'play-hub'),
               'items_list_navigation' => __('Navegação da lista de vídeos', 'play-hub'),
               'items_list'            => __('Lista de vídeos', 'play-hub'),
            ],
            'description'        => __('description.', 'play-hub'),
            'has_archive'        => true,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'capability_type'    => 'post',
            'hierarchical'       => false,
            'supports'           => ['title', 'custom-fields', 'revisions ', 'trackbacks', 'comments', 'editor', 'page-attributes', 'author', 'excerpt', 'thumbnail', 'elementor'],
            'show_in_rest'       => true,
            'taxonomies'         => ['videos-category']
         ]
      ];
   }

   public function registerPostType()
   {
      foreach ($this->postTypes as $postType) {
         register_post_type($postType['post_type'], $postType['args']);
      }
   }
}
