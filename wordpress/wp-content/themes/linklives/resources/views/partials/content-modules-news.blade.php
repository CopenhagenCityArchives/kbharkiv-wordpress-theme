@php
  $posts = get_sub_field('modules_news_specificnews') ? get_sub_field('modules_news_specificnews') : get_posts(array('posts_per_page' => 3));
  global $post;
@endphp

<section class="module module-news">
  <div class="container-fluid">
    <a class="float-right link" href="{{ get_post_type_archive_link( 'post' ) }}">{{ pll__( 'Alle nyheder' ) }}</a>

    @include('partials.modules-header')

    @if( $posts )

    	<div class="row row-eq-height">
      	@foreach( $posts as $key => $post )
          @php setup_postdata($post) @endphp
          @include('partials.content-post', ['classes' => $key == 2 ? 'col-lg-4 last-lg last-xl' : 'col-lg-4'])
      	@endforeach
        @php wp_reset_postdata() @endphp
      </div>
    @endif
  </div>
</section>
