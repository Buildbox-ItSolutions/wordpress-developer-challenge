<?php 
$destaque = new WP_Query( array(
    'post_type' => 'Video',
    'posts_per_page' => 1,
    'order'=>'DESC',
    'orderby'=>'ID',  
) );

?>
<?php while ( $destaque->have_posts() ) : $destaque->the_post();?>  
<section class="hero" style="background: url('<?php the_field('imagem_de_capa'); ?>')">
    <div id="overlay"></div> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__boxes d-inline-flex">
                    <div class="slider__box ">
                        <?php 
                            $term_list = wp_get_post_terms( get_the_ID(), 'tipo_de_video', array( 'fields' => 'names' ) );
                            echo "<p>" . $term_list[0] . "</p>";?>
                    </div>
                    <div class="slider__box">
                        <p><?php the_field('tempo_de_duracao'); ?>m</p>
                    </div>
                </div>
                <h1><?php the_title(); ?></h1>
                <a href="<?php echo get_permalink();?>">Mais informações</a>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>