<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    public function all()
    {
      $all = new \WP_Query([
        'post_type' => array('filmes', 'documentarios', 'series'),
        'order' => 'DESC',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'posts_per_page' => 5,
        'meta_query' => array(
          array(
            'key'   => 'destaque',
            'value' => 'sim',
          )
        )
      ]);

      wp_reset_query();

      return $all;
    }
}
