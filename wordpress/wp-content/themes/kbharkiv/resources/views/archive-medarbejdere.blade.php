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

    @php

      $terms = get_terms([
        'taxonomy' => 'employee_category',
        'hide_empty' => true,
      ]);
    @endphp

    <nav class="category-filter">
      <a href="{{ get_post_type_archive_link('medarbejdere') }}" class="{{ is_archive('medarbejdere') && !is_tax() ? 'active' : ''}}">Alle medarbejdere</a>
      @foreach($terms as $term)
        <a href="{{ get_term_link($term->term_id) }}" class="{{ is_tax('employee_category', $term->slug) ? 'active' : '' }}">{{ $term->name }}</a>
      @endforeach
    </nav>

    <div class="row">
      @while (have_posts()) @php the_post() @endphp
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
