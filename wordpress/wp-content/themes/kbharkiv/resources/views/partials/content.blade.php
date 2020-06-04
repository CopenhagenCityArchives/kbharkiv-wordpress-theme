<a href="{{ get_permalink() }}" class="col-md-3 d-flex align-self-stretch">
  <article @php post_class() @endphp>

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
