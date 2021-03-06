<a href="{{ get_permalink() }}" class="{{ $class }}">
  <article @php post_class() @endphp aria-label="{{ get_the_title() }}">

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
