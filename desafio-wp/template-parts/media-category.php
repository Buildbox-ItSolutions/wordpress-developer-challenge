<?php
/**
 * Template part for category post list

 */

?>
<div class="media-row row d-flex justify-content-center">

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
        'posts_per_page' => '9',
    );
    ?>

    <?php

    $media = new WP_Query($args);

    if ($media->have_posts()) {
        while ($media->have_posts()) {

            $media->the_post();

            $duration = get_field("duration", get_the_ID());
    ?>

            <div class="card bg-transparent">
                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full-cover'); ?>" class="card-img-top rounded" alt="...">
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