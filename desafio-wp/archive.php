<?php
/**
 * Archive template

 */

?>
<?php get_header(); ?>
<div class="container archive_page">
    <div class="row">
        <div class="col-md-4 box archive-left-column">

            <h1 class="archive-title"><?php echo single_cat_title('', false); ?></h1>

            <div class="category-description">
                <p><?php


                    $tax = $wp_query->get_queried_object();


                    
                 $term = $tax->slug;
                    echo category_description();; ?></p>
            </div>

        </div>
        <div class="col-md-8 d-flex justify-content-center">

            <section class="d-flex justify-content-center">
                <?php get_template_part('template-parts/media-category', null, array('term' => $term)); ?>

            </section>

        </div>

    </div>
</div>
</div>
<?php get_footer(); ?>