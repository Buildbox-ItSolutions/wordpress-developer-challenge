<?php
get_header();?>		
	<section class="single-post">		
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>								
			<div class="post">
			   <?php the_post_thumbnail();?>								  
				<h3 class="post-title">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
				</h3>				
			</div>	
			<?php endwhile; ?>
			<a href="" class="navigation"><?php the_posts_pagination(); ?></a>
			<?php endif; ?>						          
		
	</section>

<?php get_footer();