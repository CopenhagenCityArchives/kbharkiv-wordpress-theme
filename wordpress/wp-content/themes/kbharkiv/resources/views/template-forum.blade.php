{{--
  Template Name: Forum
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container-fluid">
    {!! do_shortcode("[bbp-forum-index]") !!}
  </div>

@endsection
