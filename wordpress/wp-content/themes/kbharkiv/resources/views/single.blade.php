@extends('layouts.app')

@section('content')
  {{ the_breadcrumb() }}

  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())

    @include('partials.modules')

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
          <div class="mt-5">
            @include('partials.nav-post')
          </div>
        </div>
      </div>
    </div>
  @endwhile

@endsection
