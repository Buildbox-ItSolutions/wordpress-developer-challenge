<?php get_header() ?>

<section>
    <div class="container">
        <div class="section section--big">
            <?php if (have_posts()) : ?>
                <div class="row">
                    <div class="col-lg-5">
                        <?php $categoria = get_the_terms($post->ID, 'categoria-video') // Verifica se existe categoria ?>
                        <?php if (isset($categoria[0]->slug)) : ?>
                            <h1 class="section__header section__header--big"><?= $categoria[0]->name ?></h1>
                        <?php endif ?>
                        <?php if (isset($categoria[0]->description)) : ?>
                            <p><?= $categoria[0]->description ?></p>
                        <?php endif ?>
                    </div>
                    <div class="col-lg-6 offset-lg-1 margin-top">
                        <div class="row">
                            <?php while (have_posts()) : the_post() ?>
                                <a href="<?php the_permalink() ?>" class="col-6 col-sm-4 col-md-4 col-lg-6 col-xl-4">
                                    <!-- Verifica se tem thumbnail -->
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), "video-thumbnails") ?>" class="section__thumbnail">
                                    <?php else : ?>
                                        <img src="<?= get_template_directory_uri() ?>/assets/img/default-thumbnail.png" class="section__thumbnail">
                                    <?php endif ?>
                                    <?php if (get_post_meta( $post->ID, "video_duracao", true )) : // Verifica se existe tempo de duração ?>
                                        <p><span class="btn btn__small btn__small"><?= get_post_meta( $post->ID, "video_duracao", true ) ?></span></p>
                                    <?php endif ?>
                                    <h2 class="section__header section__header--small"><?php the_title() ?></h2>
                                </a>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <h1>Ainda não há itens cadastrados. Em breve novidade!</h1>
                <h2 class="section__header section__header--big-white">Nada encontrado!</h2>
                <p><a href="<?= home_url() ?>" class="btn btn__big">Voltar paga página inicial</a></p>
            <?php endif ?>
        </div>
    </div>
</section>


<?php get_footer() ?>