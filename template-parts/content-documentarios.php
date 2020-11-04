
<?php 
$args = array(
'genero'=> 'documentarios',
'posts_per_page' => 20,   
    );
    $the_query = new WP_Query($args);
?>
<section class="slider-section">     
    <div class="container glider-contain">
      <h2 class="text-left taxonomy-title"><?php echo custom_taxonomies_terms_links();?></h2>
      <div  class="row glider2">
        <?php if ($the_query->have_posts() ): while ($the_query->have_posts() ):$the_query->the_post(); ?> 

            <div class="col-lg-2 col-md-6 col-sm-12 item ">        
                  <a href="<?php the_permalink() ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                 <button class="carousel-button"><?php the_field('duracao'); ?></button>
                 <h3 class="carousel-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            </div>  

         <?php endwhile; ?>
    <?php endif; ?>
      </div> <!-- row  -->
      <button class="glider-prev2">&laquo;</button>
      <button class="glider-next2">&raquo;</button>
      <!-- <div id="dots2"></div> -->
    </div>  
 </section>

 

