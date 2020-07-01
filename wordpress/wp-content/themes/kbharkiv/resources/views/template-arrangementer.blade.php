{{--
  Template Name: Arrangementer
--}}

@php
  global $post;
  $posts = get_posts(array(
    'post_type' => 'arrangementer',
    'meta_key' => 'event_start',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => [
      'relation' => 'AND',
      [
          'key' => 'event_start',
          'value' => date('Y-m-d H:i:s'),
          'compare' => '>=',
          'type' => 'DATE'
      ],
    ],
  ));
@endphp

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container-fluid">
    @if (!$posts)
      <div class="alert alert-warning">
        {{ __('Ingen indlæg.', 'kbharkiv') }}
      </div>
      {!! get_search_form(false) !!}
    @else
      @php $prev_date = null @endphp
      @foreach ( $posts as $post )
        @php setup_postdata( $post ) @endphp
        @include('partials.content-'.get_post_type(), ['prev_date' => $prev_date])
        @php $prev_date = strtotime(get_field('event_start')) @endphp
      @endforeach
      @php wp_reset_postdata() @endphp
    @endif
  </div>

  {!! pagination() !!}
@endsection
