{{-- <article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{get_post_type()}}{!! get_the_title() !!}</a></h2>
    @if (get_post_type() === 'post')
      @include('partials/entry-meta')
    @endif
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article> --}}

<a href="{{ get_permalink() }}" class="article-link col-md-3 d-flex align-self-stretch">
  <article @php post_class('content-search') @endphp>

    @if ( has_post_thumbnail())
      @php the_post_thumbnail( 'herox2' ) @endphp
    @endif

    <header>
      @include('partials/entry-meta')
      <h3 class="entry-title">{!! get_the_title() !!}</h3>
    </header>
    <div class="entry-summary">
      {{ get_the_lead(get_the_id()) }}
    </div>

  </article>
</a>

<div class="col-md-1"></div>
