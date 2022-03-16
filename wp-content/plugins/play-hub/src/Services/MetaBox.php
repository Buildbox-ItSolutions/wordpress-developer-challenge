<?php

namespace Src\Services;

class MetaBox
{
   public $metaBoxes = [];

   public function registerService()
   {
      $this->metaBoxes();

      add_action('add_meta_boxes', [$this, 'registerMetaBox']);

      add_action("save_post", [$this, "saveVideoDuration"]);
      add_action("save_post", [$this, "saveVideoEmbed"]);
      add_action("save_post", [$this, "saveVideoDescription"]);
   }

   public function metaBoxes()
   {
      $this->metaBoxes[] = [
         "id" => "video-duration",
         "title" => __("Duração do vídeo", "play-hub"),
         "callback" => [$this, "renderFormVideoDuration"],
         "screen" => "videos",
         "context" => "side",
         "priority" => "default"
      ];
      $this->metaBoxes[] = [
         "id" => "video-embed",
         "title" => __("URL do vídeo", "play-hub"),
         "callback" => [$this, "renderFormVideoEmbed"],
         "screen" => "videos",
         "context" => "side",
         "priority" => "default"
      ];
      $this->metaBoxes[] = [
         "id" => "video-description",
         "title" => __("Descrição", "play-hub"),
         "callback" => [$this, "renderFormVideoDescription"],
         "screen" => "videos",
         "context" => "side",
         "priority" => "default"
      ];
   }

   public function registerMetaBox()
   {
      foreach ($this->metaBoxes as $metaBoxe) {
         add_meta_box($metaBoxe["id"], $metaBoxe["title"], $metaBoxe["callback"], $metaBoxe["screen"], $metaBoxe["context"], $metaBoxe["priority"]);
      }
   }

   public function renderFormVideoDuration()
   {
      $value = get_post_meta(get_the_ID(), 'video-duration', true);

      echo '<div style="display: flex; flex-wrap: wrap; row-gap: 12px; margin-top: 16px;">';
      echo '<label style="display: block; width: 100%;">';
      echo '<input type="number" name="video-duration" id="video-duration" min="1" max="5000" style="width: 100%;" value="' . (isset($value) ? $value : "") . '">';
      echo '</label>';
      echo '</div>';
   }

   public function renderFormVideoEmbed()
   {
      $value = get_post_meta(get_the_ID(), 'video-embed', true);

      echo '<div style="display: flex; flex-wrap: wrap; row-gap: 12px; margin-top: 16px;">';
      echo '<label style="display: block; width: 100%;">';
      echo 'Cole a url do vídeo aqui. Obs: video em MP4';
      echo '<input type="text" name="video-embed" id="video-embed" style="width: 100%;" value="' . (isset($value) ? $value : "") . '">';
      echo '</label>';
      echo '</div>';
   }

   public function renderFormVideoDescription()
   {
      $value = get_post_meta(get_the_ID(), 'video-description', true);

      echo '<div style="display: flex; flex-wrap: wrap; row-gap: 12px; margin-top: 16px;">';
      echo '<label style="display: block; width: 100%;">';
      echo '<textarea name="video-description" id="video-description" min="1" max="5000" style="width: 100%;">' . (isset($value) ? $value : "") . '</textarea>';
      echo '</label>';
      echo '</div>';
   }

   public function saveVideoDuration($post_id)
   {
      if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
         return;
      }

      if (!current_user_can("edit_post", $post_id)) {
         return;
      }

      if (!isset($_POST["video-duration"]) || empty($_POST["video-duration"]) || is_null($_POST["video-duration"])) {
         return;
      }

      update_post_meta($post_id, "video-duration", sanitize_text_field($_POST["video-duration"]));
   }

   public function saveVideoEmbed($post_id)
   {
      if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
         return;
      }

      if (!current_user_can("edit_post", $post_id)) {
         return;
      }

      if (!isset($_POST["video-embed"]) || empty($_POST["video-embed"]) || is_null($_POST["video-embed"])) {
         return;
      }

      update_post_meta($post_id, "video-embed", sanitize_text_field($_POST["video-embed"]));
   }

   public function saveVideoDescription($post_id)
   {
      if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
         return;
      }

      if (!current_user_can("edit_post", $post_id)) {
         return;
      }

      if (!isset($_POST["video-description"]) || empty($_POST["video-description"]) || is_null($_POST["video-description"])) {
         return;
      }

      update_post_meta($post_id, "video-description", sanitize_text_field($_POST["video-description"]));
   }
}
