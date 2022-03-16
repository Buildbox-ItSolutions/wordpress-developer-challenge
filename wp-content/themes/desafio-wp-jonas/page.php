<?php get_header(); ?>

<?php

$args = [
   'post_type' => 'videos',
   'post_status' => 'publish',
   'posts_per_page' => 1,
   'order' => 'DESC',
   'tax_query' => [
      [
         'taxonomy' => 'videos-category',
         'field' => 'slug',
         'terms' => [
            'filmes'
         ],
      ]
   ]
];

$loop = new WP_Query($args);

if ($loop->have_posts()) :
   while ($loop->have_posts()) : $loop->the_post();
      $term = get_the_terms(get_the_ID(), 'videos-category');
      $termLink = get_term_link($term[0]->name, 'videos-category');
?>
      <section id="hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
         <div class="container d-grid align-items-center">
            <div class="article-container">
               <div class="details-container">
                  <a href="<?php echo $termLink; ?>"><?php echo $term[0]->name; ?></a>
                  <span><?php echo get_post_meta(get_the_ID(), 'video-duration', true) . 'm'; ?></span>
               </div>

               <div class="heading-container">
                  <?php the_title('<h1>', '</h1>'); ?>
               </div>

               <div class="button-container">
                  <a href="<?php the_permalink(); ?>" class="button"><?php _e('Mais informações', 'desafio-wp'); ?></a>
               </div>
            </div>
         </div>
      </section>

<?php
   endwhile;
endif;
wp_reset_postdata();
?>

<section id="movies" class="videos">
   <div class="container">
      <div class="heading-container">

         <?php

         $termLink = get_term_link('filmes', 'videos-category');

         if (!isset($termLink->errors)) :
         ?>

            <a href="<?php echo $termLink; ?>">
               <h2><?php _e('Filmes', 'desafio-wp') ?></h2>
            </a>

         <?php
         endif;
         ?>

      </div>

      <div class="articles-container movies-container owl-carousel">
         <?php

         $args = [
            'post_type' => 'videos',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'order' => 'ASC',
            'tax_query' => [
               [
                  'taxonomy' => 'videos-category',
                  'field' => 'slug',
                  'terms' => [
                     'filmes'
                  ],
               ]
            ]
         ];

         $loop = new WP_Query($args);

         if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post();
         ?>

               <a href="<?php the_permalink(); ?>">
                  <article class="article-container movie-container">
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
                        <h3><?php the_title(); ?></h3>
                     </div>
                  </article>
               </a>

         <?php
            endwhile;
            wp_reset_postdata();
         endif;
         ?>
      </div>
   </div>
</section>

<section id="documentaries" class="videos">
   <div class="container">
      <div class="heading-container">
         <div class="heading-container">

            <?php

            $termLink = get_term_link('documentarios', 'videos-category');

            if (!isset($termLink->errors)) :
            ?>

               <a href="<?php echo $termLink; ?>">
                  <h2><?php _e('Documentários', 'desafio-wp') ?></h2>
               </a>

            <?php
            endif;
            ?>

         </div>
      </div>

      <div class="documentary-container">
         <div class="articles-container documentaries-container owl-carousel">
            <?php

            $args = [
               'post_type' => 'videos',
               'post_status' => 'publish',
               'posts_per_page' => 9,
               'order' => 'ASC',
               'tax_query' => [
                  [
                     'taxonomy' => 'videos-category',
                     'field' => 'slug',
                     'terms' => [
                        'documentarios'
                     ],
                  ]
               ]
            ];

            $loop = new WP_Query($args);

            if ($loop->have_posts()) :
               while ($loop->have_posts()) : $loop->the_post();
            ?>

                  <a href="<?php the_permalink(); ?>" class="swiper-slide">
                     <article class="article-container documentary-container">
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
                           <h3><?php the_title(); ?></h3>
                        </div>
                     </article>
                  </a>

            <?php
               endwhile;
               wp_reset_postdata();
            endif;
            ?>
         </div>
      </div>
   </div>
</section>

<section id="series" class="videos">
   <div class="container">
      <div class="heading-container">

         <?php

         $termLink = get_term_link('series', 'videos-category');

         if (!isset($termLink->errors)) :
         ?>

            <a href="<?php echo $termLink; ?>">
               <h2><?php _e('Séries', 'desafio-wp') ?></h2>
            </a>

         <?php
         endif;
         ?>

      </div>

      <div class="serie-container">
         <div class="articles-container series-container owl-carousel">
            <?php

            $args = [
               'post_type' => 'videos',
               'post_status' => 'publish',
               'posts_per_page' => 9,
               'order' => 'ASC',
               'tax_query' => [
                  [
                     'taxonomy' => 'videos-category',
                     'field' => 'slug',
                     'terms' => [
                        'series'
                     ],
                  ]
               ]
            ];

            $loop = new WP_Query($args);

            if ($loop->have_posts()) :
               while ($loop->have_posts()) : $loop->the_post(); ?>

                  <a href="<?php the_permalink(); ?>" class="swiper-slide">
                     <article class="article-container serie-container">
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
                           <h3><?php the_title(); ?></h3>
                        </div>
                     </article>
                  </a>

            <?php
               endwhile;
               wp_reset_postdata();
            endif;
            ?>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>