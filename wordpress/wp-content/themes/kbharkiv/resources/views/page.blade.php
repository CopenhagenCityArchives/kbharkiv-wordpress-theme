@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if(get_field('page_headline_in_header') && !is_front_page())
      @include('partials.page-header')
    @elseif(!is_front_page())
      {{ the_breadcrumb() }}
    @endif

    @include('partials.content-single-'.get_post_type())

    @include('partials.modules')

    @include('partials.tags')

    @include('partials.child-pages')

  @endwhile
@endsection
