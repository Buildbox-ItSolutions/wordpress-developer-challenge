<article class="card col-sm-4 col-6 mb-5">
  <picture>
    <?php
      $image = get_field('imagem_de_capa');
      $size = 'thumb-video';
      $thumb = $image['sizes'][ $size ];
    ?>
    <a href="{{ get_permalink() }}"><img src="{{ esc_url($thumb) }}" alt="{!! get_the_title() !!}" class="img-fluid"></a>
  </picture>
  <div class="card-body p-0">
    <a href="{{ get_permalink() }}">
      <h6>{{ get_field('tempo_de_duracao') }}m</h6>
      <h3>{!! get_the_title() !!}</h3>
    </a>            
  </div>
</article>