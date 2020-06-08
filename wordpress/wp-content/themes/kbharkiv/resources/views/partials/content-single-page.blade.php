@if ( !empty( get_the_content() ) || has_post_thumbnail() )
  <section class="content">
    <div class="container-fluid">
      @if ( has_post_thumbnail())
        <figure class="row mb-5">
          <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
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
            <div class="entry-content">
              @php the_content() @endphp
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
@endif
