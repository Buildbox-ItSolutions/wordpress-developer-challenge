<?php get_header(); ?>

<?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
?>

<main class="main main-top">
    <section>
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </section>
</main>

<?php
        endwhile;
    else :
?>

<main class="main main-top">
    <section>
        <div class="container">
            <p>Nada por aqui!!!</p>
        </div>
    </section>
</main>

<?php
    endif;
?>

<?php get_footer(); ?>