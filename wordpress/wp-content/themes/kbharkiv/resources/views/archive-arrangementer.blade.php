@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container-fluid">

    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Vi har ingen fremtidige arrangementer i øjeblikket.', 'kbharkiv') }}
      </div>
      {!! get_search_form(false) !!}
    @else
      @php $prev_date = null @endphp
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type(), ['prev_date' => $prev_date])
        @php $prev_date = strtotime(get_field('event_start')) @endphp
      @endwhile
    @endif

  </div>

  {!! pagination() !!}
@endsection
