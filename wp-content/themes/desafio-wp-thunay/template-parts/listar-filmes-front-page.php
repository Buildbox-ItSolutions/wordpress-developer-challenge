<div class="col-xxl-1 col-lg-3 col-md-3 col-sm-6">
	<a alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>"><div class="capaListaFilmes" style="background-image: url('<?php echo get_field('imagem_capa'); ?>');"></div></a> <?php
	if (!empty(get_field('tempo_duracao'))) { ?> 
		<button class="btnTempo">
			<a alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>"><?php echo get_field('tempo_duracao'); ?>m</a>
		</button> <?php
	} ?>
	<h3><a alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
</div>