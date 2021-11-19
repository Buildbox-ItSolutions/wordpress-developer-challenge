<a href="<?php the_permalink(); ?>">
  <div class="films-post">
    <?php if(get_the_post_thumbnail_url()) { ?>
      <img class="films-thumbnail"
           src="<?php the_post_thumbnail_url(); ?>"
           alt="<?php the_title(); ?>"
      />
    <?php } else { ?>
      <img class="films-thumbnail img-none"
           src="<?php bloginfo('template_url'); ?>/assets/img/logo.png"
           alt="<?php the_title(); ?>"
      />
    <?php } ?>
    <div class="films-content">
      <div class="badges">
        <?php if (get_field('films-time')) { ?>
          <span><?php the_field('films-time'); ?></span>
        <?php } ?>
      </div>
      <h5 class="films-title"><?php the_title(); ?></h5>
    </div>
  </div>
</a>
