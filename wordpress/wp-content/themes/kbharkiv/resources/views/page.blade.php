@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @php
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
    @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
