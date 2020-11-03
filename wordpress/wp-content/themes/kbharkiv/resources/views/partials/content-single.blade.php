<article @php post_class() @endphp>

  <div class="container-fluid">
    @if (is_bbpress())
      @php the_content() @endphp
    @else
      <div class="row">
        <div class="col-lg-8 offset-lg-1 offset-xl-2">
          <header>
            @includeWhen(is_single() && get_post_type() == 'post', 'partials/entry-meta')
            <h1 class="entry-title mb-4">{!! get_the_title() !!}</h1>
          </header>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-2">
          @include('partials.lead')
        </div>
        <div class="col-lg-3">
          @include('partials.author')
        </div>
      </div>

      @if ( has_post_thumbnail())
        <figure class="row mb-5">
          <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            @php the_post_thumbnail( 'herox2' ); @endphp
            <figcaption class="figure-caption" aria-hidden="true">
              {{get_post(get_post_thumbnail_id())->post_excerpt}}
            </figcaption>
          </div>
        </figure>
      @endif

      <div class="row">
        <div class="col-xl-2">
          <div class="d-none d-xl-block">
            @include('partials.tags')
          </div>
        </div>
        <div class="col-lg-8 col-xl-6 offset-lg-1">
          <div class="entry-content">
            @php the_content() @endphp
          </div>
        </div>
      </div>
    @endif
  </div>

</article>
