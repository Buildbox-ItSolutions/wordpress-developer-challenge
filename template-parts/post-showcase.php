<div class="showcase-item" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
  <div class="container">
    <div class="content">
      <div class="badges">
        <?php echo get_the_term_list( get_the_ID(), 'films_taxonomy', ', ' ); ?>
        <span href=""><?php the_field('films-time'); ?></span>
      </div>
      <h2 class="showcase-title"><?php the_title(); ?></h2>
      <a class="button button-primary" href="">Mais informações</a>
    </div>
  </div>
</div>
