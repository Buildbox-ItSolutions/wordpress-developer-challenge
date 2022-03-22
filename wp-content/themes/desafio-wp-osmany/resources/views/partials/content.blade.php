<article @php post_class() @endphp>
  <div class="row pb-110">
    <div class="col-md-5 mb-5">
      <header>
        <h2>{!! App::title() !!}</h2>
      </header>
      <div class="entry-summary">
        @php the_content() @endphp
      </div>
    </div>
    <div class="col-md-6 offset-md-1">
      <div class="row">
      @if($filmes->have_posts())
        @while($filmes->have_posts())
        @php($filmes->the_post())
          @include('partials/item')
        @endwhile
        @php( wp_reset_query() )
      @endif
      </div>
    </div>
  </div>
</article>
