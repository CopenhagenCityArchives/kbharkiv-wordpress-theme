@php
  $prev = empty(get_adjacent_post(false,'',true)) ? false : get_adjacent_post(false,'',true)->ID;
  $next = empty(get_adjacent_post(false,'',false)) ? false : get_adjacent_post(false,'',false)->ID;
@endphp

<div class="post-navigation row">
  @if ($prev)
    <div class="col-md-6 mb-4">
      <h6>Forrige</h6>
      <a class="article-link" href="{{ get_permalink( $prev ) }}">
        <h4><span class="mr-2">{{ get_the_title( $prev ) }}</span> @include('partials.icon', ['icon' => 'arrow-right-circle'])</h4>
      </a>
    </div>
  @endif

  @if ($next)
    <div class="col-md-6 mb-4">
      <h6>Næste</h6>
      <a class="article-link" href="{{ get_permalink( $next ) }}">
        <h4><span class="mr-2">{{ get_the_title( $next ) }}</span> @include('partials.icon', ['icon' => 'arrow-right-circle'])</h4>
      </a>
    </div>
  @endif
</div>
