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
            <?php
              while(have_posts()): the_post();
                get_template_part( 'template-parts/post', 'films');
              endwhile; ?>
          </div>
        </aside>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
