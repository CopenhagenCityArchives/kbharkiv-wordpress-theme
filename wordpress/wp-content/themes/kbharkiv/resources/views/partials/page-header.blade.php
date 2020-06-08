@if (!is_front_page())
  <header class="page-header darken-on-scroll" style="background-color: {{ theme_color() }}">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-xl-4">
          <h1>{!! App::title() !!}</h1>
        </div>
        <div class="col-lg-6">
          @php global $wp_query; @endphp
          @if(is_search())
            @php global $wp_query @endphp
            <p class="lead">{{ $wp_query->found_posts > 0 ? ('Viser ' . $wp_query->found_posts . ' søgeresultater') : '' }}<p>
          @else
            <p class="lead">{{ get_the_lead() }}<p>
          @endif
        </div>
        <div class="col-xl-2">
          @if(!is_home())
            @include('partials.author')
          @endif
        </div>
      </div>
    </div>
  </header>

  {{ the_breadcrumb() }}
@endif
