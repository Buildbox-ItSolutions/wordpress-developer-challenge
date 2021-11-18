<?php
  /**
   * template name: Home Page
   * The main template file
   *
   * This is the most generic template file in a WordPress theme
   * and one of the two required files for a theme (the other being style.css).
   * It is used to display a page when nothing more specific matches a query.
   * E.g., it puts together the home page when no home.php file exists.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Wordpress Developer Challenge Theme wp
   */
  
  get_header();
?>
  
  <main>
    <section class="showcase">
      <?php query_posts("post_type=films&posts_per_page=1");
        if(have_posts()):
          while(have_posts()):the_post();
            get_template_part( 'template-parts/post', 'showcase');
          endwhile;
        endif;
      ?>
    </section>
    
    <section class="films">
      <div class="container">
        <?php
          $filmsCategories = get_terms( 'films_taxonomy' );
          foreach ( $filmsCategories as $category ):
            $filmss = new WP_Query(
              array(
                'post_type' => 'films',
                'showposts' => -1,
                'tax_query' => array(
                  array(
                    'taxonomy'  => 'films_taxonomy',
                    'terms'     => array( $category->slug ),
                    'field'     => 'slug'
                  )
                )
              )
            );
            ?>

            <div class="films-card">
              <h2><?php echo $category->name; ?></h2>
              <?php while ($filmss->have_posts()) : $filmss->the_post(); ?>
                <div class="films-card__post">
                  <?php if(get_the_post_thumbnail_url()) { ?>
                    <img class="films-thumbnail"
                         src="<?php the_post_thumbnail_url(); ?>"
                         alt="<?php the_title(); ?>"
                    />
                  <?php } else { ?>
                    <img class="films-thumbnail img-off"
                         src="<?php bloginfo('template_url'); ?>/assets/img/logo.png"
                         alt="<?php the_title(); ?>"
                    />
                  <?php } ?>
                  <div class="content">
                    <h6><?php the_title(); ?></h6>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
            <?php
            $filmss = null;
            wp_reset_postdata();
          endforeach;
        ?>
      </div>
    </section>
  </main>

<?php get_footer();
