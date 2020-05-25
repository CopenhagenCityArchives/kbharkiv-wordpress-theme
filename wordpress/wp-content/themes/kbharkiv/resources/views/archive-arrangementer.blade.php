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
      @php $prev_date = null @endphp
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type(), ['prev_date' => $prev_date])
        @php $prev_date = strtotime(get_field('event_start')) @endphp
      @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
