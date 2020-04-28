@php
  $posts = get_sub_field('modules_news_news') ? get_sub_field('modules_news_news') : get_posts(array('posts_per_page' => 3));
  global $post;
@endphp

<section>
  <a href="{{ get_post_type_archive_link( 'post' ) }}">{{ get_sub_field('modules_news_headline') }}</a>

  @if( $posts )
  	@foreach( $posts as $key => $post )
      @php setup_postdata($post) @endphp
      @include('partials.content')
  	@endforeach
    @php wp_reset_postdata() @endphp
  @endif

</section>
