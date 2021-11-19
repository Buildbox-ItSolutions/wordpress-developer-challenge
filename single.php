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

      <?php if (get_field('films-embed')) { ?>
        <a data-fancybox href="<?php the_field('films-embed'); ?>">
          <div class="embed-thumbnail" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
            <i class="icon-play"></i>
          </div>
        </a>
      <?php } ?>

      <div class="content-sm">
        <article class="page-description">
          <?php the_content(); ?>
        </article>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
