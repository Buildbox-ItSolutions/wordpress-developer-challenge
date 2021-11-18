<?php get_header(); ?>

  <?php include_once('sections/hero.php'); ?>

  <section id="movies">

    <div class="grid-container">
      <div class="grid-x">

        <div class="cell small-12">

          <h3>Filmes</h3>

          <div class="movielist">

            <?php 
            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'video' ),
              'nopaging'               => true,
              'posts_per_page'         => '30',
              'tax_query'              => array(
                'relation' => 'AND',
                array(
                  'taxonomy'         => 'tipo',
                  'terms'            => 'filmes',
                  'field'            => 'slug',
                ),
              ),
            );

            // The Query
            $filmeshome = new WP_Query( $args );

            // The Loop
            if ( $filmeshome->have_posts() ) {
              while ( $filmeshome->have_posts() ) {
                $filmeshome->the_post();
            ?>
              <div>

                <a href="<?php the_permalink(); ?>">

                <?php the_post_thumbnail( 'thumbnail-home' );  ?>

                <span class="label"><?php the_field('tempo_de_duracao'); ?>m</span>

                <h4><?php the_title(); ?></h4>

                </a>

              </div>
              <?php }
              } else {
                // no posts found
              }

              // Restore original Post Data
              wp_reset_postdata();
              ?>

          </div>

        </div>

      </div>
    </div>

  </section>

  <section id="docs">
  
    <div class="grid-container">
      <div class="grid-x">

        <div class="cell small-12">

          <h3>Documentários</h3>

          <div class="movielist">

            <?php 
            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'video' ),
              'nopaging'               => true,
              'posts_per_page'         => '30',
              'tax_query'              => array(
                'relation' => 'AND',
                array(
                  'taxonomy'         => 'tipo',
                  'terms'            => 'documentarios',
                  'field'            => 'slug',
                ),
              ),
            );

            // The Query
            $documentariosHome = new WP_Query( $args );

            // The Loop
            if ( $documentariosHome->have_posts() ) {
              while ( $documentariosHome->have_posts() ) {
                $documentariosHome->the_post();
            ?>
              <div>

                <a href="<?php the_permalink(); ?>">

                <?php the_post_thumbnail( 'thumbnail-home' );  ?>

                <span class="label"><?php the_field('tempo_de_duracao'); ?>m</span>

                <h4><?php the_title(); ?></h4>

                </a>

              </div>
              <?php }
              } else {
                // no posts found
              }

              // Restore original Post Data
              wp_reset_postdata();
              ?>

          </div>

        </div>

      </div>
    </div>

  </section>

  <section id="series">

    <div class="grid-container">
      <div class="grid-x">

        <div class="cell small-12">

          <h3>Séries</h3>

          <div class="movielist">

            <?php 
            // WP_Query arguments
            $args = array(
              'post_type'              => array( 'video' ),
              'nopaging'               => true,
              'posts_per_page'         => '30',
              'tax_query'              => array(
                'relation' => 'AND',
                array(
                  'taxonomy'         => 'tipo',
                  'terms'            => 'series',
                  'field'            => 'slug',
                ),
              ),
            );

            // The Query
            $seriesHome = new WP_Query( $args );

            // The Loop
            if ( $seriesHome->have_posts() ) {
              while ( $seriesHome->have_posts() ) {
                $seriesHome->the_post();
            ?>
              <div>

                <a href="<?php the_permalink(); ?>">

                <?php the_post_thumbnail( 'thumbnail-home' );  ?>

                <span class="label"><?php the_field('tempo_de_duracao'); ?>m</span>

                <h4><?php the_title(); ?></h4>

                </a>

              </div>
              <?php }
              } else {
                // no posts found
              }

              // Restore original Post Data
              wp_reset_postdata();
              ?>

          </div>

        </div>

      </div>
    </div>

  </section>

<?php get_footer(); ?>