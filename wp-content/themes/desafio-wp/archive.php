<?php

get_header();

?>
<div class="archive-container container">
   <div class="archive-info">
      <div class="archive-info__sticky">
         <h1 class="archive-info__title">
            <?php

            $archive_title    = single_term_title('', false);

            echo $archive_title;

            ?>
         </h1>
         <div class="archive-info__description">
            <?php

            $archive_subtitle = get_the_archive_description();

            echo $archive_subtitle;

            ?>
         </div>
      </div>
   </div>
   <div class="archive-videos">
      <?php

      if (have_posts())
      {
         while (have_posts())
         {
            the_post();

            get_template_part('templates/video_item');
         }
      }

      ?>
   </div>
</div>
<?php

get_footer();
