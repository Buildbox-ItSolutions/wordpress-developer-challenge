<?php get_header(); ?>

<section class="single-post container">
  <div class="single-post__title conatiner-content">
    <div>
      <span class="c-categorie"><?php the_category(' ') ?></span>
      <span class="c-time"><?php the_field('timer'); ?></span>
    </div>
    <h1><?php the_title(); ?></h1>
  </div>
  <div class="single-post__content">
    <?php the_content(); ?>
  </div>
</section>

<?php get_footer(); ?>