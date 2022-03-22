<article @php post_class() @endphp>
  <div class="row pb-110">
    <div class="col-md-5 mb-5">
      <header>
        <h2>{!! App::title() !!}</h2>
      </header>
      <div class="entry-summary">
        @php $page = get_page_by_title('Filmes'); @endphp

        <?php echo apply_filters('the_content', $page->post_content); ?>
      </div>
    </div>
    <div class="col-md-7 col-lg-6 offset-lg-1">
      <div class="row">
      @if($filmes->have_posts())
        @while($filmes->have_posts())
        @php($filmes->the_post())
          @include('partials/components/item')
        @endwhile
        @php( wp_reset_query() )
      @endif
      </div>
    </div>
  </div>
</article>
