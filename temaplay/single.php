<?php get_header(); ?>

<div class="site-content">

        <main>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article  id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
                    
                        <div class="post-videos-single">
                            <div class="video-data-single">
                                    <button class="button-category-single">
                                        <?php if( has_category()):
                                         the_category( ' ' ); 
                                         endif;?>
                                    </button>
                                
                                    <button class="button-lenght-single">
                                        <?php 
                                        echo get_post_meta($post->ID, 'playtheme_video_lenght', true); ?>
                                    </button>
                                </div>
                                <h1 class= "title-videos-single" 
                                href="<?php the_title( get_the_permalink()); ?>"> <?php echo the_title()?>
                                </h1>
                                <div class="show-video">
                                <?php echo get_post_meta($post->ID, 'playtheme_video_lenght', true); ?>
                                </div>
                                
                            <div class="embed-space-single">
                            <? echo get_post_meta($post->ID, 'playtheme_video_embed', true); ?></p>
                            </div>
                                                          
                                <p class="sinopse-span"> 
                                <? echo get_post_meta($post->ID, 'playtheme_video_sinopse', true); ?></p>
                          </div>
                          <div>
                                         <img src="http://desafioplay.local/wp-content/uploads/2022/11/cropped-Untitled-design-11.jpg " width="104" height="33" class="logo-single">
                                        <p class="copy-single">© 2020 — Play — Todos os direitos reservados.</p>
                          </div>
                        </article>
                <?php endwhile; endif; ?>
                
         
            </main>
</div>


                  

