<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $id =  the_ID();

 
?>
        <section class="post-page">
            <div>
                <span class="btn-small"><?php echo strip_tags (get_the_term_list( $id, 'categorias')); ?></span>
                <span  class="btn-minutes"><?php the_field('duracao',$id); ?>m</span>
                <h1><?php the_title() ?></h1>
            </div>
            <div>
                <?php the_field('video',$id);  ?>
            </div>
            <div>
                <p><?php the_content() ?></p>
            </div>

        </section>
    <?php endwhile;
else : ?>
    <p><?php _e('Nenhuma postagem encontrada') ?></p>
<?php endif; ?>

<?php get_footer(); ?>