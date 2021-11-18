<?php get_header(); ?>

<?php
    $args = array(
        'post_type' => 'video',
        'order' => 'DESC',
        'posts_per_page' => '1',
    );
    $getPosts = new WP_Query($args);
    if ($getPosts->have_posts()) {
        while ($getPosts->have_posts()) {
            $getPosts->the_post();
            '<a href="'.the_permalink().'">'.the_title().'</a>';
        }
    }
?>

<?php get_footer(); ?>