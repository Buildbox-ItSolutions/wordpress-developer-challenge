<?php get_header();?>

    <section class="banner position-relative overflow-hidden">

      <?php
      $args = array(
      'posts_per_page' => 1,
      'post__in'  => get_option( 'sticky_posts' ),
      'ignore_sticky_posts' => 1
  );
  $query = new WP_Query( $args );

  $myposts = get_posts( $args );
  foreach ( $myposts as $post ) {
    setup_postdata( $post );
    $tempoVideo = get_post_meta( get_the_ID(), 'tempo_video', true);
    $urlVideo = get_post_meta( get_the_ID(), 'url_video', true);
    $post_id = get_the_ID(); // or use the post id if you already have it
$category_object = get_the_category($post_id);
$category_name = $category_object[0]->name;
  ?>



    <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail('custom-thumbnail-size', array('class' => 'img-fluid destaque', 'alt' => the_title_attribute()));
          }
    ?>

      <div class="tags">
        <span class="badge bg-light text-dark me-3"><?=$category_name?></span>
        <span class="badge border-light text-light mt-3"><?=$tempoVideo?>m</span>
      </div>

      <h1 class="mt-3"><?php the_title(); ?></h1>

      <a href="<?php the_permalink(); ?>" type="button" class="btn btn-danger btn-assistir-destaque" title="<?php the_title_attribute(); ?>">Assistir</a>
      <?php }  ?>
    </section>

    <?php

    $categories = get_categories();
    foreach ($categories as $key => $value) {
      ?>

      <section class="categoria mt-2">
        <h2><a href="<?=get_category_link($value->term_id)?>"><?=$value->name?></a></h2>
        <nav>
          <ul class="nav wrapper">

            <?php
            $args = array('category' => $value->term_id );

            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) {
              setup_postdata( $post );
              $tempoVideo = get_post_meta( get_the_ID(), 'tempo_video', true);
	            $urlVideo = get_post_meta( get_the_ID(), 'url_video', true);
            ?>

              <li class="nav-item">
                <div class="capa overflow-hidden">

                  <a href="<?php the_permalink()?>">
                    <?php
  if (has_post_thumbnail()) {
    the_post_thumbnail('custom-thumbnail-size', array('class' => 'img-fluid mx-auto destaque', 'alt' => the_title_attribute()));
  }?>
                  </a>
                </div>
                <span class="badge border-light text-light mt-3"><?=$tempoVideo ?>m</span>
                <h3 class="mt-3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

              </li>
            <?php }
            ?>

          </ul>
        </nav>

      </section>

      <?php
    }


    ?>

<?php get_footer();?>
