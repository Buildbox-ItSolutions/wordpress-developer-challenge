
<?php
/* Template Name: single video*/
get_header(); ?>
<section class="single_video">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <?php while ( have_posts() ) : the_post();?>
                <div class="container">
                    <div class="hero__boxes d-inline-flex">
                        <div class="slider__box ">
                            <p>Filmes</p>
                        </div>
                        <div class="slider__box">
                            <p>130m</p>
                        </div>
                    </div>
                        <h1 class="">
                            <?php the_title(); ?>
                        </h1>
                        <?php endwhile;?>
                    </div>
                </div><!-- container -->
                <div class="container-fluid " >
                    <div class="single_video__bg__wrapper">
                        <svg class="play_icon" width="53.524" height="53.524" viewBox="0 0 53.524 53.524"><defs><style>.a{fill:#fff;}</style></defs><path class="a" d="M27.762,1A26.762,26.762,0,1,0,54.524,27.762,26.793,26.793,0,0,0,27.762,1ZM38.844,29.786l-14.6,9.732a2.432,2.432,0,0,1-3.783-2.024V18.03a2.431,2.431,0,0,1,3.781-2.024l14.6,9.732a2.432,2.432,0,0,1,0,4.048Z" transform="translate(-1 -1)"/></svg>
                        <div class="single_video__bg" style='background:url("<?php the_field('imagem_de_capa'); ?>"); background-position: center; background-size:cover; '>
                        </div>
                    </div>
                    <div class="text-center single_video__sinopse mx-auto">
                        <p><?php the_field('sinopse'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
