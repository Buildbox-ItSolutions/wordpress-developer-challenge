<?php 
    $argsPost = array(
        'post_type' => array('video'),
        'posts_per_page' => $play_args['posts_per_page'],
    );
    $argsPost['tax_query'][] = array(
        'taxonomy' => $play_args['taxonomy'],
        'terms'    => $play_args['terms'],
        'field'    => 'slug',
    );
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $SectionTitle = $play_args['SectionTitle'];
    $wp_query = new WP_Query($argsPost);
?>


<section>
    <div class="wrapper">
        <h2><?php echo $SectionTitle;?></h2>
    </div>
    <div class="card--list">
        <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()):$wp_query->the_post(); ?>
                <?php get_template_part('inc/post/card');?>
        <?php endwhile; endif;  wp_reset_postdata(); ?>
    </div>
</section>