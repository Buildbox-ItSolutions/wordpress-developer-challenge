<?php 
// Template Name: Documentários
?>
<?php get_header(); ?>
<?php $id =  the_ID(); ?>
    <section class="container grid-section">
        <div>
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
        </div>
        <div class="grid-videos">
        <?php $args = array(
            'post_type' => 'meus_filmes',
            'order' => 'DESC',
            'categorias' => 'documentarios'
        ); 
        $the_query = new WP_Query($args);
        ?>
        <?php if($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->
        the_post(); ?>
            <div class="post-list">
                <div>
                    <a href="<?php the_permalink();?>"><img src="<?php the_field('thumbnail',$id) ?>" alt=""></a>
                </div>
                <div>
                    <span class="btn-minutes"><?php the_field('duracao',$id); ?>m</span>
                    <a href="<?php the_permalink();?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
            </div>
            <?php endwhile; else : endif; ?>
            <!--------------------------->
        </div>
    </section>
    <?php get_footer(); ?>