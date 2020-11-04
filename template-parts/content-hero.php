
<?php
    $new_loop = new WP_Query( array(
    'post_type' => 'video',
    'posts_per_page' => 1,
    'taxonomy' => 'genero' 
    ) );
?>
<section class="hero"> 
    <?php if ( $new_loop->have_posts() ) : ?>
    <?php while ( $new_loop->have_posts() ) : $new_loop->the_post(); ?>
        <?php the_post_thumbnail(); ?>
          <div class="container">           
             <div class="container-row">           
              <button class="movie"><?php echo custom_taxonomies_terms_links();?></button>                        
              
              <button class="time"><?php the_field('duracao'); ?>              
              </button>                     
            </div>
            <div class="info">
                  <h1><?php the_title(); ?></h1>            
                  <a href="<?php the_permalink() ?>" class="show-more">Mais informações</a>              
            </div>            
        </div> 
    <?php endwhile;?>
    <?php else: ?>
    <?php endif; ?>
</section>

