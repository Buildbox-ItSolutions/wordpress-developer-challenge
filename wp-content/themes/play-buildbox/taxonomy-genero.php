<?php get_header();?>
<?php 
    $argsPost = array(
        'post_type' => array('video'),
    );
    $term = get_queried_object();
    $argsPost['tax_query'][] = array(
        'taxonomy' => 'genero',
        'terms'    => $term->slug,
        'field'    => 'slug',
    );
    $wp_query = new WP_Query($argsPost);
?>
   
<section class="taxonomy">
    <div class="wrapper">
        <div class="taxonomy--infos">
            <h2><?php echo $term->name;?></h2>
            <p><?php echo $term->description;?></p>
        </div>
        <div class="card--list card--list__taxonomy">
            <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()):$wp_query->the_post(); ?>
                <?php get_template_part('inc/post/card');?>
            <?php endwhile; endif;  wp_reset_postdata(); ?>
            <?php
                if (  $wp_query->max_num_pages > 1 ){
                    echo '<div class="btn btn--red btn-large load--posts">Carregar Mais</div>';
                }
            ?>
        </div>
        
    </div>
</section>

<?php get_footer();?>
    