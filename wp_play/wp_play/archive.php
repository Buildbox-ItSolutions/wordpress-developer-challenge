<?php get_header(); ?>

<main>
  <!-- Archive Section -->
  <section class="section-archive">
    <div class="category-archive">
      <div class="category-archive__aside">
        <h1 class="heading-secondary serie"><?php esc_html(single_cat_title()); ?></h1>
        <p class="paragraph"><?php echo the_archive_description(); ?></p>
      </div>

      <div class="category-archive__thumb">
        <div class="category-archive__article">
          <?php
          $category = single_cat_title('', false);

          // Define the taxonomy and map lowercase category names to their respective slugs
          $taxonomy = 'video_type';
          $categories_map = array(
            'series' => 'series',
            'documentarios' => 'documentarios',
            'filmes' => 'filmes',
          );

          // Remove accents from the category name and convert it to lowercase for case-insensitive comparison
          $category_lowercase = strtolower(remove_accents($category));

          // Check if the category exists in the categories map
          if (array_key_exists($category_lowercase, $categories_map)) {
            $term_slug = $categories_map[$category_lowercase];

            // Query posts based on the taxonomy and category slug
            $args = array(
              'post_type' => 'videos',
              'tax_query' => array(
                array(
                  'taxonomy' => $taxonomy,
                  'field' => 'slug',
                  'terms' => $term_slug,
                ),
              ),
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) {
              while ($query->have_posts()) {
                $query->the_post();
                // Display the post content using the template part 'content'
                get_template_part('parts/content');
              }
              wp_reset_postdata();
            } else {
              echo "No posts found for the category: " . $category;
            }
          } else {
            echo "Invalid category: " . $category;
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <?php get_template_part('parts/menu-mobile'); ?>
</main>

<?php get_footer(); ?>
