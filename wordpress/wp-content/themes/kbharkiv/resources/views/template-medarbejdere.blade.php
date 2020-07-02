{{--
  Template Name: Medarbejdere
--}}

@php
  global $post;
  $posts = get_posts(array(
    'post_type' => 'medarbejdere',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
  ));
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

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

        <nav class="category-filter">
          <a href="{{ get_post_type_archive_link('medarbejdere') }}" class="{{ is_page_template(get_page_template_slug()) && !is_tax() ? 'active' : ''}}">{{ __('Alle medarbejdere', 'kbharkiv') }}</a>
          @foreach($terms as $term)
            <a href="{{ get_term_link($term->term_id) }}" class="{{ is_tax('employee_category', $term->slug) ? 'active' : '' }}">{{ $term->name }}</a>
          @endforeach
        </nav>

        <div class="row">
          @foreach ( $posts as $post )
            @php setup_postdata( $post ) @endphp
            @include('partials.content-'.get_post_type())
          @endforeach
          @php wp_reset_postdata() @endphp
        </div>
      @endif
    </div>

  @endwhile
@endsection
