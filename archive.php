<?php get_header(); ?>

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
?>

<main id="main" class="<?php echo $term; ?>">
    <div class="container">
        <h1 class="archive-title text-center py-5"><?php echo single_cat_title('', false); ?></h1>
        <div class="archive-list">
            <?php
                if ($getPosts->have_posts()) {
                    while ($getPosts->have_posts()) {
                        $getPosts->the_post();
                        $duracao = get_field("duracao", get_the_ID());
                        $imagem = get_field("imagem", get_the_ID());
                        ?>
                        <div class="card bg-transparent text-dark" style="width: 33%;">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $imagem; ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            </a>    
                            <div class="card-body px-0">
                                <span class="btn btn-white-outline btn-sm"><?php echo $duracao; ?>m</span>
                                <h3 class="card-title mt-3"><?php the_title(); ?></h3>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>