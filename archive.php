<?php get_header();?>

<?php 
  $args = array(
  'post_type'=> 'video'
  );
  $the_query = new WP_Query($args);
  ?>

<section class="archive">
  <div class="container my-5">   
    <!-- Page Features -->
    <div class="row text-center">   

      <div class="col-lg-6 col-md-6 mb-4">
          <div class="info">
          <h1 class="archive-title"><?php echo get_the_archive_title();?></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean scelerisque sed felis eu commodo.
                  Duis dapibus eu arcu varius ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit.              
                </p>
          </div>
      </div>
      <!-- <div class="col-lg-4 col-md-6 mb-4"> -->

      <div class="col-lg-6 col-md-6 mb-4">
          <div class="row category">
          <?php if ($the_query->have_posts() ): while ($the_query->have_posts() ):$the_query->the_post(); ?>
                <div class="col-lg-4 col-sm-12 item">                  
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                <button class="carousel-button"><?php the_field('duracao'); ?></button>
                    <h3 class="carousel-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                </div><!-- item --> 
          <?php endwhile; ?>
      <?php endif; ?>                        
          </div><!-- row -->            
      </div><!-- col-lg-6 col-md-6 mb-4 -->      

    </div>  <!-- /.row -->  
  </div>  <!-- /.container -->
</section><!-- /.section -->
<?php get_footer();?>