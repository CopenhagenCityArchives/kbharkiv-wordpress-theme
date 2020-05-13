<article @php post_class('col-12') @endphp>
  <h6><?php echo get_the_term_list( get_the_ID(), 'event_category', '', ', ', '' ) ?></h6>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
  <h6>Køb billet</h6>
  @if( get_field('event_link') )
    <a target="_blank" href="{{ get_field('event_link') }}">Køb billet</a>
  @endif

  <h6>Pris</h6>
  @if( get_field('event_price') )
    {{ get_field('event_price') }}
  @else
    Gratis
  @endif

</article>
