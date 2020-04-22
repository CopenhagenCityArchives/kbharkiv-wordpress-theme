<div>
  <div class="page-header">
    <h1>{!! App::title() !!}</h1>
  </div>

  @php
  if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
  }
  @endphp
</div>
