@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container-fluid">

    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Vi kunne ikke finde nogen resultater', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @else
      <div class="row">
        @while(have_posts()) @php the_post() @endphp
          @include('partials.content-search')
        @endwhile
      </div>
    @endif
  </div>

  {!! pagination() !!}
@endsection
