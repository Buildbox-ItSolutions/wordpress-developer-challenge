<?php get_header(); ?>

<section id="single" class="single-videos">

   <?php
   if (have_posts()) :
      while (have_posts()) : the_post();
         $term = get_the_terms(get_the_ID(), 'videos-category');
         $termLink = get_term_link($term[0]->name, 'videos-category');
   ?>

         <article class="article-container">
            <div class="container d-grid">
               <div class="details-container">
                  <a href="<?php echo $termLink; ?>"><?php echo $term[0]->name; ?></a>
                  <?php if (!empty(get_post_meta(get_the_ID(), 'video-duration', true))) : ?>
                     <span><?php echo get_post_meta(get_the_ID(), 'video-duration', true) . 'm'; ?></span>
                  <?php endif; ?>
               </div>

               <div class="heading-container">
                  <?php the_title('<h1>', '</h1>'); ?>
               </div>
            </div>

            <div class="container">
               <div class="video-container">
                  <?php if (!empty(get_post_meta(get_the_ID(), 'video-embed', true))) : ?>
                     <video class="video" poster="<?php echo get_the_post_thumbnail_url(); ?>">
                        <source src=" <?php echo get_post_meta(get_the_ID(), 'video-embed', true); ?>" type="video/mp4">
                        <span><?php _e('Your browser does not support HTML video.', 'desafio-wp'); ?></span>
                     </video>

                     <?php echo get_post_meta(get_the_ID(), 'video-embed', true); ?>
                  <?php endif; ?>

                  <div class="play-container">
                     <a href="#" class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="53.524" height="53.524" viewBox="0 0 53.524 53.524">
                           <path class="a" d="M27.762,1A26.762,26.762,0,1,0,54.524,27.762,26.793,26.793,0,0,0,27.762,1ZM38.844,29.786l-14.6,9.732a2.432,2.432,0,0,1-3.783-2.024V18.03a2.431,2.431,0,0,1,3.781-2.024l14.6,9.732a2.432,2.432,0,0,1,0,4.048Z" transform="translate(-1 -1)" />
                        </svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="container d-grid">
               <div class="content-container">
                  <?php the_content(); ?>
               </div>
            </div>
         </article>

   <?php
      endwhile;
   endif;
   ?>
   </div>
</section>

<?php get_footer() ?>