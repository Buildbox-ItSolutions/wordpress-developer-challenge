<?php get_header(); ?>

	<main id="main" class="site-main">
        <div class="container">
            <h1 class="archive-title"><?php echo single_cat_title('', false); ?></h1>
            <?php
                $tax = $wp_query->get_queried_object();    
                $term = $tax->slug;
                echo category_description();
                $args = array(
                    'post_type' => 'video',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $term,
                        )
                    ),
                    'order' => 'DESC',
                    'posts_per_page' => '10',
                );
                $getPosts = new WP_Query($args);
                if ($getPosts->have_posts()) {
                    while ($getPosts->have_posts()) {
                        $getPosts->the_post();
                        '<a href="'.the_permalink().'">'.the_title().'</a>';
                    }
                }
            ?>
        </div>
	</main>

<?php get_footer(); ?>