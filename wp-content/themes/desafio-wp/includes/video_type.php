<?php

add_action('init', 'video_add_custom_post_type');
function video_add_custom_post_type()
{
   register_taxonomy('genres', 'video', array(
      'labels'       => array(
         'name'            => __('Categorias', 'buildbox'),
         'singular_name'   => __('Categoria de vídeo', 'buildbox'),
         'add_new_item'    => __('Adicionar Categoria de vídeo', 'buildbox'),
         'edit_item'       => __('Editar Categoria de vídeo', 'buildbox'),
      ),
      'public'       => true,
      'hierarchical' => true
   ));

   register_post_type('video', array(
      'labels'       => array(
         'name'            => __('Vídeos', 'buildbox'),
         'singular_name'   => __('Vídeo', 'buildbox'),
         'add_new_item'    => __('Adicionar vídeo', 'buildbox'),
         'item_published'  => __('Vídeo publicado', 'buildbox'),
         'edit_item'       => __('Editar vídeo', 'buildbox'),
      ),
      'public'       => true,
      'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
      'menu_icon'    => 'dashicons-video-alt3',
      'taxonomies'   => array('genres')
   ));
}


function video_meta_boxes_cb($post)
{
   $extra_info = get_post_meta($post->ID, 'video_extra_info', true);

   if (!empty($extra_info))
      extract(unserialize($extra_info));

   $duration = $duration ?? "";
   $yt_link  = $yt_link ?? "";

   echo '<table style="width:100%"><tr><td style="width:38%"><label for="extra_duration">Tempo de duração em minutos</label></td>
    <td style="width:62%"><input type="number" id="extra_duration" name="duration" style="width:100%" value="' . esc_attr($duration) . '" min="1" step="1" autocomplete="off"></td></tr>
    <tr><td><label for="extra_yt_link">Link do YouTube</label></td>
    <td><input type="url" id="extra_yt_link" name="yt_link" style="width:100%" value="' . esc_attr($yt_link) . '" pattern="https?://(www\.)?(youtube\.com|youtu\.?be)/.+" autocomplete="off"></td></tr></table>';
}

add_action('add_meta_boxes', 'video_meta_boxes');
function video_meta_boxes()
{
   add_meta_box(
      'extra_info',
      'Informações extras',
      'video_meta_boxes_cb',
      'video',
      'advanced',
      'high'
   );
}


add_action('save_post', 'video_save');
function video_save($post_id)
{
   if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
      return;

   if (!current_user_can('edit_post', $post_id))
      return;

   if (isset($_POST['duration']))
      $duration = (int) sanitize_text_field($_POST['duration']);

   if (isset($_POST['yt_link']))
      $yt_link = esc_url_raw($_POST['yt_link']);

   $extra_info = serialize(compact("duration", "yt_link"));

   update_post_meta($post_id, "video_extra_info", $extra_info);
}


add_filter('manage_video_posts_columns', 'video_columns_head');
function video_columns_head($columns)
{
   $columns['video_cat'] = 'Categoria';

   return $columns;
}


function video_video_term_column_cb($term)
{
   $link = get_term_link($term);
   return "<a href='$link'>$term->name</a>";
}

add_action('manage_video_posts_custom_column', 'video_columns_content', 10, 2);
function video_columns_content($column, $post_id)
{
   switch ($column)
   {
      case 'video_cat':
         $terms = array_map("video_video_term_column_cb", get_the_terms($post_id, 'genres'));
         echo implode(', ', $terms);
         break;
   }
}
