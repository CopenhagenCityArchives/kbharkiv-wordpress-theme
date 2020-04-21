@php $authors = get_field('author'); @endphp

@if( $authors )
  @foreach( $authors as $author )
    {{ get_the_title( $author->ID ) }}
  @endforeach
@endif
