@extends('layouts.app')

@section('content')
  @if(!is_front_page()) @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    @if ( !empty(get_the_content()) )
      @include('partials.content-page')
    @endif
  @endwhile @endif

  @if( have_rows('modules') )
    @while ( have_rows('modules') )
      @php the_row() @endphp
      @include('partials.content-' . str_replace('_', '-', get_row_layout()))
    @endwhile
  @endif
@endsection
