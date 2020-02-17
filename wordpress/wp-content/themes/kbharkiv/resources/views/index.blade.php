@extends('layouts.app')

@section('content')

  @include('partials.page-header')

  <section class="module archive-wrapper theme-{{get_field('theme') ? get_field('theme') : 'white'}}">
    <div class="container-fluid">
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ pll__( 'Ingen nyheder' ) }}
        </div>
        {!! get_search_form(false) !!}
      @endif

      <div class="row row-eq-height">
        @php
          $cols;
          $colsRowMd = 0;
          $colsRowLg = 0;
          $colsRowXl = 0;
        @endphp

        @while (have_posts()) @php the_post() @endphp
          @if (is_sticky())
            @php
              $cols = 'col-xl-6';
              $colsRowMd += 12;
              $colsRowLg += 12;
              $colsRowXl += 6;
            @endphp
          @elseif (has_post_thumbnail())
            @php
              $cols = 'col-lg-6';
              $colsRowMd += 12;
              $colsRowLg += 6;
              $colsRowXl += 6;
            @endphp
          @else
            @php
              $cols = 'col-md-6 col-xl-3';
              $colsRowMd += 6;
              $colsRowLg += 6;
              $colsRowXl += 3;
            @endphp
          @endif

          @php
            $classes = $cols;
            $classes .= $colsRowMd % 12 == 0 ? ' last-md' : '';
            $classes .= $colsRowLg % 12 == 0 ? ' last-lg' : '';
            $classes .= $colsRowXl % 12 == 0 ? ' last-xl' : '';
          @endphp
          @include('partials.content-'.get_post_type(), ['classes' => $classes])
        @endwhile
      </div>
      @includeWhen(is_paged(), 'components.nav-index')

    </div>

  </section>

  @if( have_rows('modules', get_option('page_for_posts')) )
    @while ( have_rows('modules', get_option('page_for_posts')) )
      @php the_row() @endphp
      @include('partials.content-' . str_replace('_', '-', get_row_layout()))
    @endwhile
  @endif

@endsection
