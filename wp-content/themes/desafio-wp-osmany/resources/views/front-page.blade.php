@extends('layouts.app')

@section('content')
  @if($all->have_posts())
  <div class="slick-vitrine">
    @while($all->have_posts())
    @php($all->the_post())
    <div class="item-slick">

      <div class="container container-full h-100 position-relative">
        <div class="description col-md-7 col-sm-10 col-11 hentry">
          <div class="d-flex mb-3">
            <?php
              $post_type = get_post_type();

              if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<h6 class="tag active"><a href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></h6>';
              }
            ?>

            <h6 class="tag">{{ get_field('tempo_de_duracao') }}m</h6>
          </div>
          <h3 class="entry-title mb-4"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h3>

          <a href="{{ get_permalink() }}" class="btn-red">
            Mais informações
          </a>            
        </div>
      </div>
      <?php
        $image = get_field('imagem_de_capa');
        $url = $image['url'];
      ?>
      <img data-lazy="<?php echo esc_url($url) ?>" alt="{!! get_the_title() !!}" class="img-fluid">
    </div>
    @endwhile
    @php( wp_reset_query() )
  </div>
  @endif

  @include('partials.front-page.filmes')
  @include('partials.front-page.documentarios')
  @include('partials.front-page.series')
@endsection
