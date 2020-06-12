@extends('layouts.app')

@section('content')
  {{ the_breadcrumb() }}

  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())

    @include('partials.modules')

    @include('partials.tags', ['container' => true, 'class' => 'd-xl-none'])

    @include('partials.nav-post', ['container' => true])

  @endwhile

@endsection
