<?php
/**
 * Template part for homepage media row

 */

?><div class="media-row swiper mySwiper">
    <div class="media-row-wrapper swiper-wrapper d-flex justify-content-xs-center">
        <?php
        $args = array(
            'post_type' => 'videos',
            'tax_query' => array(
                array(
                    'taxonomy' => 'formatos',
                    'field' => 'slug',
                    'terms' => $args['term'],
                )
            ),
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => '15',
        );
        ?>

        <?php

        $media = new WP_Query($args);

        if ($media->have_posts()) {
            while ($media->have_posts()) {

                $media->the_post();

                $duration = get_field("duration", get_the_ID());
        ?>

                <div class="card swiper-slide bg-transparent">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                    <?php the_post_thumbnail( 'poster-thumb', ['class' => 'card-img-top rounded'] ); ?>
              
                        <div class="custom-card-body">

                            <?php if ($duration) { ?>
                                <span class="media-duration border rounded"><?php echo $duration; ?>min</span>
                            <?php
                            }  ?>
                            <h5 class="card-title"><?php the_title(); ?></h5>

                        </div>
                    </a>
                </div>

        <?php

            }
        }


        ?>

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>