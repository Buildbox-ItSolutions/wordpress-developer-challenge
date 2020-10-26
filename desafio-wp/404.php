<?php get_header();?>

    <section class="not-found" >
       <div class="container">
           <div class="grid-12">
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       			<?php the_content();?>
             <?php endwhile; else: ?>
              <p><?php _e('Ops'); ?></p>
              <span><?php _e('404 - PAGE NOT FOUND'); ?></span>
             <?php endif; ?>
           </div>
       </div>
    </section>


<?php get_footer();?>
