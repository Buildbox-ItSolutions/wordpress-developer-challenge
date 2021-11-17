<?php
/**
 * Template part for single video post type

 */

?><?php while (have_posts()) : the_post();


    $duration = get_field("duration", get_the_ID());

    $synopsis = get_field("synopsis", get_the_ID());
    $terms = get_the_terms(get_the_ID(), 'formatos');
    $embed = get_field("embed", get_the_ID());
?>

<div class="media-header">
    <div class="small-media-details">
        <span class="media-type border rounded bg-white text-dark"><a href="<?php echo get_term_link($terms[0]->slug, 'formatos'); ?>" class="text-decoration-none text-dark"><?php echo $terms[0]->name; ?></a></span>
        <?php


        if ($duration) { ?>
            <span class="media-duration border rounded"><?php echo $duration; ?>m</span>
        <?php
        }  ?>



    </div>
    


    <h1 class="media-title"><?php echo the_title(); ?></h1>
    </div>
    <?php if ($embed) { 
        
        $matches = array();
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $embed, $matches);
        if($matches[0]) {

       
        ?>

      
        <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $matches[0]; ?>" data-poster="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full-cover'); ?>"></div>
    <?php
    }  } ?>




    <?php if ($synopsis) { ?>
        <div class="media-synopsis"><?php echo $synopsis; ?></div>
    <?php
    }  ?>

<?php endwhile; ?>