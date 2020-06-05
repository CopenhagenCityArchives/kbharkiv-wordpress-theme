@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="container-fluid">
      <div class="alert alert-warning">
        {{ __('Vi kunne ikke finde nogen resultater', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    </div>
  @endif

  <div class="container-fluid">
    <div class="row">
      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-search')
      @endwhile
    </div>

  </div>

  {!! pagination() !!}
@endsection
