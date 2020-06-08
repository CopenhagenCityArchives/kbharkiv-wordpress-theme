@php $authors = get_field('author', get_the_ID()); @endphp

@if( $authors )
  @foreach( $authors as $author )
    <div class="author">

      @if ( has_post_thumbnail($author->ID))
        {!! wp_get_attachment_image(get_post_thumbnail_id($author->ID), ['48', '48'], false, ['class' => 'rounded-circle ']) !!}
      @endif

      <div class="d-flex flex-column">
        <h6>{{ get_field('employee_title', $author->ID) ? get_field('employee_title', $author->ID) : 'Medarbejder' }}</h6>
        <h4>{{ get_the_title( $author->ID ) }}</h4>
      </div>
    </div>

  @endforeach
@endif
