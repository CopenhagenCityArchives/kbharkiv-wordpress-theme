@extends('layouts.app')

@section('content')

  <h6>Titel</h6>
  @if( get_field('employee_title') )
    {{ get_field('employee_title') }}
  @endif

  @if (has_post_thumbnail())
    @php the_post_thumbnail(); @endphp
  @endif


  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile

  @if( have_rows('modules') )
    @while ( have_rows('modules') )
      @php the_row() @endphp
      @include('partials.content-' . str_replace('_', '-', get_row_layout()))
    @endwhile
  @endif

  <h6>Email</h6>
  @if( get_field('employee_email') )
    {{ get_field('employee_email') }}
  @endif

  <h6>Tlf.</h6>
  @if( get_field('employee_phone') )
    {{ get_field('employee_phone') }}
  @endif

@endsection
