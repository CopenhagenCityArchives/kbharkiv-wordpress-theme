<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp

    {{-- @if( get_field('color_theme') )
      @php
      $theme_colors = explode(',', get_field('color_theme'));
      $theme_light = $theme_colors[0];
      $theme_dark = $theme_colors[1];
      @endphp
    @elseif($post->post_parent)
      @php
      $ancestors = get_post_ancestors($post->ID);
      $root = count($ancestors)-1;
      $parent_id = $ancestors[$root];
      @endphp

      @if (get_field('color_theme', $parent_id))
        @php
        $theme_colors = explode(',', get_field('color_theme', $parent_id));
        $theme_light = $theme_colors[0];
        $theme_dark = $theme_colors[1];
        @endphp
      @endif
    @endif --}}


    @include('partials.header')
    <div class="wrap container-fluid" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        {{-- @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif --}}
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
