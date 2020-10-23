<?php

$link     = get_permalink(get_the_ID());
$duration = get_video_info(get_the_ID());

?>
<div class="video">
   <div class="video__thumbnail">
      <a href="<?php echo $link ?>">
         <?php
         echo get_the_post_thumbnail(get_the_ID(), array(200, 320));
         ?>
      </a>
   </div>
   <?php
   if ($duration)
   {
   ?>
      <div class="video__duration video-duration">
         <?php echo $duration; ?>m
      </div>
   <?php
   }
   ?>
   <div class="video__name">
      <a href="<?php echo $link ?>">
         <?php the_title(); ?>
      </a>
   </div>
</div>
