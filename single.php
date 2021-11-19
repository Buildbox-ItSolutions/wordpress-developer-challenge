<?php get_header(); ?>
  <section class="page">
    <div class="container">
      <div class="content-sm">
        <div class="badges">
          <?php echo get_the_term_list( get_the_ID(), 'films_taxonomy' ); ?>
          <?php if (get_field('films-time')) { ?>
            <span><?php the_field('films-time'); ?></span>
          <?php } ?>
        </div>
        <h1 class="title"><?php the_title(); ?></h1>
      </div>
      
      <div class="page-embed">
        <?php the_field('films-embed'); ?>
      </div>

      <div class="content-sm">
        <article class="page-description">
          <?php the_content(); ?>
        </article>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
