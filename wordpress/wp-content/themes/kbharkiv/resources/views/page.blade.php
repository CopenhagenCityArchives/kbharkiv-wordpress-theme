@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <div class="container-fluid">
      @if ( has_post_thumbnail())
        <figure class="row">
          <div class="col-lg-10 offset-lg-1">
            @php the_post_thumbnail( 'herox2' ); @endphp
            <figcaption>
              {{get_post(get_post_thumbnail_id())->post_excerpt}}
            </figcaption>
          </div>
        </figure>
      @endif

      <div class="row">
        <div class="col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
          @include('partials.content-page')
        </div>
      </div>
    </div>

    @include('partials.modules')

    @if( get_field('childpages') == true )
      @php
        $args = [
          'child_of' => $post->ID,
          'depth' => 2,
          'title_li' => '',
          'walker' => new Kbharkiv_Walker_Nav_Children
        ];
        $child_pages = get_pages( $args )
      @endphp

      @if(!empty($child_pages))
        <div class="container-fluid">
          <div class="row">
            {{ wp_list_pages($args) }}
          </div>
        </div>
      @endif
    @endif

  @endwhile
@endsection
