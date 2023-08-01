<?php get_header();

/* Start the Loop */
            $args = array('post_type'=> 'videos','posts_per_page' => 1,);
            $new_query_videos = new WP_Query($args);
            if ($new_query_videos -> have_posts() ) : 
              while ($new_query_videos -> have_posts() ) : 
                $new_query_videos -> the_post(); 
              endwhile; 
            endif;
           
          

               ?>
<main>
  <!-- Section to display the header of the article -->
  <section class="section-header">
    <div class="article-box">
      <!-- Display the featured image (thumbnail) of the article -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (has_post_thumbnail()) : ?>
          <img class="article-box__dynamic-cover" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" />
        <?php endif; ?>
      </article>
    </div>

    <div class="article-box__video-data">
      <div class="box__btn">
        <?php
        // Get the video category and display it as a white button
        $categories = get_the_terms(get_the_ID(), 'video_type');
        if ($categories && !is_wp_error($categories)) {
          $first_category = reset($categories);
          echo '<button class="btn btn--white">' . esc_html($first_category->name) . '</button>';
        }
        ?>
        <!-- Get the video duration and display it as a black button -->
        <button class="btn btn--black">
          <?php
          $duration_video = get_post_meta(get_the_ID(), 'bx_play_video_duration', true);
          echo esc_html($duration_video) . 'm';
          ?>
        </button>
      </div>

      <div class="article-box__title-area">
        <!-- Display the title of the article as a link to the single post -->
        <a href="<?php the_permalink(); ?>">
          <h1 class="heading-primary"><?php the_title(); ?></h1>
        </a>
        <!-- Display a button to "More Information" as a link to the single post -->
        <a href="<?php the_permalink(); ?>">
          <button class="btn btn--red-desktop">Mais Informações</button>
        </a>
      </div>
    </div>
  </section>

  <?php wp_reset_postdata(); // Reset the first loop?>

  <!-- Include a template part to display a categories carousel -->
  <?php get_template_part('parts/categories-carousel'); ?>

  <!-- Include a template part to display the mobile menu -->
  <?php get_template_part('parts/menu-mobile'); ?>
</main>

<?php get_footer(); ?>
