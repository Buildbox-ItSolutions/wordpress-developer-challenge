<?php get_header();?>
   

<section class="single">
    <div class="wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            $Embed_link = get_field('link_youtube');
            $terms = get_the_terms( $post->ID , 'genero' );
            foreach ( $terms as $term ) {
                $TituloGenero = $term->slug;
                $TituloUrl = get_term_link($term->slug, 'genero');
            }
        ?>
        <div class="Content__Buttons">
            <a class="btn btn--light" href="<?php echo $TituloUrl; ?>">
                <?php echo $TituloGenero; ?>
            </a>
            <span class="btn btn--transparent"><?php the_field('tempo_de_duracao');?>m</span>
            <h1><?php the_title();?></h1>
        </div>

        <div class="Content__wrapper">
            <div class="wide-video">
                <div id="player"  data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $Embed_link;?>"></div>
            </div>
            <div class="Sinopse--content">
                <?php the_field('sinopse');?>
            </div>
        </div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Desculpe,Nenhum post encontrado.' ); ?></p>
        <?php endif; ?>

    </div>

</section>


<?php get_footer();?>
    