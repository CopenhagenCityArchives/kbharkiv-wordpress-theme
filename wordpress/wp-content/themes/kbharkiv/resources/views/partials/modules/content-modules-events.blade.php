@php
  $posts = get_sub_field('modules_events_events') ? get_sub_field('modules_events_events') : get_posts(array('post_type' => 'arrangementer', 'posts_per_page' => 3));
  global $post;
@endphp

<section>
  <a href="{{ get_post_type_archive_link( 'arrangementer' ) }}">{{ get_sub_field('modules_events_headline') }}</a>

  @if( $posts )
  	@foreach( $posts as $key => $post )
      @php setup_postdata($post) @endphp
      @include('partials.content')
  	@endforeach
    @php wp_reset_postdata() @endphp
  @endif

</section>
