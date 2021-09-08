<?php get_header(); ?>

<main class="main">
    <section class="top">
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                        $argsPrimary = array(
                            'post_type'     => 'video',
                            'posts_per_page' => 3,
                            'category_name' => 'filmes, documentarios, series',
                        );
                        $queryPrimary = new WP_Query( $argsPrimary );

                        if ( $queryPrimary->have_posts() ): 
                            while($queryPrimary->have_posts()): 
                                $queryPrimary->the_post();
                    ?>
                    <?php
                        $image = get_field('imagem_de_capa');
                    ?>
                    <li class="header-top splide__slide"
                        style="background-image: url(<?= esc_url($image['url']); ?>);">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="center-content">
                                <div class="top-content">
                                    <div class="category">
                                        <?php
                                        $categories = get_the_category();
                                        echo esc_html( $categories[0]->name )
                                        ?>
                                    </div>
                                    <div class="video-time">
                                    <?php the_field('tempo_do_video'); ?>m
                                    </div>
                                    <h1 class="top-title"><?php the_title() ?></h1>
                                    <a class="btn" href="<?php the_permalink() ?>">Mais informações</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="container">
        <h3 class="topper">Filmes</h3>
        <div class="splide" id="thumb01">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                        $argsFilmes = array(
                            'post_type'         => 'video',
                            'posts_per_page'    => 20,
                            'category_name'     => 'filmes',
                        );
                        $queryFilmes = new WP_Query( $argsFilmes );

                        if ( $queryFilmes->have_posts() ): 
                            while($queryFilmes->have_posts()): 
                                $queryFilmes->the_post();
                    ?>
                    <?php
                        $thumbFilme = get_field('capinha');
                    ?>
                    <li class="splide__slide">
                        <a href="<?php the_permalink() ?>">
                            <div class="carrocel">
                                <div class="video-cover">
                                    <img class="thumb-img"
                                        src="<?= esc_url($thumbFilme['url']); ?>"
                                        alt="capa do filme" width="248" height="387">
                                    <div class="video-time"><?php the_field('tempo_do_video'); ?>m</div>
                                    <h4 class="thumb-title"><?php the_title() ?></h4>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                            endwhile;
                        else:
                            echo 'Nenhum vídeo nesta categoria!';
                        endif;
                        wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="container top2">
        <h3 class="topper">Documentários</h3>
        <div class="splide" id="thumb02">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                        $argsCocumentarios = array(
                            'post_type'         => 'video',
                            'posts_per_page'    => 20,
                            'category_name'     => 'documentarios',
                        );
                        $queryDocumentarios = new WP_Query( $argsCocumentarios );

                        if ( $queryDocumentarios->have_posts() ): 
                            while($queryDocumentarios->have_posts()): 
                                $queryDocumentarios->the_post();
                    ?>
                    <?php
                        $thumbDocumentarios = get_field('capinha');
                    ?>
                    <li class="splide__slide">
                        <a href="<?php the_permalink() ?>">
                            <div class="carrocel">
                                <div class="video-cover">
                                    <img class="thumb-img"
                                        src="<?= esc_url($thumbDocumentarios['url']); ?>"
                                        alt="capa do filme" width="248" height="387">
                                    <div class="video-time"><?php the_field('tempo_do_video'); ?>m</div>
                                    <h4 class="thumb-title"><?php the_title() ?></h4>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                            endwhile;
                        else:
                            echo 'Nenhum vídeo nesta categoria!';
                        endif;
                        wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="container" style="margin-top: 48px;">
        <h3 class="topper">Séries</h3>
        <div class="splide" id="thumb03" style="width: 100%;">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                        $argsSeries = array(
                            'post_type'         => 'video',
                            'posts_per_page'    => 20,
                            'category_name'     => 'series',
                        );
                        $querySeries = new WP_Query( $argsSeries );

                        if ( $querySeries->have_posts() ): 
                            while($querySeries->have_posts()): 
                                $querySeries->the_post();
                    ?>
                    <?php
                        $thumbSeries = get_field('capinha');
                    ?>
                    <li class="splide__slide">
                        <a href="<?php the_permalink() ?>">
                            <div class="carrocel">
                                <div class="video-cover">
                                    <img class="thumb-img"
                                        src="<?= esc_url($thumbSeries['url']); ?>"
                                        alt="capa do filme" width="248" height="387">
                                    <div class="video-time"><?php the_field('tempo_do_video'); ?>m</div>
                                    <h4 class="thumb-title"><?php the_title() ?></h4>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>