<?php get_header() ?>

<section>
    <div class="container">
        <?php
        // Pega a taxonomia
        $categoria_video = get_terms('categoria-video');
        foreach ($categoria_video as $categoria) :
            wp_reset_postdata();
            // Argumentos para a query
            $args = 
                array('post_type' => 'video', 'tax_query' => array(
                    array('taxonomy' => 'categoria-video', 'field' => 'slug', 'terms' => $categoria->slug),
                )
            );
            // Guarda os argumentos em um loop 
            $videos = new WP_Query($args) ;
            // Unicas opções que serão exibidas no loop da HOME
            $home_loop = array("series", "documentarios", "filmes");
            // Exibe somente as opções definidas dentro do loop da HOME
            foreach ($home_loop as $video) : ?>
                <?php if ($videos->have_posts() && $categoria->slug === $video) : ?>
                    <div class="section">
                        <h2 class="section__header section__header--big"><a href="<?= home_url() . "/" . $categoria->taxonomy . "/" .  $categoria->slug ?>"><?= $categoria->name ?></a></h2>
                        <div class="section__slider js-slider">
                        <?php while ($videos->have_posts()) : $videos->the_post() ?>
                            <!-- Estrutura do post -->
                            <a href="<?php the_permalink() ?>" class="section__slider--item">
                                <?php if (has_post_thumbnail()) : // Verifica se tem thumbnail ?>
                                    <img src="<?= get_the_post_thumbnail_url(get_the_ID(), "video-thumbnails") ?>" class="section__thumbnail">
                                <?php else : ?>
                                    <img src="<?= get_template_directory_uri() ?>/assets/img/default-thumbnail.png" class="section__thumbnail">
                                <?php endif ?>
                                <?php if (get_post_meta( $post->ID, "video_duracao", true )) : // Verifica se existe tempo de duração ?>
                                    <p><span class="btn btn__small btn__small"><?= get_post_meta( $post->ID, "video_duracao", true ) ?></span></p>
                                <?php endif ?>
                                <h3 class="section__header section__header--small"><?php the_title() ?></h3>
                            </a>
                        <?php endwhile ?>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach;
        endforeach ?>
    </div>
</section>

<?php get_footer() ?>