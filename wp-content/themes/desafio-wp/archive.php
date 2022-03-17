<?php get_header(); ?>

<section class="page-cat container">
  <div class="page-cat__text">
    <div class="sticky">
      <h1><?php the_archive_title(); ?></h1>
      <?php the_archive_description(); ?>
    </div>
  </div>

  <div class="page-cat__list">
    <?php if(have_posts()): while(have_posts()): the_post(); 
      get_template_part( 'template-parts/content'); 
    endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>