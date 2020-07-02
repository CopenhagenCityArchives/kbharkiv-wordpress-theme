{{--
  Template Name: Forum
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <div class="container-fluid">
      {!! do_shortcode("[bbp-forum-index]") !!}
    </div>
  @endwhile
@endsection
