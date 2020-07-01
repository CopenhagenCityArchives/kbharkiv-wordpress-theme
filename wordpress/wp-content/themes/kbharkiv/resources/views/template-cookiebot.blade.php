{{--
  Template Name: Cookiebot
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @include('partials.page-header')

    <div class="container-fluid" id="{{ get_field('mypage_app') }}">
      <script id="CookieDeclaration" src="https://consent.cookiebot.com/45617c96-571e-4b06-9521-9a417f327c48/cd.js" async="" type="text/javascript"></script>
    </div>
  @endwhile
@endsection
