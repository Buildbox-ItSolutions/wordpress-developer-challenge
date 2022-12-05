<?php get_header(); ?>

<div class="content-single-video">

        <main>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article  id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
                    
                        <div class="post-videos-single">
                                <div class="video-data-single">
                                
                                    <button class="button-category">
                                
                                        <?php if( has_category()):
                                         the_category( ' ' ); 
                                         endif;?>

                                    </button>
                                
                                    <button class="button-lenght">
                                        <?php 
                                        echo get_post_meta($post->ID, 'playtheme_video_lenght', true); ?>

                                    </button>
                                </div>
                                <div class="title-area-single">
                                <h1 class= "title-videos-single" href="<?php the_title( get_the_permalink()); ?>"> <?php echo the_title()?>
                                </h1>
                                </div>
                          <div class="embed-space-single">
                          <div class="video-embed-area-single">
                            <?php
                          echo get_post_meta($post->ID, 'playtheme_video_embed', true); ?>
                          </div>
                          </div>

                            <div class="sinopse-text"> 
                        <p class="sinopse-span"> <? echo get_post_meta($post->ID, 'playtheme_video_sinopse', true);
                           ?></p>
                            </div>
                        </div>
                       </article>
                <?php endwhile; endif; 
                
                
               echo wp_get_attachment_image( get_post_meta($post->ID, 'playtheme_video_cover', true));
                    ?>
    
    
            </main>
</div>


                    echo $imageURL; ?>


<?php get_footer(); ?>