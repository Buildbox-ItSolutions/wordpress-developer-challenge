<?php
/**
 * Template part for homepage slider
 */

?>
<?php
    $args = array(
        'post_type' => 'videos',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'order' => 'DESC',
        'posts_per_page' => '5',
    );
    ?>

    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <?php

            $random_videos = new WP_Query($args);
            $i = 1;
            if ($random_videos->have_posts()) {
                while ($random_videos->have_posts()) {


                    $random_videos->the_post();

                    $duration = get_field("duration", get_the_ID());
                    $terms = get_the_terms(get_the_ID(), 'formatos'); ?>
                    <div class="carousel-item <?php if ($i == 1) {
                                                    echo 'active';
                                                } ?>">
                  
                        <?php the_post_thumbnail( 'full-cover', ['class' => 'd-block w-100'] ); ?>
                        <div class="carousel-caption">
                            <div class="small-media-details">
                                <span class="media-type border rounded bg-white text-dark"><?php echo $terms[0]->name; ?></span>
                                <?php


                                if ($duration) { ?>
                                    <span class="media-duration border rounded"><?php echo $duration; ?>m</span>
                                <?php
                                }  ?>



                            </div>
                            <h2><?php the_title(); ?></h2>
                            <p><a href="<?php the_permalink(); ?>" class="btn btn-lg more-info-btn text-light">Mais Informações</a></p>
                        </div>
                    </div>
            <?php
                    $i++;
                }
            }


            ?>

        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>


