<?php get_header(); ?>
  <section class="page">
    <div class="container">
      <div class="content">
        <article class="page-description">
          <h1 class="title"><?php single_term_title(); ?></h1>
          <p><?php echo category_description(); ?></p>
        </article>
        <aside class="page-aside">
          <div class="films-card">
            <?php  while(have_posts()): the_post(); ?>
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
            <?php endwhile; ?>
          </div>
        </aside>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
