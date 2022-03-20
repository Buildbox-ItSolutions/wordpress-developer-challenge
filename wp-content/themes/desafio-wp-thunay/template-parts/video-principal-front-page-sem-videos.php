<section class="postPrincipal" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/background-sem-videos.jpg);">
	<div class="fundoPreto"></div>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="conteudoPostPrincipal">
					<h1 class="tituloPostPrincipal">Não há nenhum vídeo disponível no momento.</h1> <?php
					if(!is_user_logged_in()){ ?>
						<h2 class="subTituloSemPosts">Nos desculpe o transtorno. Por favor, retorne mais tarde.</h2> <?php
					}else{ ?>
						<h2 class="subTituloSemPosts"><a href="<?php echo get_home_url(); ?>/wp-admin/post-new.php?post_type=video">Clique aqui</a> para adicionar um novo vídeo</h2> <?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>