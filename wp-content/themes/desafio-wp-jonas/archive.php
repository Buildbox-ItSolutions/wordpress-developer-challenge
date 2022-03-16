<?php get_header(); ?>

<section id="archive">
   <div class="container d-grid">
      <div class="info-container">
         <div class="heading-container">
            <?php the_archive_title('<h1>', '</h1>'); ?>
         </div>

         <div class="text-container">
            <?php the_archive_description(); ?>
         </div>
      </div>

      <div class="articles-container d-grid">
         <?php
         if (have_posts()) :
            while (have_posts()) : the_post();
         ?>
               <a href="<?php the_permalink(); ?>">
                  <article class="article-container">
                     <?php if (has_post_thumbnail()) : ?>
                        <div class="thumbnail-container">
                           <?php the_post_thumbnail(); ?>
                        </div>
                     <?php endif; ?>

                     <div class="duration-container">
                        <?php if (!empty(get_post_meta(get_the_ID(), 'video-duration', true))) : ?>
                           <p><?php echo get_post_meta(get_the_ID(), 'video-duration', true) . 'm'; ?></p>
                        <?php endif; ?>
                     </div>

                     <div class="heading-container">
                        <h2><?php the_title(); ?></h2>
                     </div>
                  </article>
               </a>
         <?php
            endwhile;
         endif;
         ?>
      </div>
   </div>
</section>

<?php get_footer(); ?>