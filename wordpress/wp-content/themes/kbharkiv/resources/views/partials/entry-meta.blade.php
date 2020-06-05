@if (get_post_type() === 'post')
  <h6>{{ is_tag() || is_search() ? 'Nyhed – ' : ''}}<time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time></h6>
@elseif (get_post_type() === 'page')
  <h6>Side</h6>
@elseif (get_post_type() === 'arrangementer')
  {{-- @php $event_start = strtotime(get_field('event_start')) @endphp --}}
  @php $event_start = strtotime(get_field('event_start')) @endphp

  @if(get_field('event_start') > date('Y-m-d H:i:s'))
    <h6>Arrangement – <time datetime="{{ date("Y-m- H:i", $event_start) }}">{{ date_i18n("j. F Y H:i", $event_start) }}</time></h6>
  @else
    <h6>Arrangement - Slut</h6>
  @endif
@endif
