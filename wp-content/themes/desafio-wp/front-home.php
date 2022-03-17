<?php 
// Template Name: Home
get_header(); 
$path_url = get_template_directory_uri() . '/assets';
?>

<!-- Post Featured -->
<section>
  <?php 
  $featured = new WP_Query('post_type=post&posts_per_page=1');
  if($featured->have_posts()) : while($featured->have_posts()) : $featured->the_post();
    get_template_part('template-parts/content', 'featured');
  endwhile; wp_reset_postdata(); endif;
  ?>
</section>

<!-- Carousel Filmes -->
<section class="carousel cat-filmes container">
  <a href="/categoria/filmes">
    <h2>Filmes</h2>
  </a>
  <div class="cat-filmes__carousel swiper">
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php 
      $carousel_cat_filmes = new WP_Query('post_type=post&posts_per_page=8&cat=4');
      if($carousel_cat_filmes->have_posts()): while($carousel_cat_filmes->have_posts()): $carousel_cat_filmes->the_post(); 
      ?>
        <div class="swiper-slide">
          <?php get_template_part('template-parts/content') ?>
        </div>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>

<!-- Carousel Documentários -->
<section class="carousel cat-doc container">
  <a href="/categoria/documentarios">
    <h2>Documentários</h2>
  </a>
  <div class="cat-doc__carousel swiper">
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php 
      $carousel_cat_doc = new WP_Query('post_type=post&posts_per_page=8&cat=5');
      if($carousel_cat_doc->have_posts()) : while($carousel_cat_doc->have_posts()) : $carousel_cat_doc->the_post();
      ?>
      <div class="swiper-slide">
        <?php get_template_part('template-parts/content') ?>
      </div>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>

<!-- Carousel Séries -->
<section class="carousel cat-series container">
  <a href="/categoria/series">
    <h2>Séries</h2>
  </a>
  <div class="cat-series__carousel swiper">
    <div class="swiper-wrapper">
      <?php 
      $carousel_cat_series = new WP_Query('post_type=post&posts_per_page=8&cat=6');
      if($carousel_cat_series->have_posts()) : while($carousel_cat_series->have_posts()) : $carousel_cat_series->the_post();
      ?>
      <!-- Slides -->
      <div class="swiper-slide">
        <?php get_template_part('template-parts/content') ?>
      </div>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>