<article @php post_class('col-md-6') @endphp>
  <header>
    <h2 class="entry-title">{!! get_the_title() !!}</h2>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
</article>
