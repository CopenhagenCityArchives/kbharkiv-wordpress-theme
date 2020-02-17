<article @php post_class('module') @endphp>
  <div class="container-fluid">
    @if ( has_post_thumbnail())
      <figure class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="img-wrap">
            @include('components.thumbnail')
          </div>
        </div>
        @if (get_post(get_post_thumbnail_id())->post_excerpt)
          <div class="col-lg-2 d-flex align-items-end">
            <figcaption class="mt-2 mt-lg-0">
              {{get_post(get_post_thumbnail_id())->post_excerpt}}
            </figcaption>
          </div>
        @endif
      </figure>
    @endif

    <div class="row">
      <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
        <header>
          @include('partials/entry-meta')
          <h1 class="entry-title display-4 mt-2 mb-4">{!! get_the_title() !!}</h1>
        </header>
      </div>
      <div class="w-100"></div>
      <div class="col-sm-10 offset-sm-1 col-lg-8 offset-lg-0 col-xl-6 order-lg-2">
        <div class="entry-content mb-5">
          @if( get_field('lead') )
            <p class="lead">
              {{ get_field('lead') }}
            </p>
          @endif
          @php the_content() @endphp
        </div>
      </div>
      <div class="offset-sm-1 col-lg-2 offset-lg-0 col-xl-3 order-lg-1">
        @include('partials/entry-author')
        @include('partials/entry-tags')
      </div>
    </div>
  </div>
</article>

<nav class="module nav-article">
  <div class="d-flex flex-column flex-lg-row">
    @php
      $prev = empty(get_adjacent_post(false,'',true)) ? false : get_adjacent_post(false,'',true)->ID;
      $next = empty(get_adjacent_post(false,'',false)) ? false : get_adjacent_post(false,'',false)->ID;
    @endphp

    @if ($prev)
      <a class="link-wrap" href="{{ get_permalink( $prev ) }}">
        <div class="link">{{ pll__('Forrige') }}</div>
        <h5>{{ get_the_title( $prev ) }}</h5>
      </a>
    @else
      <div class="link-wrap"></div>
    @endif

    <a class="link-wrap d-lg-flex flex-column align-items-center" href="{{ get_post_type_archive_link( 'post' ) }}">
      <div class="link">{{ pll__('Tilbage') }}</div>
      <h5>{{ pll__( 'Nyhedsoversigt' ) }}</h5>
    </a>

    @if ($next)
      <a class="link-wrap" href="{{ get_permalink( $next ) }}">
        <div class="link">{{ pll__('Næste') }}</div>
        <h5>{{ get_the_title( $next ) }}</h5>
      </a>
    @else
      <div class="link-wrap"></div>
    @endif

  </div>
</nav>
