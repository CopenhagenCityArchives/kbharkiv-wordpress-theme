@extends('layouts.app')

@section('content')

  @include('partials.page-header')

  <section class="module archive-wrapper theme-{{ get_field('theme', get_post_type() . '_options') ? get_field('theme', get_post_type() . '_options') : 'green' }}">
    <div class="container-fluid">
      <div class="row row-eq-height">
        @while (have_posts()) @php the_post() @endphp
          @include('partials.content-partner', ['classes' => 'col-lg-6'])
        @endwhile
      </div>
    </div>

  </section>

@endsection
