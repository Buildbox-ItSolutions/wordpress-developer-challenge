<?php get_header(); ?>


  <!--Arquivo-->
<section class="container-archive">
  <div class="aside-archive">
  <h1 class="archive-title"><?echo single_term_title();?></h1>
    <div class="archive-desc"><?php echo the_archive_description();?></div>

    
  </div>
                        
  <div class="itens-archive">
    <div class="wrap-listing">
 <?php      $argument3 = array('post_type'  => 'videos',  );
      $videoarchive = new WP_Query($argument3);
      if ( $videoarchive -> have_posts() ) : while ($videoarchive -> have_posts() ) : $videoarchive -> the_post(); ?>
              <article class="listing-single-video">
                  <?php the_post_thumbnail();?>
                  <button class="button-lenght-carousel">
                    <?php echo get_post_meta($post->ID, 'playtheme_video_lenght', true); ?>
                    </button>
                  <h3 class= "title-videos-carousel" href="<?php the_title(get_the_permalink()); ?>"> <?php echo the_title();?>
                  </h3>
                </article>

                <?php 
endwhile; 
endif; 
wp_reset_postdata(); ?>
</div>
</div>
</section>          
   
