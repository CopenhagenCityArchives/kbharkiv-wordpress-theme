<article @php post_class() @endphp>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 offset-lg-1 offset-xl-2">
        <header>
          @includeWhen(is_single() && get_post_type() == 'post', 'partials/entry-meta')
          <h1 class="entry-title mb-4">{!! get_the_title() !!}</h1>
        </header>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-2">
        <p class="lead">{{ get_the_lead() }}<p>
      </div>
      <div class="col-lg-3">
        @include('partials.author')
      </div>
    </div>

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

    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
        <div class="entry-content">
          @php the_content() @endphp
        </div>
      </div>
    </div>
  </div>

</article>
