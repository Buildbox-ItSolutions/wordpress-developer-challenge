<?php
get_header();?>		
	<section class="posts-section">		
		<div class="posts">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>								
			<div class="post">
			   <?php the_post_thumbnail();?>								  
				<h3 class="post-title">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
				</h3>				
			</div>	
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
			<?php endif; ?>						          
		</div>
	</section>

<?php get_footer();
