<header class="top-menu" data-color="{{ get_theme_color() }}" style="background-color: {{ get_theme_color() }}">
  <div class="container-fluid d-lg-flex align-items-center">
    <div class="d-flex align-items-center">
      <a class="sr-only sr-only-focusable" href="#content">Gå til hovedindhold</a>

      <a class="brand top-menu-focusable" href="{{ home_url('/') }}">
        <div>Københavns</div>
        <div>Stadsarkiv</div>
      </a>

      <button class="nav-toggle mobile-menu-toggle d-lg-none ml-auto top-menu-focusable">
        <span class="sr-only">Åbn menu</span>
        <div class="hamburger"></div>
      </button>
    </div>

    <nav aria-label="Hovedmenu">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['walker'	=> new Kbharkiv_Walker_Nav_Menu, 'container' => false, 'theme_location' => 'primary_navigation']) !!}
      @endif
    </nav>
  </div>
</header>
