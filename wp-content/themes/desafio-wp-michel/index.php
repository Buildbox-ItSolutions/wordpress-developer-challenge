<?php get_header(); ?>

            <?php
                $hero_args = array(
                    'post_type' => 'videos',
                    'post_status' => 'publish',
                    'posts_per_page' => 1,
                    'order' => 'DESC',
                    'orderby' => 'date'
                )
            ?>
            <?php $hero = new WP_Query( $hero_args ); ?>
            <?php if ( $hero->have_posts() ) : ?>
                <?php while ( $hero->have_posts() ) : $hero->the_post(); ?>
                    <?php PG_Helper::rememberShownPost(); ?>
                    <section class="background-center-center background-cover bg-dark pe-2 pe-sm-3 position-relative ps-2 ps-sm-3" id="hero">
                        <div class="bg-dark bg-opacity-50 bottom-0 end-0 position-absolute start-0 top-0" style="background-image: url('url('https://images.pexels.com/photos/2246476/pexels-photo-2246476.jpeg')');">
                            <?php if ( get_field('imagem_de_capa') ) : ?>
                                <?php $imagexy = get_field('imagem_de_capa');
$size = 'large';
$thumb = $imagexy['sizes'][ $size ];
 ?>
                                <img class="figure-img h-100 imagem-capa rounded w-100" loading="lazy" id="capa" src="<?php echo $thumb ?>"/>
                            <?php endif; ?>
                        </div>
                        <div class="bg-dark bg-opacity-50 bottom-0 end-0 pg-empty-placeholder position-absolute start-0 top-0"></div>
                        <div class="container-md h-100 position-relative">
                            <div class="h-100 p-0 row">
                                <div class="col-12 col-sm-9 col-xl-7 d-flex flex-column gap-4 justify-content-center">
                                    <div class="d-flex gap-2 mb-0 me-0 ms-0 mt-5 pb-0 pe-0 ps-0 pt-5 pt-sm-0">
                                        <?php $terms = get_the_terms( get_the_ID(), 'segmento' ) ?>
                                        <?php if( !empty( $terms ) ) : ?>
                                            <?php foreach( $terms as $term ) : ?>
                                                <a class="btn btn-light btn-sm mb-1 pe-4 pe-md-5 ps-4 ps-md-5" href="<?php echo esc_url( get_term_link( $term, 'segmento' ) ) ?>"><?php echo $term->name; ?></a>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <button class="btn btn-outline-light btn-sm mb-1 pe-4 pe-md-5 ps-4 ps-md-5">
                                            <?php echo get_field( 'tempo_de_duracao' ); ?>
                                            <?php _e( 'm', 'play_michel' ); ?>
                                        </button>
                                    </div>
                                    <h1 class="display-1 lh-1 m-0 p-0"><?php the_title(); ?></h1>
                                    <div class="d-flex justify-content-md-start m-0 p-0">
                                        <a class="btn btn-lg btn-primary fs-6  pb-3 pe-5 ps-5 pt-3 text-white" href="<?php echo esc_url( the_permalink() ); ?>"><?php _e( 'Mais informações', 'play_michel' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'play_michel' ); ?></p>
            <?php endif; ?>
            <?php $taxonomies = get_terms( array(
    'taxonomy' => 'segmento',
    'hide_empty' => false
) );
 
if ( !empty($taxonomies) ) :
foreach( $taxonomies as $segmento ) { ?>
                <section class="d-flex flex-column gap-5 gap-xxl-3 pe-2 pe-sm-3 ps-2 ps-sm-3 pt-5">
                    <div class="container-md">
                        <h2 class="mb-3 text-primary"><?php echo $segmento->name ?></h2>
                        <?php
                            $query_filmes_args = array(
                                'category__not_in' => get_term_by('slug', 'uncategorized', 'category')->term_id,
                                'tax_query' => array( 
                                    array(
                                        'taxonomy' => 'segmento',
                                        'field' => 'slug',
                                        'terms' => $segmento->slug
                                    )
                                ),
                                'post_type' => 'videos',
                                'post_status' => 'publish',
                                'order' => 'DESC',
                                'orderby' => 'date'
                            )
                        ?>
                        <?php $query_filmes = new WP_Query( $query_filmes_args ); ?>
                        <?php if ( $query_filmes->have_posts() ) : ?>
                            <div class="caroucel-slick row w-100">
                                <?php while ( $query_filmes->have_posts() ) : $query_filmes->the_post(); ?>
                                    <?php PG_Helper::rememberShownPost(); ?>
                                    <div class="col-6 col-md-2 col-sm-3"> <a href="<?php echo esc_url( the_permalink() ); ?>"><figure class="figure w-100"> 
                                                <?php $image = get_field('imagem_de_capa');
if( $image ):


    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    $caption = $image['caption'];

    $size = 'thumbnail';
    $thumb = $image['sizes'][ $size ];
    $width = $image['sizes'][ $size . '-width' ];
    $height = $image['sizes'][ $size . '-height' ]; ?>
                                                <img src="<?php echo esc_url($thumb); ?>" class="figure-img h-auto rounded w-100"/>
                                            <?php endif; ?> 
                                            <figcaption class="align-items-start d-flex figure-caption flex-column gap-3 justify-content-start pb-2 pt-2">
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-outline-light btn-sm mb-1  pe-4 ps-4">
                                                        <?php echo get_field( 'tempo_de_duracao' ); ?>
                                                        <?php _e( 'm', 'play_michel' ); ?>
                                                    </button>
                                                </div>
                                                <span class="clearfix float-start fs-5 lh-1 text-white"><?php the_title(); ?></span>
                                            </figcaption>                                             
                                            </figure></a> 
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        <?php else : ?>
                            <p><?php _e( 'Sorry, no posts matched your criteria.', 'play_michel' ); ?></p>
                        <?php endif; ?>
                    </div>
                </section>
            <?php };
endif; ?>

<?php get_footer(); ?>