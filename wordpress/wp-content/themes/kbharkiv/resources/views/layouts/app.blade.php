<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class(get_theme_color(1)) @endphp>
    @php do_action('get_header') @endphp

    @include('partials.header')
    <div class="wrap{{is_page_template('views/template-searchsdk.blade.php') ? '' : '' }}" role="document">
      <div id="content">
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

    @include('partials.chat')

    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
