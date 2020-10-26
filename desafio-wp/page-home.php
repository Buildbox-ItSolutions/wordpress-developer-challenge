<?php get_header(); ?>

<?php
    $name ='';
    $duracao = '';
    $slug = '';
    $link ='';
    $img ='';
    $title ='';

    $custom_destaques = get_terms('videos_cat');
    foreach($custom_destaques as $custom_destaque) {
        wp_reset_query();
        $args = array('post_type' => 'videos',
            'tax_query' => array(
                array(
                    'limit' => 1,
                    'taxonomy' => 'videos_cat',
                    'terms' => $custom_destaque->slug,
                ),
            ),
        );
        
        
        $destaque = new WP_Query($args);
         
            if($destaque->have_posts()){
                while($destaque->have_posts()) : $destaque->the_post();
                    $link = get_the_permalink();
                    $duracao = get_post_meta( get_the_ID(), 'videos_tempo', true );
                    $title = get_the_title();
                    $img =  do_shortcode(get_the_content());
                    $slugs = wp_get_object_terms($post->ID, 'videos_cat');
                    foreach ($slugs as $cat) {
                        $slug = " ".$cat->name;
                    }
                endwhile;
            }
    } wp_reset_query();  ?>
    
    <section class="intro">
        <div class="container-grid">
                <div class="content">
                    <div class="bts">
                        <span class="btn-sm"><?php echo $slug;?></span>
                        <span class="btn-sm"><?php echo $duracao;?></span>
                    </div>
                    <h1><?php echo $title; ?></h1>
                    <a href="<?php echo $link;?>"class="btn-lg">Mais informações</a>
                </div>
            </div>
            <div class="bg">
                <span style="display:none"><?php echo $img; ?></span>
                <img id="imgId" src=""/>
            </div>
        </div>
    </section> 

        <!-- <section class="intro">
            <div class="container-grid">
                
                    <?php// $duracao = get_post_meta( get_the_ID(), 'videos_tempo', true );?>
                    <div class="content">
                        <div class="bts">
                            <span class="btn-sm"><?php //echo $custom_destaque->name;?></span>
                            <span class="btn-sm"><?php //echo $duracao;?></span>
                        </div>
                        <h1><?php //the_title();?></h1>
                        <a href="<?php //the_permalink();?>"class="btn-lg">Mais informações</a>
                    </div>
                </div>
                <div class="bg">
                    <span style="display:none"><?php //echo  wp_get_attachment_image_src(the_content());?></span>
                    <img id="imgId" src=""/>
                </div>
            </div>
        </section> -->
            
       
    



<section class="main">
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
                        'order' => 'DESC',
                        'posts_per_page'	=> 8,
                    ),
                ),
            );

        $loop = new WP_Query($args);
    ?>  

    <?php
    if($loop->have_posts() && $custom_term->slug =="filmes") {  ?>
        <div class="container">
            <a href="<?php echo $custom_term->slug;?>/"><h2><?php echo $custom_term->name;?></h2></a>
        </div>
        <div class="slider">
            <?php
            while($loop->have_posts()) : $loop->the_post();?>
                <?php $duracao = get_post_meta( get_the_ID(), 'videos_tempo', true );?>
                <div class="content">
                    <div class="item">
                        <a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($PriImgId,array('250','387')));?>" alt=""></a>
                        <span class="btn-sm"><?php echo $duracao;?></span>
                        <a class="title" href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php
    }
    
    //documentarios
    if($loop->have_posts() && $custom_term->slug =="documentarios") {  ?>
        <div class="container">
            <a href="<?php echo $custom_term->slug;?>/"><h2><?php echo $custom_term->name;?></h2></a>
        </div>
        <div class="slider">
            <?php
            while($loop->have_posts()) : $loop->the_post();?>
            <?php $duracao = get_post_meta( get_the_ID(), 'videos_tempo', true );?>
                <div class="content">
                    <div class="item">
                        <a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($PriImgId,array('250','387')));?>" alt=""></a>
                        <span class="btn-sm"><?php echo $duracao;?></span>
                        <a class="title" href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    <?php
    }

    //series
    if($loop->have_posts() && $custom_term->slug =="series") {  ?>
        <div class="container">
            <a href="<?php echo $custom_term->slug;?>/"><h2><?php echo $custom_term->name;?></h2></a>
        </div>
        <div class="slider">
            <?php
            while($loop->have_posts()) : $loop->the_post();?>
            <?php $duracao = get_post_meta( get_the_ID(), 'videos_tempo', true );?>
                <div class="content">
                    <div class="item">
                        <a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($PriImgId,array('250','387')));?>" alt=""></a>

                        <span class="btn-sm"><?php echo $duracao;?></span>
                        <a class="title" href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    <?php
    }
    }
    wp_reset_query(); ?>
    
        
</section>

<?php get_footer(); ?>