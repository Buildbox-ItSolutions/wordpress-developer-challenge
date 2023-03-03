<?php get_header(); ?>

<section id="single-video">

    <?php 
        if(have_posts()){ ?>
            <div class="container">
                <?php
                    while(have_posts()){
                        the_post();

                        $taxName = '';
                        $terms = get_the_terms( get_the_ID(), 'tipo-de-video' );
                        foreach ( $terms as $term ) {
                            $taxName .= '<span class="tax-name">'. $term->name .'</span>';
                        }
                        $tempoDuracao = get_field('duracao', get_the_ID()) ? '<span class="tempo-duracao">'. get_field('duracao', get_the_ID()) .'m</span>' : '';
                        ?>
                        <div class="single-title">
                            <div class="terms">
                                <?= $taxName . $tempoDuracao; ?>
                            </div>
                            <h1><?= get_the_title(); ?></h1>
                        </div>
                        <div class="single-content-video">
                            <?= get_the_content(); ?>
                        </div>
                        <article class="single-descricao-video">                            
                            <?= get_field('descricao_do_video', get_the_ID()); ?>
                        </article>

                    <?php }
                ?>
            </div>
    <?php } ?>
</section>

<?php get_footer(); ?>