@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container-fluid">

    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Vi har ikke lagt vores medarbejdere online. Beklager ulejligheden', 'kbharkiv') }}
      </div>
      {!! get_search_form(false) !!}
    @else
      @php
        $terms = get_terms([
          'taxonomy' => 'employee_category',
          'hide_empty' => true,
        ]);
      @endphp

      <nav class="category-filter" aria-label="Filtrer medarbejdere efter afdeling">
        <a href="{{ get_post_type_archive_link('medarbejdere') }}" class="{{ is_archive('medarbejdere') && !is_tax() ? 'active' : '' }}">{{ __('Alle medarbejdere', 'kbharkiv') }}{!! is_archive('medarbejdere') && !is_tax() ? ' <span class="sr-only">(valgt)</span>' : '' !!}</a>
        @foreach($terms as $term)
          <a href="{{ get_term_link($term->term_id) }}" class="{{ is_tax('employee_category', $term->slug) ? 'active' : '' }}">{{ $term->name }}{!! is_tax('employee_category', $term->slug) ? ' <span class="sr-only">(valgt)</span>' : '' !!}</a>
        @endforeach
      </nav>

      <div class="row">
        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-'.get_post_type())
        @endwhile
      </div>
    @endif
  </div>

  {!! pagination() !!}
@endsection
