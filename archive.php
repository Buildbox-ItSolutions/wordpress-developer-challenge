<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>

	<main id="content" role="main">
		<div id="playCategoria" class="container">
			<div class="row">
				<?php if ( have_posts() ) : ?>
				<div class="col-lg-6 sticky-top">
					<header class="page-header">
						
						<?php 
							if(is_post_type_archive()){ ?>
								<h1 class="page-title"><?php post_type_archive_title(); ?></h1>
							<?php } else { ?>
								<h1 class="page-title"><?php single_term_title(); ?></h1>
								<?php	the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
							<?php } ?>
					</header><!-- .page-header -->
				</div>
				<div class="col-lg-6 itens">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post(); ?>
							<div class="item" style="<?php if(wp_is_mobile()){ echo "width:148px";} else { echo "width:246px";} ?>">
							<a href="<?php the_permalink(); ?>">
								<div class="img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></div>
								<span><?php echo campo('duracao', get_the_ID()); ?>min</span>
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
						<?php endwhile;

						// Page navigation.
						play_paging_nav();

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

			endif; ?>
			</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
