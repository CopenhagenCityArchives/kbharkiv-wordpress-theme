@php $authors = get_field('author'); @endphp

@if( $authors )
  @foreach( $authors as $author )
    <a class="d-block mb-4" href="{{ get_permalink( $author->ID ) }}">
      @include('components.byline', ['id' => $author->ID, 'flex' => 'd-flex d-lg-block d-xl-flex'])
    </a>
  @endforeach
@endif
