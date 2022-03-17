<article class="c-banner-video">
  <a href="<?php the_permalink(); ?>">
    <div class="image"><?php the_post_thumbnail('post-article'); ?></div>
    <span class="c-time"><?php the_field('timer'); ?></span>
    <h3><?php the_title(); ?></h3>
  </a>
</article>