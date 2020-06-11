@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if(get_field('page_headline_in_header'))
      @include('partials.page-header')
    @else
      {{ the_breadcrumb() }}
    @endif

    @include('partials.content-single-'.get_post_type())

    @include('partials.modules')

    @include('partials.tags')

    @include('partials.child-pages')

  @endwhile
@endsection
