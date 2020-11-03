<?php
/**
Template name: Home
 * The template for home page
 *
*/?>
<?php get_header();?> 
<?php 
// get taxonomies terms links
function custom_taxonomies_terms_links() {
    global $post, $post_id;
    // get post by post id
    $post = &get_post($post->ID);
    // get post type by post
    $post_type = $post->post_type;
    // get post type taxonomies
    $taxonomies = get_object_taxonomies($post_type);
    $out = "";
    foreach ($taxonomies as $taxonomy) {        
        // $out .= "".$taxonomy.": ";
        $out .= "" .  "  "; // dessa forma, é possível omitir a palavra "gênero"
        // get the terms related to post
        $terms = get_the_terms( $post->ID, $taxonomy );
        if ( !empty( $terms ) ) {
            foreach ( $terms as $term )
                $out .= '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a> ';
        }
        $out .= "";
    }
    $out .= "";
    return $out;
} ?>

<?php get_template_part('template-parts/content','hero'); ?> 
<section class="categories">
  <div class="movie-types">
      <div  class="type">
         <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/1.svg" alt="">
         <p>Filmes</p>
      </div>

        <div class="type">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/3.svg" alt="">
            <p>Documentários</p>
        </div>

        <div  class="type">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/2.svg" alt="">	
            <p>Séries</p>
      </div>

 </div>	
 <?php get_template_part('template-parts/content','filmes'); ?>    
 <?php get_template_part('template-parts/content','documentarios'); ?>    
 <?php get_template_part('template-parts/content','series'); ?> 
 </section>

 
<?php get_footer();?>