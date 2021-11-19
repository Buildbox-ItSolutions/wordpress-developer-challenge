<div class="showcase-item" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
  <div class="container">
    <div class="content">
      <div class="badges">
        <?php echo get_the_term_list( get_the_ID(), 'films_taxonomy', ', ' ); ?>
        <?php if (get_field('films-time')) { ?>
          <span><?php the_field('films-time'); ?></span>
        <?php } ?>
      </div>
      <h2 class="showcase-title"><?php the_title(); ?></h2>
      <a class="button button-primary" href="<?php the_permalink(); ?>">Mais informações</a>
    </div>
  </div>
</div>
