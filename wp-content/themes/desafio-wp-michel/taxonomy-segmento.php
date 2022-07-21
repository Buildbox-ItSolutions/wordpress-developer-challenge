<?php get_header(); ?>

            <section class="d-flex flex-column gap-4 pb-5 pe-2 pe-sm-3 ps-2 ps-sm-3 pt-5" style="max-width: 1920px; margin: 0 auto;">
                <?php
                    $category_args = array(
                        'tax_query' => array( 
                            array(
                                'taxonomy' => 'segmento',
                                'field' => 'term_id',
                                'terms' => get_queried_object_id()
                            )
                        ),
                        'post_type' => 'videos',
                        'post_status' => 'publish',
                        'order' => 'DESC',
                        'orderby' => 'date'
                    )
                ?>
                <?php $category = new WP_Query( $category_args ); ?>
                <div class="container-md pt-5">
                    <div class=" row">
                        <div class="col-md-4">
                            <h2 class=" text-primary"><?php single_term_title(); ?></h2> 
                            <?php
                                if ( $tag_content = term_description( ) ) : 
                                    printf( '<p>%s</p>', $tag_content );
                                endif;
                             ?> 
                        </div>
                        <div class="col-md-6 offset-md-2">
                            <?php if ( $category->have_posts() ) : ?>
                                <div class="lista-videos row">
                                    <?php while ( $category->have_posts() ) : $category->the_post(); ?>
                                        <?php PG_Helper::rememberShownPost(); ?>
                                        <div class="col-6 col-md-4 col-sm-3"> <a href="<?php echo esc_url( the_permalink() ); ?>"><figure class="figure w-100"> 
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
                    </div>
                </div>
            </section>            

<?php get_footer(); ?>