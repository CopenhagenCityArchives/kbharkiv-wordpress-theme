<header class="page-header darken-on-scroll" style="background-color: {{ theme_color() }}">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7">
        @php $category = get_the_term_list( get_the_ID(), 'event_category', '', ', ', '' ) @endphp
        @if ($category)
          <h4>{!! $category !!}</h4>
        @endif

        <h1 id="headline">{!! App::title() !!}</h1>
      </div>
    </div>
  </div>
</header>

{{ the_breadcrumb() }}
