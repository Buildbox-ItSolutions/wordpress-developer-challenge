<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

<main id="content" role="main">
	<div id="playCategoria" class="container">
		<div class="row">	
			</header><!-- .page-header -->
			<?php if ( have_posts() ) : ?>
			<div class="col-lg-6 sticky-top">
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Resultados para: <b>%s</b>', 'play' ), get_search_query() ); ?></h1>
				</header><!-- .page-header -->
			</div>
			<div class="col-lg-6 itens">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post(); ?>
							<div class="item" style="<?php if(wp_is_mobile()){ echo "width:148px";} else { echo "width:246px";} ?>">
							<a href="<?php the_permalink(); ?>">
								<div class="img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" /></div>
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
</main><!-- #main -->

<?php
get_footer();
