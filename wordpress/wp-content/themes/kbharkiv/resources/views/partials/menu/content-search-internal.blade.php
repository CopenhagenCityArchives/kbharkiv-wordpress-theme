@php
  $field = get_sub_field('search_internal_group');
@endphp

<li role="search" aria-label="Søg på siden">
  <form method="get" id="searchform_site" class="search-form" action="{{ esc_url( home_url( '/' ) ) }}">
    <div class="form-group">
      @if ($field['search_internal_group_headline'])
        <label class="h4" for="search-internal">{{ $field['search_internal_group_headline'] }}</label>
      @endif
      @if ($field['search_internal_group_copy'])
        <p class="small">{{ $field['search_internal_group_copy'] }}</p>
      @endif
      <input type="search" class="form-control search-focusable" id="search-internal" placeholder="Søg" value="{{ get_search_query() }}" name="s" tabindex="-1" />
    </div>
    <button type="submit" class="btn btn-primary search-focusable" tabindex="-1">Søg</button>
    @if ($field['search_internal_group_link'])
      <div class="d-block mt-4">
        <a class="search-focusable" tabindex="-1" href="{{ $field['search_internal_group_link']['url'] }}" target="{{ $field['search_internal_group_link']['target'] ? $field['search_internal_group_link']['target'] : '_self' }}">@include('partials.icon', ['icon' => 'arrow-right-circle']) {{ $field['search_person_group_link']['title'] }}</a>
      </div>
    @endif
  </form>
</li>
