<?php get_header(); ?>

<main>
  <section class="section-single-post" id="home">
    <div class="single-post">
      <?php
      // Loop for single post
      if (have_posts()) :
        while (have_posts()) :
          the_post();
          ?>
          <article id="post-<?php the_ID(); ?>">
            <!-- Title/Category -->
            <div class="single-post__title">
              <div class="box-btn">
                <?php
                $categories = get_the_terms(get_the_ID(), 'video_type');
                if ($categories && !is_wp_error($categories)) {
                  $first_category = reset($categories);
                  echo '<button class="btn btn--white">' . esc_html($first_category->name) . '</button>';
                }
                ?>
                <button class="btn btn--black">
                  <?php echo get_post_meta($post->ID, 'bx_play_video_duration', true); ?>m
                </button>
              </div>
              <h1 class="heading-primary-modified">
                <?php the_title(); ?></a>
              </h1>
            </div>

            <!-- Cover/Popup -->
            <div class="single-post__video">
              <?php if (has_post_thumbnail()) : ?>
                <img class="single-post__single-cover" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" />
              <?php endif; ?>
              <div class="single-post__button">
                <a href="#popup">
                  <img class="btn-play" src="<?php echo WP_PLAY_BTN_PLAY; ?>" alt="botão play">
                </a>
              </div>

              <div class="popup" id="popup">
                <a href="#" class="popup__close"><strong>&times;</strong></a>
                <div id="player">
                  <!-- YouTube player (it will be replaced) -->
                </div>
              </div>
            </div>

            <!-- Sinopse -->
            <div class="single-post__sinopse paragraph sinopse">
                <?php the_content(); ?>             
            </div>
          </article>
      <?php endwhile;
      endif;
      ?>
    </div>
  </section>

  <?php get_template_part('parts/menu-mobile'); ?>
</main>

<?php get_footer(); ?>
