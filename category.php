<?php get_header(); ?>

    <main id="categorie" class="main">
        <article class="container">
            <div class="g-2">
                <section>
                    <div class="category-content">
                        <h3 class="topper"><?= single_cat_title('' , true ) ?></h3>
                        <?php 
                            $catID = get_the_category();
                            echo category_description( $catID[0] );
                        ?>
                    </div>
                </section>
                <section>
                    <div class="g-3">
                        <?php
                            //Pegar a categoria atual
                            $cat = get_query_var('cat');
                            $currentcat = get_category ($cat);

                            $args = array(
                                'post_type'         => 'video',
                                'posts_per_page'    => 20,
                                'category_name'     => $currentcat->slug,
                            );
                            $query = new WP_Query( $args );

                            if ( $query->have_posts() ): 
                                while($query->have_posts()): 
                                    $query->the_post();
                        ?>
                        <?php
                            $thumb = get_field('capinha');
                        ?>

                        <article class="article-thumb">
                            <a href="<?php the_permalink() ?>">
                                <div class="carrocel">
                                    <div class="video-cover">
                                        <img class="thumb-img" src="<?= esc_url($thumb['url']); ?>"
                                            alt="capa do vídeo" width="248" height="387">
                                        <div class="video-time"><?php the_field('tempo_do_video'); ?>m</div>
                                        <h4 class="thumb-title"><?php the_title() ?></h4>
                                    </div>
                                </div>
                            </a>
                        </article>

                        <?php
                                endwhile;
                            else:
                                echo 'Nenhum vídeo nesta categoria!';
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div>
                </section>
            </div>
        </article>
    </main>

<?php get_footer(); ?>