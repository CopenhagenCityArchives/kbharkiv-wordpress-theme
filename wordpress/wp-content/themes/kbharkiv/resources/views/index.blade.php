@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="container-fluid">
    <div class="row">
      @while (have_posts()) @php the_post() @endphp
        @if (is_tag())
          @include('partials.content-search')
        @else
          @include('partials.content-'.get_post_type())
        @endif
      @endwhile
    </div>
  </div>

  {!! pagination() !!}
@endsection
