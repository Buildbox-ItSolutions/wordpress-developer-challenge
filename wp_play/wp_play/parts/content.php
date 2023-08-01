            
           <!-- ARTICLE -->
    <article class="article">
        <?php echo the_post_thumbnail('wp_play_thumb'); ?>" 
        <button class="btn btn--black btn--article">
            <?php echo esc_html(get_post_meta(get_the_ID(), 'bx_play_video_duration', true)); ?>m
        </button>
        <a href="<?php the_permalink(); ?>">
            <h3 class="heading-tertiary"><?php the_title(); ?></h3>
        </a>
    </article> 