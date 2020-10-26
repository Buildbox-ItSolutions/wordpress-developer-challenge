<?php get_header(); ?>

<section class="list-categoria ">
        <div class="container-grid">
            <div class="descri">
                <div class="info">
                    <h2><?php the_title();?></h2>
                    <?php the_content()?>
                </div>
            </div>
            
            <div class="content">
                <?php
                    $custom_terms = get_terms('videos_cat');
                    foreach($custom_terms as $custom_term) {
                        wp_reset_query();
                        $args = array('post_type' => 'videos',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'videos_cat',
                                    'field' => 'slug',
                                    'terms' => $custom_term->slug,
                                ),
                            ),
                        );

                    $loop = new WP_Query($args);
                ?>
                
                <?php if($loop->have_posts() && $custom_term->slug =="documentarios") { 
                    while($loop->have_posts()) : $loop->the_post();?>
                    <?php $duracao = get_post_meta( get_the_ID(), 'videos_tempo', true ); ?>
                    <div class="item">
                        <a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($PriImgId,array('250','387')));?>"></a>
                        <span class="btn-sm"><?php echo $duracao;?></span>
                        <a class="title" href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
                    </div>
                <?php endwhile; ?>
                <?php } }?>
            </div>
        </div>
    </section>
    
<?php get_footer();?>