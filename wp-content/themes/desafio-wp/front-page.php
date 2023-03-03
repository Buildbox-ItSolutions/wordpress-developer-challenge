<?php get_header(); ?>

<?php get_template_part('template-parts/banner'); ?>
    <section id="front-page">
        <div class="section-video">
            <div class="container">
                <?php
                    $taxonomies = get_terms(
                        'tipo-de-video', array(
                        'hide_empty' => 1,
                        'orderby' => 'id',
                        'number' => 0,  
                        'order' => 'ASC',
                        'parent' => 0
                    ));                        
                    foreach($taxonomies as $taxonomie) { ?>
                        <div class="tituloTaxonomie">
                            <a href="<?= get_category_link($taxonomie); ?>"><?= $taxonomie->name; ?></a>
                        </div>
                        <div class="container-video">
                            <div class="slider loop-video">
                                <?php
                                $loopVideo = array(
                                    'post_type' => 'video',
                                    'posts_per_page' => 10,
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'tipo-de-video',
                                            'field' => 'slug',
                                            'terms' => $taxonomie->slug,
                                        )
                                    ),
                                );
                                $loop = new WP_Query( $loopVideo );
                                    while ( $loop->have_posts() ) {
                                        $loop->the_post();

                                        get_template_part('template-parts/loop', 'video');
                                    } 
                                ?>
                            </div>
                        </div>
                <?php } ?>
            </div>
        </div>
    </section> 

<?php get_footer(); ?>