<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return post_type_archive_title( '', false );
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function filmes()
    {
      $filmes = new \WP_Query([
        'post_type' => 'filmes',
        'order' => 'DESC',
        'post_status' => 'publish',
        'orderby' => 'date',
      ]);

      wp_reset_query();

      return $filmes;
    }

    public function documentarios()
    {
      $documentarios = new \WP_Query([
        'post_type' => 'documentarios',
        'order' => 'DESC',
        'post_status' => 'publish',
        'orderby' => 'date',
      ]);

      wp_reset_query();

      return $documentarios;
    }

    public function series()
    {
      $series = new \WP_Query([
        'post_type' => 'series',
        'order' => 'DESC',
        'post_status' => 'publish',
        'orderby' => 'date',
      ]);

      wp_reset_query();

      return $series;
    }
}
