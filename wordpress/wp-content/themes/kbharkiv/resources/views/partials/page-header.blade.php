@if (!is_front_page())
  <header class="page-header" style="background-color: {{ theme_color() }}">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-xl-4">
          <h1>{!! App::title() !!}</h1>
          {{ !is_tag() || !is_archive() ? the_tags() : '' }}
        </div>
        <div class="col-lg-6">
          <p class="lead">{{ get_the_lead() }}<p>
        </div>
        <div class="col-xl-2">
          @include('partials.author')
        </div>
      </div>
    </div>
  </header>

  {{ the_breadcrumb() }}
@endif
