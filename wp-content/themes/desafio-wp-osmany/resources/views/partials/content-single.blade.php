<article @php post_class() @endphp>
  <header class="mx-md-auto col-md-8 mb-5">
    <div class="d-flex mb-3">
      @php
        $post_type = get_post_type();
              
        if($post_type != 'post') {
          $post_type_object = get_post_type_object($post_type);
          $post_type_archive = get_post_type_archive_link($post_type);

          echo '<h6 class="tag active"><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></h6>';
        }
      @endphp

      <h6 class="tag">{{ get_field('tempo_de_duracao') }}m</h6>
    </div>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>

  <?php
    $image = get_field('imagem_de_capa');
    $url = $image['url'];
  ?>

  <a href="{{ the_field('embed_de_video', false, false) }}" class="thumb-video fancybox" data-fancybox="gallery">
    <img src="{{ \App\asset_path('images/play-light.svg') }}" alt="" class="ico-play">
    <img src="<?php echo esc_url($url) ?>" alt="Assitir - {!! get_the_title() !!}" title="Assitir - {!! get_the_title() !!}" class="img-fluid">
  </a>

  <div class="entry-content mx-md-auto col-md-8">
    @php the_content() @endphp
  </div>
</article>