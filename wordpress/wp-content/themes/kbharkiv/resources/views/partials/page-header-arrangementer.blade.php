<header class="page-header" style="background-color: {{ theme_color() }}">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7">
        <h6>{!! get_the_term_list( get_the_ID(), 'event_category', '', ', ', '' ) !!}</h6>
        <h1 id="headline">{!! App::title() !!}</h1>
      </div>
    </div>
  </div>
</header>

{{ the_breadcrumb() }}
