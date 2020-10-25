<?php get_header(); ?>
<?php
    $duracao = get_post_meta( get_the_ID(), 'videos_tempo', true );
    $descricao = get_post_meta( get_the_ID(), 'videos_descricao', true );
    $sinopse = get_post_meta( get_the_ID(), 'videos_sinopse', true );
   
    $taxonomy = wp_get_object_terms($post->ID, 'videos_cat');
    $ids = ""; 
    foreach ($taxonomy as $cat) {
        $ids .= " ".$cat->name;
    }
    
?>

    <section class="single">
        <div class="container-grid">

                <div class="content">
                    <div class="bts">
                      
                        <span class="btn-sm"><?php  echo $ids; ?></span> 
                        
                        <span class="btn-sm"><?php echo $duracao; ?></span>
                    </div>
                    <h1><?php the_title(); ?></h1>
                </div>
        
                <div class="vid">
                    <div class='embed-container'>
                        <?php echo do_shortcode(get_the_content()); ?>
                    </div>
                </div>
                <div class="content">
                    <p><?php echo $sinopse; ?></p>
                </div>
        </div>
    </section>
<?php  get_footer();?>