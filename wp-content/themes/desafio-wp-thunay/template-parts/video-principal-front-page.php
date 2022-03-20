<a alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>">
	<section class="postPrincipal" style="background-image: url('<?php echo get_field('imagem_capa'); ?>');">
		<div class="fundoPreto"></div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="conteudoPostPrincipal"> <?php     
						$taxonomies = get_the_terms( 
							get_the_ID(), 'tipo' 
						);
						foreach( $taxonomies as $categoria ) { ?>
							<a alt="<?php echo $categoria->name; ?>" title="<?php echo $categoria->name ?>" href="<?php echo get_term_link( $categoria ) ?>">
								<button class="btnCategoria"> <?php 
									echo $categoria->name; ?>	
				        		</button>
			        		</a> <?php
		        		} 
		        		if (!empty(get_field('tempo_duracao'))) { ?> 					
							<button class="btnTempo"><?php the_field('tempo_duracao'); ?>m</button> <?php
						} ?>
						<h1 class="tituloPostPrincipal"><?php echo get_the_title(); ?></h1>
						<a href="<?php echo get_the_permalink(); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
							<button type="button" class="botaoPostPrincipal">
								Mais informações
							</button>
						</a>
					</div>
				</div> 
			</div>
		</div>
	</section>
</a>