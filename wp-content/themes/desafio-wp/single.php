<?php

get_header();

if (have_posts())
{

   the_post();

   $duration = get_video_info(get_the_ID());
   $video_id = get_video_info(get_the_ID(), 'video_id');

?>
   <div class="single-video">
      <div class="single-head small-container">
         <div class="single-info video-info">
            <div class="single-info__cat video-cat">
               <?php the_terms(get_the_ID(), 'genres'); ?>
            </div>
            <?php
            if ($duration)
            {
            ?>
               <div class="single-info__duration video-duration">
                  <?php echo $duration; ?>m
               </div>
            <?php
            }
            ?>
         </div>
         <h1 class="single-title">
            <?php the_title(); ?>
         </h1>
      </div>
      <?php
      if ($video_id)
      {
      ?>
         <div class="single-video__embed container">
            <iframe class="video-embed" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_id ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
      <?php
      }
      ?>
      <div class="single-video__description small-container">
         <?php the_content(); ?>
      </div>
   </div>
<?php
}

get_footer();
