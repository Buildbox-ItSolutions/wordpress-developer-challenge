@extends('layouts.app')

@section('content')
  <div class="container container-full pt-225">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-single-'.get_post_type())
    @endwhile
  </div>
@endsection
