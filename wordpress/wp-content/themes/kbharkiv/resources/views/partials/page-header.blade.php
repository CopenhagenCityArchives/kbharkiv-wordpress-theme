<div>
  <div class="page-header">
    <h1>{!! App::title() !!}</h1>
  </div>
  @if(get_field('lead', get_post_type() . '_options'))
    <p class="lead">{{get_field('lead', get_post_type() . '_options')}}</p>
  @elseif ( get_field('lead'))
    <p class="lead">{{get_field('lead')}}</p>
  @endif

  @php
  if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
  }
  @endphp
</div>
