@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="container-fluid">
      <div class="alert alert-warning">
        {{ __('Siden eksisterer ikke.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    </div>
  @endif
@endsection
