<section class="content">
  <div class="container-fluid">
    @if(!get_field('page_headline_in_header'))

      <div class="row">
        <div class="col-lg-8 offset-lg-1 offset-xl-2">
          <header>
            <h1 class="entry-title mb-4">{!! get_the_title() !!}</h1>
          </header>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-2">
          <p class="lead">{{ get_the_lead() }}<p>
        </div>
        <div class="col-lg-3">
          @include('partials.author')
        </div>
      </div>
    @endif

    @if ( has_post_thumbnail() && !get_field('page_hide_image'))
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
