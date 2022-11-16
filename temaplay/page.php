<?get_header(); ?>

       <!--the last post-->
      <div>  
        <?php 
            $args = array(
            'post_type'      => 'videos',
            'posts_per_page' => 1,);
        
            $new_query_videos = new WP_Query($args);
                        if ( $new_query_videos -> have_posts() ) : while ($new_query_videos -> have_posts() ) : $new_query_videos -> the_post(); ?>
            </div>

        <?php  get_template_part('parts/content', get_post_format()); ?>           
        
                <?php endwhile; endif; 
                wp_reset_postdata();?>

        </main>
</div> 
<div class="category-lists">
<!-- categoria Filmes-->
<div><h2 class="category-subtitle"><a href="/index.php?cat=1">Filmes</a></h2></div>
 <div class="thumb-carousel">
       <?php      $argument = array(
            'post_type'      => 'videos',
            'category_name' => 'filmes',);
            $filmes = new WP_Query($argument);
            if ( $filmes -> have_posts() ) : while ($filmes -> have_posts() ) : $filmes -> the_post(); ?>
               
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
wp_reset_postdata();?>
 </div> 

<!-- categoria Séries-->

<div class="subtitle-div" ><h2 class="category-subtitle"><a href="/index.php?cat=3">Séries</a></h2>
<div class="thumb-carousel">
 <?php      $argument1 = array(
            'post_type'      => 'videos',
            'category_name' => 'series',);
            $series = new WP_Query($argument1);
            if ( $series -> have_posts() ) : while ($series -> have_posts() ) : $series -> the_post(); ?>
           
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
wp_reset_postdata();?>
</div>   

<!-- categoria Documentários-->

<div><h2 class="category-subtitle"><a href="/index.php?cat=4">Documentários</a></h2>
<div class="thumb-carousel"> 
 <?php      $argument2 = array(
      'post_type'      => 'videos',
      'category_name' => 'documentarios',);
      $documentarios = new WP_Query($argument2);
      if ( $documentarios -> have_posts() ) : while ($documentarios -> have_posts() ) : $documentarios -> the_post(); ?>
                
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
wp_reset_postdata();?>
</div> 
</div>


<?php 

get_footer();?>
