<article  id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
    <div class="dynamic-area">
          <img class = "dynamic-cover" src="<?php echo get_post_meta($post->ID, 'playtheme_upload_file', true); ?>"/>
    </div>        
        <div class= "video-data">
            <button class="button-category">
            <?php if( has_category()): the_category( ' ' ); endif;?>
             </button>
           <button class="button-lenght">
            <?php echo get_post_meta($post->ID, 'playtheme_video_lenght', true); ?>
            </button>
        </div>
        <div class="title-area">
            <h1 class= "title-videos"><a href="<?php the_permalink();?>"><?php the_title(); ?></a> </h1>
            <a href="<?php the_permalink();?>"><button class="red-button">Mais Informações </button></a>
        </div>
    </div>
    </div>
</article>


