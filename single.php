<?php get_header();?>

  <?php if (have_posts()): while (have_posts()): the_post();
            $tempoVideo = get_post_meta( get_the_ID(), 'tempo_video', true);
            $typeVideo = get_post_meta( get_the_ID(), 'type_video', true);
            $urlVideo = get_post_meta( get_the_ID(), 'url_video', true);
            $post_id = get_the_ID(); // or use the post id if you already have it
            $category_object = get_the_category($post_id);
            $category_name = $category_object[0]->name;
  ?>

    <section class="single">
      <div class="padding">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <div class="col-sm-12 col-lg-2"></div>
            <div class="col-sm-12 col-lg-8">
              <div class="tags">
                <span class="badge bg-light text-dark me-3"><?=$category_name ?></span>
                <span class="badge border-light text-light mt-3"><?=$tempoVideo ?></span>
              </div>

              <h1 class="mt-3"><?php=the_title()?></h1>
            </div>
            <div class="col-sm-12 col-lg-2"></div>

          </div>


        </div>
      </div>

      <video controls>
        <source src="<?=$urlVideo?>" type="<?=$typeVideo?>">
      </video>

      <div class="padding">
        <div class="container-fluid">
          <?=the_content()?>
        </div>
      </div>
    </section>
<?php endwhile?>
<?php else: ?>
  <section>
    <h1 class="mt-3">Não encontrado</h1>
  </section>
  <?php endif;?>
    <section class="categorias-icones">
      <ul>
        <?php
        $categories = get_categories();
        foreach($categories as $category)
        {
        ?>

        <li>
          <a href="<?=get_category_link($category->term_id);?>">
            <img src="<?=get_template_directory_uri()?>/assets/svg/<?=$category->slug?>.svg" width="24" height="16" alt="<?=$category->name?>" />
            <span><?=$category->name?></span>
          </a>
         </li>
        <?php
        }

        ?>

      </ul>
    </section>


<?php get_footer();?>
