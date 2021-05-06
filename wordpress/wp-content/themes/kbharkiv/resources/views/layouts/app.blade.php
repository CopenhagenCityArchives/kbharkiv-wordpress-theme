<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php body_class(get_theme_color(1)) @endphp>
    @php
      do_action('get_header')
    @endphp

    @include('partials.header')

    <div class="wrap{{is_page_template('views/template-searchsdk.blade.php') ? '' : '' }}" role="document">
      <div id="content">
        <main class="main">
          @if(!post_password_required())
            @yield('content')
          @else
            @include('partials.page-header')
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8 col-xl-6 offset-lg-1">
                    <div class="entry-content">
                      {!! get_the_password_form() !!}
                    </div>
                  </div>
                </div>
              </div>
            </section>
          @endif
        </main>
      </div>
    </div>

    @include('partials.chat')

    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
