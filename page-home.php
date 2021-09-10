<?php
// Template Name: Home
?>
<?php get_header(); ?>

<?php 
    $post_type = 'meus_filmes';
    $post_per_page = 12;
    $order = 'DESC';
    $id =  the_ID();
?>

<?php $args = array(
    'post_type' => $post_type,
    'order' => $order,
    'posts_per_page' => '1',
);
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <header class="container" style="background-image:url('<?php the_field('thumbnail', $id) ?>')">
            <div class="header-destaque">
                <span class="btn-small"><?php echo strip_tags (get_the_term_list( $id, 'categorias')); ?></span>
                <a href="<?php the_permalink(); ?>" class="btn-minutes"><?php the_field('duracao', $id); ?>m</a>
                <div>
                    <a href="<?php the_permalink(); ?>">
                        <h1><?php the_title(); ?></h1>
                    </a>
                    <a href="<?php the_permalink(); ?>" class="btn">Mais Informações</a>
                </div>
        <?php endwhile;
else : endif; ?>
            </div>
        </header>
        <section class="container" data-content="section">
            <a href="./filmes.html">
                <h2>Filmes</h2>
            </a>
            <div class="flex-section" data-content="content">
                <?php $args = array(
                    'post_type' => $post_type,
                    'order' => $order,
                    'categorias' => 'filmes',
                    'posts_per_page' => $posts_per_page,
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="post" data-content="post">
                            <div>
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_field('thumbnail', $id) ?>" alt=""></a>
                            </div>
                            <div>
                                <span class="btn-minutes"><?php the_field('duracao', $id); ?>m</span>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                        </div>
                <?php endwhile;
                else : endif; ?>
            </div>
        </section>
        <section class="container">
            <a href="./documentarios.html">
                <h2>Documentários</h2>
            </a>
            <div class="flex-section" data-content="content">
                <?php $args = array(
                    'post_type' => $post_type,
                    'order' => $order,
                    'categorias' => 'documentarios',
                    'posts_per_page' => $posts_per_page,
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="post">
                            <div>
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_field('thumbnail', $id) ?>" alt=""></a>
                            </div>
                            <div>
                                <span class="btn-minutes"><?php the_field('duracao', $id); ?>m</span>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                        </div>
                <?php endwhile;
                else : endif; ?>
            </div>
        </section>
        <section class="container" data-content="section">
            <a href="./series.html">
                <h2>Séries</h2>
            </a>
            <div class="flex-section" data-content="content">
                <?php $args = array(
                    'post_type' => $post_type,
                    'order' => $order,
                    'categorias' => 'series',
                    'posts_per_page' => $posts_per_page,
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="post">
                            <div>
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_field('thumbnail', $id) ?>" alt=""></a>
                            </div>
                            <div>
                                <span class="btn-minutes"><?php the_field('duracao', $id); ?>m</span>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                        </div>
                <?php endwhile;
                else : endif; ?>
            </div>
        </section>

        <?php get_footer(); ?>