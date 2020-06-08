{{--
  Template Name: Min side
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    @include('partials.content-single-'.get_post_type())

    @include('partials.modules')

    @include('partials.child-pages')

    <div class="container-fluid" id="{{ get_field('mypage_app') }}">
      <div class="row">

        @if (have_rows('mypage_card'))
          @while ( have_rows('mypage_card') )
            @php
              the_row();
            @endphp
            <div class="col-lg-6">
              <section class="card">
                <div class="card-header">
                  {{ get_sub_field('mypage_card_headline') }}
                </div>
                @if( get_sub_field('mypage_card_image') )
                  {!!wp_get_attachment_image( get_sub_field('mypage_card_image'), 'cardx2' )!!}
                @endif
                <div class="card-body" id="{{get_sub_field('mypage_card_id')}}">
                  {!! get_sub_field('mypage_card_content') !!}
                </div>
              </section>
            </div>
          @endwhile
        @endif
      </div>
    </div>

  @endwhile
@endsection
