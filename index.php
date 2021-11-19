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
            <h2 class="films-category title"><?php echo $category->name; ?></h2>
            <div class="films-card">
              <?php
                while ($filmss->have_posts()) : $filmss->the_post();
                  get_template_part( 'template-parts/post', 'films');
                endwhile; ?>
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
