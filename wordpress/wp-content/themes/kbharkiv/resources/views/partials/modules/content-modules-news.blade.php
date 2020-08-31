<section class="module module-news" aria-label="Nyheder">
  <div class="container-fluid">

    <a class="h4 d-block mb-4" href="{{ get_post_type_archive_link( 'post' ) }}">{{ get_sub_field('modules_news_headline') ? get_sub_field('modules_news_headline') : 'Nyheder' }} @include('partials.icon', ['icon' => 'arrow-right-circle', 'label' => 'Pil til højre ikon'])</a>

    <div class="row">

      {{-- If specific posts are chosen --}}
      @if(get_sub_field('modules_news_news'))
        @php
          $posts = get_sub_field('modules_news_news');
          global $post;
        @endphp

        @if( $posts )
        	@foreach( $posts as $key => $post )
            @if ($key > 0)
              @php break @endphp
            @endif
            @php setup_postdata($post) @endphp
            @include('partials.content-news', ['class' => 'sticky col-md-6'])
        	@endforeach
          @php wp_reset_postdata() @endphp

          <div class="news col-md-6">
            <div class="row">
            	@foreach( $posts as $key => $post )
                @if ($key == 0)
                  @php continue @endphp
                @endif
                @php setup_postdata($post) @endphp
                @include('partials.content-news', ['class' => 'offset-md-2 col-md-8'])
            	@endforeach
              @php wp_reset_postdata() @endphp
            </div>
          </div>
        @endif

      {{-- If no specific posts are chosen--}}
      @else
        @php
          // Show latest sticky post or else just latest post
          $posts = get_posts(array('posts_per_page' => 1, 'post__in' => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1));
          global $post;
        @endphp

        @if( $posts )
          @foreach( $posts as $key => $post )
            @php
              setup_postdata($post);
              $post_id = get_the_id();
            @endphp
            @include('partials.content-news', ['class' => 'sticky col-md-6'])
          @endforeach
          @php wp_reset_postdata() @endphp
        @endif

        @php
          // Show 2 latest posts excluding the one above
          $posts = get_posts(array('posts_per_page' => 2, 'exclude' => array($post_id)));
        @endphp

        @if( $posts )
          <div class="news col-md-6">
            <div class="row">
            	@foreach( $posts as $key => $post )
                @php setup_postdata($post) @endphp
                @include('partials.content-news', ['class' => 'offset-md-2 col-md-8'])
            	@endforeach
              @php wp_reset_postdata() @endphp
            </div>
          </div>
        @endif
      @endif
    </div>
  </div>
</section>
