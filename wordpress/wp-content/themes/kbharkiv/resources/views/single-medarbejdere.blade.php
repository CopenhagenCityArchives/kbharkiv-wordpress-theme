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

  @include('partials.modules')

  <h6>Email</h6>
  @if( get_field('employee_email') )
    {{ get_field('employee_email') }}
  @endif

  <h6>Tlf.</h6>
  @if( get_field('employee_phone') )
    {{ get_field('employee_phone') }}
  @endif

@endsection
