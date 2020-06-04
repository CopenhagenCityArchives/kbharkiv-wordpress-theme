@if ( !empty( get_the_content() ) || has_post_thumbnail() )
  <section class="content">
    <div class="container-fluid">
      @if ( has_post_thumbnail())
        <figure class="row">
          <div class="col-lg-10 offset-lg-1">
            @php the_post_thumbnail( 'herox2' ); @endphp
            <figcaption class="figure-caption">
              {{get_post(get_post_thumbnail_id())->post_excerpt}}
            </figcaption>
          </div>
        </figure>
      @endif
      @if ( !empty( get_the_content() ))
        <div class="row">
          <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
            @php the_content() @endphp
            {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
          </div>
        </div>
      @endif
    </div>
  </section>
@endif
