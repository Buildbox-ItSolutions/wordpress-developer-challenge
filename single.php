<?php
/**
 * Template de vídeos.
 */

get_header(); ?>
<main id="content" class="" role="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<?php
				// Iniciando Loop.
				while ( have_posts() ) : the_post(); $categorias = get_the_terms( get_the_ID(), 'categoria' );?>
				
				<!-- Video Header -->
				<div class="header-video">
					<div class="tags">
						<span><?php foreach($categorias as $categoria) { echo $categoria->name; }?></span>
						<span><?php echo campo('duracao', get_the_ID()); ?>min</span>
					</div>
					<h2><?php the_title(); ?></h2>
				</div>
				
				<!-- Video Player -->
				<?php
				$youtube_id = campo('id', get_the_ID());
				$video_thumb = campo('bg_video', get_the_ID());
				if( !$video_thumb ): 
					$video_thumb = 'https://img.youtube.com/vi/' .  $youtube_id . '/maxresdefault.jpg';
				endif; ?>
				<div class="video t-center" data-id-video="<?php echo $youtube_id; ?>">
					<div class="vd-cover">
					   <img class="vd-img" src="<?php echo $video_thumb; ?>" alt="<?php the_title(); ?>">
						<span class="ico-player ico-video"><img src="<?php echo get_template_directory_uri() . '/assets/img/play.svg'; ?>" width="56"/></span>
					</div>
					<div class="vd-hidden" data-id-video="<?php echo $youtube_id; ?>">
						<!--<iframe class="vd-embed" src="https://www.youtube.com/embed/<?php //echo $youtube_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
					</div>
					
				</div>
				
				<!-- Video Content -->
				<div class="content-video">
					<?php echo campo('sinopse', get_the_ID()); ?>
				</div>
					

				<?php endwhile; ?>
			</div>
		</div>
	</div>
</main><!-- #main -->
<?php
get_footer();
