<?php get_header(); ?>

	<main id="main">
        <div class="container">
            <article>
            <?php
                if(have_posts()) {
                    while(have_posts()) {
                        $imagem = get_field("imagem", get_the_ID());
                        $video = get_field("video", get_the_ID());
                        $duracao = get_field("duracao", get_the_ID());
                        $resumo = get_field("resumo", get_the_ID());
                        $elenco = get_field("elenco", get_the_ID());
                        $direcao = get_field("direcao", get_the_ID());
                        $roteiro = get_field("roteiro", get_the_ID());
                        $faixa_etaria = get_field("faixa_etaria", get_the_ID());
                        the_post();
                        ?>
                        <div id="play-video" class="card bg-transparent text-white">
                            <img src="<?php echo $imagem; ?>" class="card-img" alt="...">
                            <div class="video" style="display:none;"><?php echo $video; ?></div>
                            <div class="card-img-overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-play.png" alt="">
                            </div>
                        </div>
                        <h3 class="card-title"><?php the_title(); ?></h3>
                        <p>Categoria: <?php the_category(' '); ?></p>
                        <p>Duração: <?php echo $duracao; ?>m</p>
                        <p>Sinopse: <?php echo $resumo; ?></p>
                        <p>Elenco: <?php echo $elenco; ?></p>
                        <p>Roteiro: <?php echo $roteiro; ?></p>
                        <p>Faixa etária: <?php echo $faixa_etaria; ?></p>
                        <?php
                    }
                }
            ?>
            </article>
        </div>
	</main>

<?php get_footer(); ?>

<script>
    jQuery('#play-video').click(function(e){
        jQuery('.card-img').remove();
        jQuery('.card-img-overlay').remove();
        jQuery('.video').show();
    });
</script>