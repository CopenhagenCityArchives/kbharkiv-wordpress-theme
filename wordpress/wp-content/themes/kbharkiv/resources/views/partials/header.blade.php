<header class="top-menu" style="background-color: {{ theme_color() }}">
  <div class="container-fluid d-flex align-items-center">
    <a class="sr-only sr-only-focusable" href="#content">Gå til hovedindhold</a>

    <a class="brand flex-grow-1" href="{{ home_url('/') }}">
      <div>Københavns</div>
      <div>Stadsarkiv</div>
    </a>
    <button class="nav-toggle d-lg-none" href="">
      <span class="sr-only">Åbn menu</span>
      <div class="hamburger"></div>
    </button>
  </div>

  <nav style="background-color: {{ theme_color() }}">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['walker'	=> new Kbharkiv_Walker_Nav_Menu, 'theme_location' => 'primary_navigation']) !!}
    @endif
  </nav>
</header>
