@php $event_start = strtotime(get_field('event_start')) @endphp
@php $event_end = strtotime(get_field('event_end')) @endphp

@if (!is_tag() && date("ym", $event_start) != date("ym", $prev_date))
  <div class="month h1" role="presentation">{{ date_i18n("F Y", $event_start) }}</div>
@endif

<article @php post_class() @endphp>
  <div class="row">

    <div class="col-lg-2" role="presentation">
      <time datetime="{{ date("Y-m-d H:i", $event_start) }}">
        <div class="h1" style="color: {{theme_color(1)}}">{{ date("d", $event_start) }}.</div>
        {{ date("H:i", $event_start) }}
      </time>
      @if( $event_end )
        <time datetime="{{ date("Y-m-d H:i", $event_end) }}">
          – {{ date("H:i", $event_end) }}
        </time>
      @endif
    </div>
    <div class="col-lg-3">
      <a href="{{ get_permalink() }}">
        @php the_post_thumbnail('medium'); @endphp
      </a>
    </div>
    <div class="col-lg-5">
      <h6>{!! get_the_term_list( get_the_ID(), 'event_category', '', ', ', '' ) !!}</h6>
      <a href="{{ get_permalink() }}">
        <header>
          <h2 class="entry-title">{{ the_title() }}</h2>
        </header>
        <div class="entry-summary">
          {{ get_the_lead(get_the_ID()) }}
        </div>
      </a>
    </div>

    <div class="col-lg-2">
      <h6>Pris</h6>
      <div class="h4 mb-4">
        @if( get_field('event_price') )
          {{ get_field('event_price') }} kr.
        @else
          Gratis
        @endif
      </div>

      @if( get_field('event_link') )
        <a class="btn btn-primary" target="_blank" href="{{ get_field('event_link') }}" role="button">{{ get_field('event_price') && get_field('event_price') > 0 ? 'Køb billet' : 'Tilmeld' }}</a>
      @endif

    </div>
  </div>

</article>
