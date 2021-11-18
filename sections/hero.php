 <!-- hero -->
 <?php
  // WP_Query arguments
  $args = array(
    'post_type'              => array( 'video' ),
    'posts_per_archive_page' => '1',
    'posts_per_page'         => '1',
  );

  // The Query
  $featured = new WP_Query( $args );

  // The Loop
  if ( $featured->have_posts() ) {
    while ( $featured->have_posts() ) {
      $featured->the_post();
  ?>
  <section id="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(1920,1000), true, '' ); echo $src[0]; ?>'); background-size: cover;">

    <div class="grid-container">

      <div class="grid-x">

        <div class="cell small-12 large-6">

          <span class="label"><?php echo get_the_term_list( $post->ID, 'tipo', '', '', '' ) ?></span> <span class="label label-alt"><?php the_field('tempo_de_duracao'); ?>m</span>

          <h2><?php the_title(); ?></h2>

          <a href="<?php the_permalink(); ?>" class="button" title="Veja mais sobre <?php the_title(); ?>">Mais informações</a>

        </div>

      </div>
    </div>

  </section>
  <?php }
  } else { ?>
  <section id="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(1920,1000), true, '' ); echo $src[0]; ?>'); background-size: cover;">

    <div class="grid-container">

      <div class="grid-x">

        <div class="cell small-12 large-6">

          <h2>Nenhum filme cadastrado</h2>

        </div>

      </div>

    </div>

  </section>
  <?php }
  // Restore original Post Data
  wp_reset_postdata();
  ?>