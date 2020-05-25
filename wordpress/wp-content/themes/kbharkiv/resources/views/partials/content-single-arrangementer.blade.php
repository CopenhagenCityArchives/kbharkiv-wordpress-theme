@php $event_start = strtotime(get_field('event_start')) @endphp
@php $event_end = strtotime(get_field('event_end')) @endphp

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-7">

      @if (has_post_thumbnail())
        @php the_post_thumbnail(); @endphp
      @endif

      <p class="lead">{{ get_the_lead() }}<p>

      <div class="entry-content">
        @php the_content() @endphp
      </div>

      @include('partials.modules')
    </div>

    <div class="offset-lg-1 col-lg-4">
      <div class="event-info" style="background-color: {{ theme_color(1) }}">
        <time class="event-start" datetime="{{ date("Y-m-d H:i", $event_start) }}">
          <div class="date font-weight-bold">{{ date("d", $event_start) }}</div>
          <div class="month font-weight-bolder">{{ date("F", $event_start) }}</div>

          <div class="h6">Tid</div>
          <span class="h4">
            {{ date("H:i", $event_start) }}
          </span>
        </time>
        {{-- If end date and start date is the same --}}
        @if($event_end && date("Ymd", $event_start) == date("Ymd", $event_end))
          <time datetime="{{ date("Y-m-d H:i", $event_end) }}">
            <span class="h4">
              – {{ date("H:i", $event_end) }}
            </span>
          </time>
        {{-- If end date is after start date --}}
        @elseif($event_end && date("Ymd", $event_start) < date("Ymd", $event_end))
          <time datetime="{{ date("Y-m-d H:i", $event_end) }}">
            <span class="h4">
              – {{ date("d/m H:i", $event_end) }}
            </span>
          </time>
        {{-- Otherwise we don't show anything. The end date cannot be before start date --}}
        @endif

        @if( get_field('event_location') )
          <div class="h6">Lokation</div>
          <div class="h4">{{ get_field('event_location') }}</div>
        @endif

        <div class="h6">Pris</div>
        <div class="h4">{{ get_field('event_price') ? get_field('event_price') : 'Gratis'}}</div>

        @if( get_field('event_link') )
          <a class="btn btn-primary btn-lg" href="{{ get_field('event_link') }}" role="button" target="_blank">{{ get_field('event_price') || get_field('event_price') > 1 ? 'Køb billet' : 'Tilmeld'}}</a>
        @endif
      </div>
    </div>
  </div>
</div>
