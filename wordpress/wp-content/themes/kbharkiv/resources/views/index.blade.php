@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container-fluid">

    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Ingen indlæg.', 'kbharkiv') }}
      </div>
      {!! get_search_form(false) !!}
    @else
      <div class="row">
        @while (have_posts()) @php the_post() @endphp
          @if (is_tag())
            @include('partials.content-search')
          @else
            @include('partials.content-'.get_post_type())
          @endif
        @endwhile
      </div>
    @endif
  </div>

  {!! pagination() !!}
@endsection
