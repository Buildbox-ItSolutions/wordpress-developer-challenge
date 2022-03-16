<?php

namespace Src\Services;

class Taxonomy
{
   public $taxonomies = [];

   public function registerService()
   {
      $this->taxonomies();

      add_action('init', [$this, 'registerTaxonomyForVideos']);
   }


   public function taxonomies()
   {
      $this->taxonomies[] = [
         'taxonomy' => 'videos-category',
         'object_type' => ['videos'],
         'args' =>  [
            'labels' => [
               'name'              => __('Categorias', 'play-hub'),
               'singular_name'     => __('Categoria', 'play-hub'),
               'search_items'      => __('Procurar categoria', 'play-hub'),
               'all_items'         => __('Todas as categorias', 'play-hub'),
               'parent_item'       => __('Categoria ascendente', 'play-hub'),
               'parent_item_colon' => __('Categoria ascendente:', 'play-hub'),
               'edit_item'         => __('Editar categoria', 'play-hub'),
               'update_item'       => __('Update Slider', 'play-hub'),
               'add_new_item'      => __('Adicionar nova categoria', 'play-hub'),
               'new_item_name'     => __('Novo nome de categoria', 'play-hub'),
               'menu_name'         => __('Categorias', 'play-hub')
            ],
            'query_var' => true,
            'hierarchical' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
         ]
      ];
   }

   public function registerTaxonomyForVideos()
   {

      foreach ($this->taxonomies as $taxonomy) {
         register_taxonomy(
            $taxonomy['taxonomy'],
            $taxonomy['object_type'],
            $taxonomy['args']
         );
      }
   }
}
