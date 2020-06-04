@if (!is_front_page())
  <header class="page-header" style="background-color: {{ theme_color() }}">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-xl-4">
          <h1>{!! App::title() !!}</h1>
          {{ !is_tag() ? the_tags() : '' }}
        </div>
        <div class="col-lg-6">
          <p class="lead">{{ get_the_lead() }}<p>
        </div>
        <div class="col-xl-2">
          @php $authors = get_field('author'); @endphp

          @if( !is_tag() && $authors )
            @foreach( $authors as $author )
              @if ( has_post_thumbnail($author->ID))
                {!! wp_get_attachment_image(get_post_thumbnail_id($author->ID), ['48', '48'], false, ['class' => 'rounded-circle ']) !!}
              @endif

              <div class="d-flex flex-column">
                  {{ get_field('employee_title', $author->ID) ? get_field('employee_title', $author->ID) : 'Medarbejder' }}
                <h4>{{ get_the_title( $author->ID ) }}</h4>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </header>

  {{ the_breadcrumb() }}
@endif
