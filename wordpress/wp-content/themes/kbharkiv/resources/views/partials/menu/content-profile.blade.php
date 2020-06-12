@if (is_user_logged_in())
  <li class="profile ml-auto parent" data-level="1" data-color="{{ color(get_field('color_theme', 'option'), 0) }}">
    <a class="d-flex align-items-center" href="#">Profil @include("partials.icon", ["icon" => "user", "class" => "ml-2"])</a>
    <ul class="sub-menu" data-level="1">
      <li class="nav-back d-lg-none"><a tabindex="0" href="#">Tilbage</a></li>
      <li><a href="{{ get_field('my_page', 'option')['url'] }}" tabindex="0">Min side</a></li>
      <li><a href="{{ wp_logout_url() }}" tabindex="0">Log ud</a></li>
      <button class="nav-toggle desktop-menu-toggle top-menu-focusable"><span class="sr-only">Luk menu</span><div class="hamburger"></div></button>
    </ul>
  </li>
@else
  <li class="profile ml-auto">
    <a class="d-flex align-items-center" href="{{ get_field('login_page', 'option')['url'] }}">Log ind @include("partials.icon", ["icon" => "lock", "class" => "ml-2"])</a>
  </li>
@endif
