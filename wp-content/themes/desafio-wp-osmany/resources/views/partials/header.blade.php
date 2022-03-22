<header class="banner">
  <div class="container container-full d-flex justify-content-md-between justify-content-center">
    <a class="brand" href="{{ home_url('/') }}">
      <img class="img-fluid" src="{{ \App\asset_path('images/logo-play.svg') }}" alt="{{ get_bloginfo('name', 'display') }}">
    </a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav d-flex justify-content-between']) !!}
      @endif
    </nav>
  </div>
</header>