<?php

require_once('includes/wp_cleaner.php');
require_once('includes/video_type.php');


add_action('wp_enqueue_scripts', 'enqueue_css_js');
function enqueue_css_js()
{

   wp_enqueue_style(
      'fontawesome',
      'https://use.fontawesome.com/releases/v5.15.1/css/all.css'
   );


   wp_enqueue_style(
      'main-style',
      get_bloginfo('stylesheet_url'),
      array('fontawesome')
   );
}


add_action('wp_head', 'head_tags');
function head_tags()
{
?>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/favicon.ico">
   <title>
      <?php

      wp_title('-', true, 'right');
      bloginfo('name');

      ?>
   </title>
<?php
}


function get_video_info($post_id, $key = 'duration')
{
   $extra_info = get_post_meta($post_id, 'video_extra_info', true);

   if (empty($extra_info))
      return false;

   if (!in_array($key, array('duration', 'yt_link', 'video_id')))
      return false;

   $extra_info_a = unserialize($extra_info);

   preg_match('/(v=|e\/)([a-zA-Z0-9_-]{11})/', $extra_info_a['yt_link'], $matches);

   $extra_info_a['video_id'] = isset($matches[2]) ? $matches[2] : false;

   return $extra_info_a[$key];
}
