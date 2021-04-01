<?php get_header();?>
<section class="categoria integra mt-5">
  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-lg-6">
      <h1><?=single_cat_title( '', false ); ?></h1>
      <p><?=category_description(); ?></p>

    </div>
    <div class="col-sm-12 col-lg-6">
      <nav>
        <ul class="nav">
          <?php
            while ( have_posts() ) : the_post();
              $tempoVideo = get_post_meta( get_the_ID(), 'tempo_video', true);
            ?>
          <li class="nav-item">
            <div class="capa overflow-hidden">
              <a href="<?php the_permalink()?>">
                <?php
if (has_post_thumbnail()) {
the_post_thumbnail('custom-thumbnail-size', array('class' => 'img-fluid mx-auto destaque', 'alt' => the_title_attribute()));
}?>
              </a>
              <!-- <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture> -->
            </div>
            <span class="badge border-light text-light mt-3"><?=$tempoVideo?>m</span>
            <h3 class="mt-3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
          </li>

        <?php endwhile;  ?>


          <!-- <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-ivy-son-3490257.jpg" type="image/jpeg">
                <img src="assets/img/pexels-ivy-son-3490257.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">100m</span>
            <h3 class="mt-3">Nunc pellentesque arcu sed</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-dazzle-jam-1190208.jpg" type="image/jpeg">
                <img src="assets/img/pexels-dazzle-jam-1190208.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">240m</span>
            <h3 class="mt-3">Maecenas tempus mi a ex malesuada</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">3</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">Proin sollicitudi</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-ivy-son-3490257.jpg" type="image/jpeg">
                <img src="assets/img/pexels-ivy-son-3490257.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">100m</span>
            <h3 class="mt-3">Nunc pellentesque arcu sed</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-dazzle-jam-1190208.jpg" type="image/jpeg">
                <img src="assets/img/pexels-dazzle-jam-1190208.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">240m</span>
            <h3 class="mt-3">Maecenas tempus mi a ex malesuada</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">3</h3>
          </li>


          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">Proin sollicitudi</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-ivy-son-3490257.jpg" type="image/jpeg">
                <img src="assets/img/pexels-ivy-son-3490257.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">100m</span>
            <h3 class="mt-3">Nunc pellentesque arcu sed</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-dazzle-jam-1190208.jpg" type="image/jpeg">
                <img src="assets/img/pexels-dazzle-jam-1190208.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">240m</span>
            <h3 class="mt-3">Maecenas tempus mi a ex malesuada</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">3</h3>
          </li>


          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">Proin sollicitudi</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-ivy-son-3490257.jpg" type="image/jpeg">
                <img src="assets/img/pexels-ivy-son-3490257.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">100m</span>
            <h3 class="mt-3">Nunc pellentesque arcu sed</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-dazzle-jam-1190208.jpg" type="image/jpeg">
                <img src="assets/img/pexels-dazzle-jam-1190208.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">240m</span>
            <h3 class="mt-3">Maecenas tempus mi a ex malesuada</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">3</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">Proin sollicitudi</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-ivy-son-3490257.jpg" type="image/jpeg">
                <img src="assets/img/pexels-ivy-son-3490257.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">100m</span>
            <h3 class="mt-3">Nunc pellentesque arcu sed</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-dazzle-jam-1190208.jpg" type="image/jpeg">
                <img src="assets/img/pexels-dazzle-jam-1190208.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">240m</span>
            <h3 class="mt-3">Maecenas tempus mi a ex malesuada</h3>
          </li>

          <li class="nav-item">
            <div class="capa overflow-hidden">
              <picture>
                <source srcset="assets/img/pexels-gabriel-hohol-3593922.jpg" type="image/jpeg">
                <img src="assets/img/pexels-gabriel-hohol-3593922.jpg" class="img-fluid mx-auto destaque" alt="Titulo vídeo">
              </picture>
            </div>
            <span class="badge border-light text-light mt-3">130m</span>
            <h3 class="mt-3">3</h3>
          </li> -->
        </ul>
      </nav>
    </div>
  </div>
</div>

</section>
<?php get_footer();?>
