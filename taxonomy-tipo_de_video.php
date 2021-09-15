
<?php
/* Template Name:tipo de video*/
get_header(); ?>


<div id="content" class="site-content tipo_de_video">

	<div class="container-fluid section_tax">
		<div class="row">
			<div class="col-sm-6">
				<h1 class="section__titles">
				<?php
					$taxonomy = get_queried_object();
					echo $taxonomy = $taxonomy->name;
					?>
				</h1>
				<?php echo ' <div class="section_tax__description">' . term_description( ) . '</div>'; ?>
			</div>
			<div class="col-lg-6">
				<div class="row">
					<?php while ( have_posts() ) : the_post();?>
					<div class="content__box col-sm-4">		
						<a href="<?php echo get_permalink();?>">
						<div class="block">
							<img class="responsive-img " src='<?php the_field('imagem_de_capa'); ?>'>
						</div>
						<div class="content__box__description">
                        <div class="slider__box w-50 ">
                            <p><?php the_field('tempo_de_duracao'); ?> m</p>
                        </div>
						<h2 class="content__box__title"><?php the_title(); ?></h2>
						</a>
                     </div>
					</div><!-- end content box -->
				
				<?php endwhile;?>
				</div> <!-- end row -->
			</div> <!-- end col-lg-6-->
		</div>


	</div><!-- end container -->
</div><!-- content end -->
<?php get_footer(); ?>
