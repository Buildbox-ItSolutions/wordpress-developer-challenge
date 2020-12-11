<?php get_header() ?>

<section>
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post() ?>
                <div class="section">
                    <div class="row">
                        <div class="col-10 offset-1 col-md-8 offset-md-2">
                            <p>
                                <?php $categoria = get_the_terms($post->ID, 'categoria-video') // Verifica se existe categoria ?>
                                <?php if (isset($categoria[0]->slug)) : ?>
                                    <a href="<?= home_url() . "/" . $categoria[0]->taxonomy . "/" .  $categoria[0]->slug ?>" class="btn btn__small btn__small--white"><?= $categoria[0]->name ?></a> 
                                <?php endif ?>
                                <?php if (get_post_meta( $post->ID, "video_duracao", true )) : // Verifica se existe tempo de duração ?>
                                    <span class="btn btn__small btn__small"><?= get_post_meta( $post->ID, "video_duracao", true ) ?></span>
                                <?php endif ?>
                            </p>
                            <h1 class="section__header section__header--big-white"><?php the_title() ?></h1>
                        </div>
                    </div>
                    <?php if (get_post_meta( $post->ID, "video_embed", true )) : // Verifica se existe embed ?>
                        <div class="section__embed">
                            <?= get_post_meta( $post->ID, "video_embed", true ) ?>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-10 offset-1 col-md-8 offset-md-2">
                            <?php if (get_post_meta( $post->ID, "video_sinopse", true )) : // Verifica se existe sinopse ?>
                                <h3>Sinopse:</h3>
                                <p><?= get_post_meta( $post->ID, "video_sinopse", true ) ?></p>
                            <?php endif ?>
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
</section>

<?php get_footer() ?>