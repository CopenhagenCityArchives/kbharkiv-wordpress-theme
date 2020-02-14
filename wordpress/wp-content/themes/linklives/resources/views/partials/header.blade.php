<header class="menu-top">
  <a href="#{{ pll__('indhold') }}" class="skip-menu">
    <div class="container-fluid d-flex align-items-center">
      {{ pll__('Gå til hovedindhold') }}
      @include('components.icon', ['icon' => 'arrow-down', 'class' => 'ml-2'])
    </div>
  </a>
  <div class="container-fluid">
    <a class="brand d-lg-none" height="2.5rem" width="auto" href="{{ pll_home_url() }}"><img alt="{{ get_bloginfo('name', 'display') }}" src="@asset('images/link-lives.svg')"></a>
    <button type="button" class="nav-toggle float-right d-lg-none" aria-label="{{ pll__('Hovedmenu') }}" aria-haspopup="true" aria-expanded="false">
      <span class="hamburger"></span>
    </button>
    <nav aria-label="{{ pll__('Hovedmenu') }}">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['walker' => new Sub_Menu_Wrap(), 'container'=> false, 'theme_location' => 'primary_navigation', 'menu_class' => 'menu-item menu-primary']) !!}
      @endif
      <a class="brand d-none d-lg-block" height="2.5rem" width="auto" href="{{ pll_home_url() }}"><img alt="{{ get_bloginfo('name', 'display') }}" src="@asset('images/link-lives.svg')"></a>
      @if (has_nav_menu('secondary_navigation'))
        {!! wp_nav_menu(['container'=> false, 'theme_location' => 'secondary_navigation', 'menu_class' => 'menu-item menu-secondary']) !!}
      @endif
    </nav>
  </div>
</header>
