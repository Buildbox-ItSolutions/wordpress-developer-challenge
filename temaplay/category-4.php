<?php get_header(); ?>


  <!--Arquivo-->
<section class="container-archive">
  <div class="aside-archive">
  <h1 class="archive-title"><?php single_cat_title() ?></h1>
    <div class="archive-desc"><?php echo the_archive_description();?></div>

    
  </div>
                        
  <div class="itens-archive">
    <div class="wrap-listing">
 <?php     
 
    
      $argument5 = array('post_type'  => 'videos',
                          'cat' => '4' ,); //series
      
      $videoarchive3 = new WP_Query($argument5);

      if ( $videoarchive3 -> have_posts() ) :
        while ($videoarchive3 -> have_posts() ) : 
       $videoarchive3 -> the_post(); ?> ?>


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
<!--categorias mobile-->
<div class="category-mobile">
          
<div class="icons-car1"><a href="/index.php?cat=1">
            <img class="icon-carousel1" src="http://desafioplay.local/wp-content/uploads/2022/11/Caminho-8@2x.png">
            <p >Filmes</p></a>
          </div>
  
         
          <div class="icons-car2"><a href="/index.php?cat=4">
            <img class="icon-carousel" src="http://desafioplay.local/wp-content/uploads/2022/11/1.png">
            <p id="doc1">Documentários</p></a>
          </div>
  
         
          <div class="icons-car3"><a href="/index.php?cat=3">
            <img class="icon-carousel" src="http://desafioplay.local/wp-content/uploads/2022/11/Grupo-62@2x.png">
            <p>Séries</p></a>
          </div>
</div>
</section>    
<?php get_footer()?>      
   
