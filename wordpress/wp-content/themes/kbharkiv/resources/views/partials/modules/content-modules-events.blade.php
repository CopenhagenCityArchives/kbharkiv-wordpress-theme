@php
  $args = [
    'post_type' => 'arrangementer',
    'posts_per_page' => 3,
    'meta_key' => 'event_start',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => [
      'relation' => 'AND',
      [
        'key' => 'event_start',
        'value' => date('Y-m-d H:i:s'),
        'compare' => '>=',
        'type' => 'DATE'
      ],
    ]
  ];
  $posts = get_sub_field('modules_events_events') ? get_sub_field('modules_events_events') : get_posts($args);
  global $post;
@endphp

@if( $posts )
  <section class="module module-events">
    <div class="container-fluid">

      <a class="h4 d-block mb-4" href="{{ get_post_type_archive_link( 'arrangementer' ) }}">{{ get_sub_field('modules_events_headline') ? get_sub_field('modules_events_headline') : 'Arrangementer' }} @include('partials.icon', ['icon' => 'arrow-right-circle'])</a>
        @php $prev_date = null @endphp

      	@foreach( $posts as $key => $post )
          @php setup_postdata($post) @endphp
          @include('partials.content-'.get_post_type())
          @php $prev_date = strtotime(get_field('event_start')) @endphp
      	@endforeach
        @php wp_reset_postdata() @endphp
    </div>
  </section>
@endif
