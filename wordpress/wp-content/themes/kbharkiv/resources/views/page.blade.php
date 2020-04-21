@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

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
      <div class="row">
        {{ wp_list_pages($args) }}
      </div>

    @elseif (has_post_thumbnail())
      @php the_post_thumbnail( 'herox2' ); @endphp
    @endif

    @include('partials.content-page')
  @endwhile
@endsection
