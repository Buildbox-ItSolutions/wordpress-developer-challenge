<?php

get_header();

$feature = get_posts(array(
   'numberposts' => 1,
   'post_type' => 'video'
))[0];

$feature_cat = wp_get_post_terms($feature->ID, 'genres')[0];
$feature_img = get_the_post_thumbnail_url($feature->ID, 'full');
$duration    = get_video_info($feature->ID);

?>
<div class="feature" style="background-image: url(<?php echo $feature_img ?>)">
   <div class="feature__content">
      <div class="container">
         <div class="feature__info video-info">
            <div class="feature__info__cat video-cat">
               <a href="<?php echo get_term_link($feature_cat)  ?>">
                  <?php echo $feature_cat->name ?>
               </a>
            </div>
            <?php
            if ($duration)
            {
            ?>
               <div class="feature__info__duration video-duration">
                  <?php echo $duration ?>m
               </div>
            <?php
            }
            ?>
         </div>

         <div class="feature__title">
            <a href="<?php echo get_permalink($feature->ID) ?>">
               <?php echo $feature->post_title ?>
            </a>
         </div>

         <div class="feature__btn">
            <a href="<?php echo get_permalink($feature->ID) ?>">
               <?php _e('Mais informações', 'buildbox'); ?>
            </a>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="carousels">
      <?php

      $cats = get_categories(array(
         'taxonomy' => 'genres'
      ));

      foreach ($cats as $cat)
      {

      ?>
         <div class="carousels__title"><?php echo $cat->name ?></div>
         <div class="carousels__videos">
            <?php

            $videos = new WP_Query(array(
               'post_type' => 'video',
               'tax_query' => array(
                  array(
                     'taxonomy' => 'genres',
                     'field'    => 'term_id',
                     'terms'    => $cat->term_id
                  )
               )
            ));

            if ($videos->have_posts())
            {
               while ($videos->have_posts())
               {
                  $videos->the_post();

                  get_template_part('templates/video_item');
               }
            }

            wp_reset_postdata();

            ?>
         </div>
      <?php

      }

      ?>
   </div>
</div>
<?php

get_footer();
