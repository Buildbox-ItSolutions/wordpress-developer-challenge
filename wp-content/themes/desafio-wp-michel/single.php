<?php get_header(); ?>

            <div class="modal modal-static pg-show-modal" id="modalVideo" aria-modal="true" tabindex="-1" role="dialog"> 
                <div class="modal-dialog modal-dialog-centered modal-lg"> 
                    <div class="modal-content"> 
                        <div class="modal-header pb-2 pt-2"> 
                            <h4 class="fs-4 modal-title text-dark"><?php the_title(); ?></h4> 
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                             
                        </div>                         
                        <div class="modal-body"> 
                            <div id="video">
                                <?php echo get_field( 'video' ); ?>
                            </div>                             
                        </div>                         
                    </div>                     
                </div>                 
            </div>
            <section class="pb-5 pe-2 pe-sm-3 position-relative ps-2 ps-sm-3 pt-5" style="background-repeat: no-repeat; background-position: center center; background-size: cover; max-height: 1000px;">
                <div class="container-md h-100 pt-5">
                    <div class="gx-0 row">
                        <div class="col-12 d-flex flex-column gap-2 justify-content-center">
                            <div class="d-flex gap-2 overflow-auto">
                                <?php $terms = get_the_terms( $post->ID, 'segmento' );                         
if ( $terms && ! is_wp_error( $terms ) ) : 
    foreach ( $terms as $term ) { ?>
                                    <a class="btn btn-light btn-sm mb-1 pe-4 pe-md-5 ps-4 ps-md-5" href="<?php echo esc_url( esc_url( home_url( 'segmento/'.$term->slug ) ) ); ?>"><?php echo $term->name; ?></a>
                                <?php }
endif; ?>
                                <a class="btn btn-outline-light btn-sm mb-1  pe-4 pe-md-5 ps-4 ps-md-5" href="#"><?php echo get_field( 'tempo_de_duracao' ); ?><?php _e( 'm', 'play_michel' ); ?></a>
                            </div>
                            <h1 class="display-3 m-0 p-0 text-wrap"><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gap-5 pb-5 pe-2 pe-sm-3 ps-2 ps-sm-3">
                <?php if ( get_field( 'video' ) ) : ?>
                    <div class="container-md">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalVideo" class="position-relative ratio ratio-16x9"> <img src="<?php echo get_template_directory_uri(); ?>/assets/img/play-light.svg" id="play-lights" style="z-index: 1; transform: translate(-50%, -50%); width: 90px; left: 50%; top: 50%; position: absolute;"/><figure class="ratio ratio-16x9"> 
                                <?php if ( get_field('imagem_de_capa') ) : ?>
                                    <?php $imagexy = get_field('imagem_de_capa');
$size = 'large';
$thumb = $imagexy['sizes'][ $size ];
 ?>
                                    <img class="figure-img imagem-capa rounded" loading="lazy" id="capa" src="<?php echo $thumb ?>"/>
                                <?php endif; ?> 
                            </figure> </a>
                    </div>
                <?php endif; ?>
                <div class="container-md d-flex flex-column gap-4 h-100  pt-5" id="content">
                    <?php the_content(); ?>
                </div>
                <?php if ( get_field( 'tempo_de_duracao' ) ) : ?>
                    <div class="container-md gap-4 h-100 pt-5">
                        <div class="row">
                            <div class="col-12 col-md-4 pe-3 ps-3">
                                <h2 class=" text-primary"><?php _e( 'Tempo de Duração:', 'play_michel' ); ?></h2> 
                            </div>
                            <div class="col-md-8 pe-3 ps-3"> 
                                <div>
                                    <p class="pt-2"><?php echo get_field( 'tempo_de_duracao' ); ?> <?php _e( 'minutos', 'play_michel' ); ?></p>
                                </div>                                 
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( get_field( 'tempo_de_duracao' ) ) : ?>
                    <div class="container-md gap-4 h-100 pt-5">
                        <div class="row">
                            <div class="col-12 col-md-4 pe-3 ps-3">
                                <h2 class=" text-primary"><?php _e( 'Descricao:', 'play_michel' ); ?></h2> 
                            </div>
                            <div class="col-md-8 pe-3 ps-3"> 
                                <div>
                                    <p class="pt-2"><?php echo get_field( 'descricao' ); ?></p>
                                </div>                                 
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( get_field( 'tempo_de_duracao' ) ) : ?>
                    <div class="container-md gap-4 h-100 pt-5">
                        <div class="row">
                            <div class="col-12 col-md-4 pe-3 ps-3">
                                <h2 class=" text-primary"><?php _e( 'Sinopse:', 'play_michel' ); ?></h2> 
                            </div>
                            <div class="col-md-8 pe-3 ps-3"> 
                                <div>
                                    <p class="pt-2"><?php echo get_field( 'sinopse' ); ?></p>
                                </div>                                 
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>            

<?php get_footer(); ?>