@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile

  @if (has_post_thumbnail())
    @php the_post_thumbnail(); @endphp
  @endif

  @if( have_rows('modules') )
    @while ( have_rows('modules') )
      @php the_row() @endphp
      @include('partials.content-' . str_replace('_', '-', get_row_layout()))
    @endwhile
  @endif

  <h6>Lokation</h6>
  @if( get_field('event_location') )
    {{ get_field('event_location') }}
  @endif

  <h6>Start</h6>
  @if( get_field('event_start') )
    {{ get_field('event_start') }}
  @endif

  <h6>Slut</h6>
  @if( get_field('event_end') )
    {{ get_field('event_end') }}
  @endif

  <h6>Køb billet</h6>
  @if( get_field('event_link') )
    <a href="{{ get_field('event_link') }}">Køb billet</a>
  @endif

  <h6>Pris</h6>
  @if( get_field('event_price') )
    {{ get_field('event_price') }}
  @else
    Gratis
  @endif

@endsection
