<?php get_header(); ?>


  <!--Arquivo-->
<section class="container-archive">
  <div class="aside-archive">
  <h1 class="archive-title"><?php single_cat_title() ?></h1>
    <div class="archive-desc"><?php echo the_archive_description();?></div>

    
  </div>
                        
  <div class="itens-archive">
    <div class="wrap-listing">
 <?php      $argument3 = array('post_type'  => 'videos',);
      $videoarchive = new WP_Query($argument3);
     if ( $videoarchive -> have_posts() ) : while ($videoarchive -> have_posts() ) : $videoarchive -> the_post(); ?>
               <article class="listing-single-video">
               <a href="<?php the_permalink();?>"><? the_post_thumbnail();?> </a>
                  <button class="button-lenght-carousel">
                    <?php echo get_post_meta($post->ID, 'playtheme_video_lenght', true); ?>
                    </button>
                  <h3 class= "title-videos-carousel" > <a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                </article>

                <?php 
endwhile; 
endif; 
wp_reset_postdata(); ?>
</div>
</div>
</section>    
<?php get_footer()?>      
   
