<section class="pb-110">
  <div class="container container-full">
    <h2>Séries</h2>

    <div class="slick-movies">
      @if($series->have_posts())
        @while($series->have_posts())
        @php($series->the_post())
        <article class="card">
          <picture>
            <?php
              $image = get_field('imagem_de_capa');
              $size = 'thumb-video';
              $thumb = $image['sizes'][ $size ];
            ?>
            <a href="{{ get_permalink() }}"><img data-lazy="{{ esc_url($thumb) }}" alt="{!! get_the_title() !!}" class="img-fluid"></a>
          </picture>
          <div class="card-body p-0">
            <a href="{{ get_permalink() }}">
              <h6>{{ get_field('tempo_de_duracao') }}m</h6>
              <h3>{!! get_the_title() !!}</h3>
            </a>            
          </div>
        </article>
        @endwhile
        @php( wp_reset_query() )
      @endif
    </div>
  </div>
</section>
