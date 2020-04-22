<header class="banner" style="background-color: {{ theme_color() }}">
  <div class="container-fluid">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['walker'	=> new Kbharkiv_Walker_Nav_Menu, 'theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
