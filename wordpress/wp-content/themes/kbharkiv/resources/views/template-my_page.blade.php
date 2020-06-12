{{--
  Template Name: Min side
--}}

@extends('layouts.app')

@php
  wp_enqueue_style('sdk.css', 'https://kildetaster.kbharkiv.dk/resources/css/sdk.css');
  wp_enqueue_script('sdk.js', 'https://kildetaster.kbharkiv.dk/sdk.js', [], null);
@endphp

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @include('partials.page-header')

    @include('partials.content-single-'.get_post_type(), ['no_header' => true])

    @include('partials.modules')

    @include('partials.child-pages')

    <div class="container-fluid" id="{{ get_field('mypage_app') }}">
      <div class="card-columns">
        @if (have_rows('mypage_card'))
          @while ( have_rows('mypage_card') )
            @php
              the_row();
            @endphp
            <section class="card">
              <div class="card-header">
                {{ get_sub_field('mypage_card_headline') }}
              </div>
              @if( get_sub_field('mypage_card_image') )
                {!!wp_get_attachment_image( get_sub_field('mypage_card_image'), 'cardx2' )!!}
              @endif
              <div class="card-body" {!! get_sub_field('mypage_card_angular_directive') ? ' data-sdk-app' : '' !!}>
                {!! get_sub_field('mypage_card_content') !!}
                @if( get_sub_field('mypage_card_angular_directive') )
                  <{!! get_sub_field('mypage_card_angular_directive') !!}>
                  </{!! get_sub_field('mypage_card_angular_directive') !!}>
                @endif
              </div>
            </section>
          @endwhile
        @endif
      </div>
    </div>

  @endwhile
@endsection
