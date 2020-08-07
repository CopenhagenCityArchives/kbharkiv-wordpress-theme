{{--
  Template Name: Forum
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    @if (is_bbpress() && get_field('forum_copy'))
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8">
            {{ the_field('forum_copy') }}
          </div>
        </div>
      </div>
    @endif

    <div class="container-fluid">
      {!! do_shortcode("[bbp-forum-index]") !!}
    </div>
  @endwhile
@endsection
