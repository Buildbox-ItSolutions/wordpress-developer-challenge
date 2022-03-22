@extends('layouts.app')

@section('content')

<div class="container container-full pt-225">

  @include('partials.content-'.get_post_type())

</div>

@endsection
