<?php get_header(); ?>

	<main id="main" class="site-main">
        <div class="container">
            
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
                        the_title();
                        the_content();
                        echo $imagem;
                        echo $video;
                        echo $duracao;
                        echo $resumo;
                        echo $elenco;
                        echo $direcao;
                        echo $roteiro;
                        echo $faixa_etaria;
                    }
                }
            ?>

        </div>
	</main>

<?php get_footer(); ?>