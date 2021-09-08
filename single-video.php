<?php get_header(); ?>

<main id="single-video" class="main">
    <article>
        <div class="container-single">
            <div class="category">
                <?php
                    $categories = get_the_category();
                    echo esc_html( $categories[0]->name )
                ?>
            </div>
            <div class="video-time">
                <?php the_field('tempo_do_video'); ?>m
            </div>
            <h1 class="single-title"><?php the_title() ?></h1>
        </div>
        <div class="container">
            <div class="video-container">
                <?php the_field('link_do_video'); ?>
            </div>
        </div>
        <div class="container-single single-content">
            <?php the_field('descricao'); ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>