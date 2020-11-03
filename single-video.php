<?php
/**
 * The template for displaying all single videos
 *
 */
get_header(); ?>

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

<?php
$embed = get_field('url_do_video');
?>
<section class="single-movie">              
	<div class="container">  
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>			
			<div class="container-row"> 
				<button class="movie"> <?php echo custom_taxonomies_terms_links();?></button>
				<button class="time"><?php the_field('duracao'); ?></button>       
			</div>
			<div class="info">
				<h1 class="title"><?php the_title(); ?></h1>            
			</div>            
		</div>     
</section>	

	<div class="video-info">			
		<?php echo $embed; ?>
		<div class="description">
			<p><?php the_content(); ?></p>
		</div>									
	</div> 

	
	
	<?php endwhile; ?>			
	<?php endif; ?>		
</section>
<?php get_footer();




	


