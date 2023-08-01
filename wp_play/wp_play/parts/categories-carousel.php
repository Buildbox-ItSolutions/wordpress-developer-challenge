<section class="slider">
<div class="slider-single">

    
    <!---SLIDER FILMES-->
    <a href="/index.php?cat=3"><h2 class="heading-secondary">Filmes</h2></a>   
    <div class="slider-single__arrow">
        <img class="btn-slider btn-control btn-slider-left left-film"  src="<?php echo WP_PLAY_ARROW_LEFT_PATH; ?>" alt = "arrow left">
        <div class="slider-single__wrapper"> 
            <div class="slider-single__article slider-single__film">
                
                <?php
    // Loop for 'filmes' category
    $args_filmes = array(
        'post_type' => 'videos',
        'tax_query' => array(
            array(
                'taxonomy' => 'video_type',
                'field' => 'slug',
                'terms' => 'filmes',
            ),
        ),
    );
    
    $filmes_query = new WP_Query($args_filmes);
    if ($filmes_query->have_posts()) :
        while ($filmes_query->have_posts()) :
            $filmes_query->the_post();
            ?>
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
    
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    
    ?>
      
    </div>
</div>
<img class="btn-slider btn-control btn-slider-right right-film"  src="<?php echo WP_PLAY_ARROW_RIGHT_PATH; ?>" alt = "arrow right">
</div>
</div>


<div class="slider-single">
    
    <!--SLIDER DOCUMENTARIOS-->
    
    <a href="/index.php?cat=4"><h2 class="heading-secondary">Documentários</h2></a>  
    <div class="slider-single__arrow">
    <img class="btn-slider btn-control btn-slider-left left-docs"  src="<?php echo WP_PLAY_ARROW_LEFT_PATH; ?>" alt = "arrow left">    
        <div class="slider-single__wrapper"> 
            <div class="slider-single__article slider-single__docs">   
                <?php
      // Loop for 'documentarios' category
      $args_documentarios = array(
          'post_type' => 'videos',
          'tax_query' => array(
              array(
                  'taxonomy' => 'video_type',
                  'field' => 'slug',
                  'terms' => 'documentarios',
                ),
            ),
    );
    
    $documentarios_query = new WP_Query($args_documentarios);
    if ($documentarios_query->have_posts()) :
        while ($documentarios_query->have_posts()) :
            $documentarios_query->the_post(); ?>
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
            <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>      
            </div>
        </div>
        <img class="btn-slider btn-control btn-slider-right right-docs"  src="<?php echo WP_PLAY_ARROW_RIGHT_PATH; ?>" alt = "arrow right">  
    </div>
    </div>

    <!--SLIDER SERIES--> 
    <div class="slider-single">
    <a href="/index.php?cat=3"><h2 class="heading-secondary">Séries</h2></a>    
    <div class="slider-single__arrow">
    <img class="btn-slider btn-control btn-slider-left left-series"  src="<?php echo WP_PLAY_ARROW_LEFT_PATH; ?>" alt = "arrow left"> 
        <div class="slider-single__wrapper"> 
            <div class="slider-single__article slider-single__series">
                
                <?php
    // Loop for 'series' category
    $args_series = array(
        'post_type' => 'videos',
        'tax_query' => array(
            array(
                'taxonomy' => 'video_type',
                'field' => 'slug',
                'terms' => 'series',
            ),
        ),
    );
    
    $series_query = new WP_Query($args_series);
    if ($series_query->have_posts()) :
        while ($series_query->have_posts()) :
            $series_query->the_post();     ?>
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
    <?php
        endwhile;
    endif;
    wp_reset_postdata();
    
    ?>
    </div>
</div>
<img class="btn-slider btn-control btn-slider-right right-series"  src="<?php echo WP_PLAY_ARROW_RIGHT_PATH; ?>" alt = "arrow right">
</div>
</div>


    
</section>