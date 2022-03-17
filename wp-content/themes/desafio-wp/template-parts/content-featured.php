<article class="featured">
  <?php the_post_thumbnail('post-featured'); ?>
  <div class="featured__text container">
    <div>
      <span class="c-categorie"><?php the_category(' '); ?></span>
      <span class="c-time"><?php the_field('timer'); ?></span>
    </div>
    <h1><?php the_title(); ?></h1>
    <a class="c-button" href="<?php the_permalink(); ?>">Assistir</a>
  </div>
</article>