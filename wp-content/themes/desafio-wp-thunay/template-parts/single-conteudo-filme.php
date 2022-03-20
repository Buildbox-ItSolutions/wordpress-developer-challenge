<?php
	$taxonomies = get_the_terms( 
		get_the_ID(), 'tipo' 
	);
?>			
<div class="col-12"> 
	<div class="tituloSingle"> <?php
		if (!empty($taxonomies)) {
			foreach($taxonomies as $category) { ?>
				<a alt="<?php echo $category->name;	?>	" title="<?php echo $category->name; ?>	"href="<?php echo get_category_link( $category->term_id ) ?>">
					<button class="btnCategoria"><?php echo $category->name; ?></button>
				</a> <?php
			}
		} 
		if (!empty(get_field('tempo_duracao'))) { ?>	
			<button class="btnTempo"><?php the_field('tempo_duracao'); ?>m</button> <?php	
		} ?>
		<h1><?php echo get_the_title(); ?></h1> <?php
		if(!empty(get_field('descricao'))){ ?>
			<h2 class="descricaoSingle"><?php echo get_field('descricao'); ?></h2><?php
		} ?>
	</div>
</div>
<div class="col-12 iframeSingle">
	<?php echo get_field('video'); ?>
</div>
<div class="col-12">
	<div class="sinopseSingle">
		<?php  echo get_field('sinopse'); ?>
	</div>
</div>