<?php
$args = array(
    'post_type' => 'video',
    'order' => 'DESC',
    'posts_per_page' => '1',
);
$getPosts = new WP_Query($args);
if ($getPosts->have_posts()) {
    while ($getPosts->have_posts()) {
        $getPosts->the_post();
        $duracao = get_field("duracao", get_the_ID());
        $imagem = get_field("imagem", get_the_ID());
        ?>
        <div class="card bg-transparent text-white">
            <img src="<?php echo $imagem; ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <div class="container">
                    <p class="card-text">
                        <span class="btn btn-white btn-sm"><?php the_category(' '); ?></span>
                        <span class="btn btn-white-outline btn-sm"><?php echo $duracao; ?>m</span>
                    </p>
                    <h1 class="card-title"><?php the_title(); ?></h1>
                    <p class="card-text">
                        <a class="btn btn-red" href="<?php the_permalink(); ?>">Mais informações</a>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
}