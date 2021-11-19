
<?php
     $HeaderPost = array(
        'post_type' => array('video'),
        'posts_per_page' => '1',
        'orderby' => 'ID',
        'order' => 'DESC',
    );
    $wp_query = new WP_Query($HeaderPost);
    
    
    
?>

<div class="heroBanner">
    <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()):$wp_query->the_post();
        $Embed_link = get_field('link_youtube');
        $args = array( 'videoFrame' => 'https://img.youtube.com/vi/'. $Embed_link .'/maxresdefault.jpg' );
        $terms = get_the_terms( $post->ID , 'genero' );
        foreach ( $terms as $term ) {
            $TituloGenero = $term->slug;
            $TituloUrl = get_term_link($term->slug, 'genero');
        }
    ?>

    <div class="heroBanner__Background" style="background-image:url('<?php echo $args['videoFrame'];?>')"></div>
    <div class="heroBanner__Content">
        <div class="Content__Buttons">
            <a class="btn btn--light" href="<?php echo $TituloUrl; ?>">
                <?php echo $TituloGenero; ?>
            </a>
            <span class="btn btn--transparent"><?php the_field('tempo_de_duracao');?>m</span>
        </div>
        <h1><?php the_title();?></h1>
        <div class="Content__Buttons">
            <a class="btn btn--red btn-large" href="<?php the_permalink();?>">Mais informações</a>
        </div>
    </div>
    <?php endwhile; endif;  wp_reset_postdata(); ?>
</div>