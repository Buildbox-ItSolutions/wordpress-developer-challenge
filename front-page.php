<?php 
/**
** Template homepage
**/

get_header(); ?>
<section id="hero">
	<div class="container-fluid">
		<!-- Último filme -->
		<?php
		$videos = array(
			'post_type' => 'video',
			'posts_per_page' => 1
		);
		$q_destaq = new WP_Query ( $videos ); 
		?>
		<?php if ( $q_destaq->have_posts() ) : while ( $q_destaq->have_posts() ) : $q_destaq->the_post(); 
		$categorias = get_the_terms( get_the_ID(), 'categoria' );
		$youtube_id = campo('id', get_the_ID());
		$video_thumb = campo('bg_video', get_the_ID());
		if( !$video_thumb ): 
			$video_thumb = 'https://img.youtube.com/vi/' .  $youtube_id . '/maxresdefault.jpg';
		endif; ?>
			<div class="destaque" style="background-image:url(<?php echo $video_thumb; ?>)">
				<div class="container">
					<div class="row">
					<div class="col-lg-8">
						<div class="tags">
							<span><?php foreach($categorias as $categoria) { echo $categoria->name; }?></span>
							<span><?php echo campo('duracao', get_the_ID()); ?>min</span>
						</div>
						<h3><?php the_title(); ?></h3>
						<a href="<?php the_permalink(); ?>" class="btn-padrao-big">Mais informações</a>
						
					</div>
					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
	</div>
</section>

<section id="categoria">
	<div class="container">
		<div class="row">
			<h2><?php _e( 'Filmes', 'play' ); ?></h2>
			<!-- Loop Filmes -->
			<div id="playCarousel" class="filmes">
				<div id="playFilmes" class="owl-carousel owl-theme">
					<?php
					$filmes = array(
						'post_type' => 'video',
						'categoria' => 'filmes'
					);
					$q_filmes = new WP_Query ( $filmes ); 
					?>
					<?php if ( $q_filmes->have_posts() ) : while ( $q_filmes->have_posts() ) : $q_filmes->the_post(); ?>
						<div class="item" style="<?php if(wp_is_mobile()){ echo "width:148px";} else { echo "width:246px";} ?>">
							<a href="<?php the_permalink(); ?>">
								<div class="img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></div>
								<span><?php echo campo('duracao', get_the_ID()); ?>min</span>
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					<?php endwhile; endif; ?>
				</div>
				<div class="owl-theme">
					<div class="owl-controls">
						<div class="custom-nav owl-nav"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="categoria">
	<div class="container">
		<div class="row">
			<h2><?php _e( 'Documentários', 'play' ); ?></h2>
			<!-- Loop Documentários -->
			<div id="playCarousel" class="doc">
				<div id="playDocumentarios" class="owl-carousel owl-theme">
					<?php
					$doc = array(
						'post_type' => 'video',
						'categoria' => 'documentarios'
					);
					$q_doc = new WP_Query ( $doc ); 
					?>
					<?php if ( $q_doc->have_posts() ) : while ( $q_doc->have_posts() ) : $q_doc->the_post(); ?>
						<div class="item" style="<?php if(wp_is_mobile()){ echo "width:148px";} else { echo "width:246px";} ?>">
							<a href="<?php the_permalink(); ?>">
								<div class="img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></div>
								<span><?php echo campo('duracao', get_the_ID()); ?>min</span>
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					<?php endwhile; endif; ?>
				</div>
				<div class="owl-theme">
					<div class="owl-controls">
						<div class="custom-nav owl-nav"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="categoria">
	<div class="container">
		<div class="row">
			<h2><?php _e( 'Séries', 'play' ); ?></h2>
			<!-- Loop Séries -->
			<div id="playCarousel" class="series">
				<div id="playSeries" class="owl-carousel owl-theme">
					<?php
					$series = array(
						'post_type' => 'video',
						'categoria' => 'series'
					);
					$q_series = new WP_Query ( $series ); 
					?>
					<?php if ( $q_series->have_posts() ) : while ( $q_series->have_posts() ) : $q_series->the_post(); ?>
						<div class="item" style="<?php if(wp_is_mobile()){ echo "width:148px";} else { echo "width:246px";} ?>">
							<a href="<?php the_permalink(); ?>">
								<div class="img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" /></div>
								<span><?php echo campo('duracao', get_the_ID()); ?>min</span>
								<h3><?php the_title(); ?></h3>
							</a>
						</div>
					<?php endwhile; endif; ?>
				</div>
				<div class="owl-theme">
					<div class="owl-controls">
						<div class="custom-nav owl-nav"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
