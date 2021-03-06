@php
  $field = get_sub_field('search_archive_group');
@endphp

<li role="search" aria-label="Søg og bestil til læsesalen">
  <form id="searchform_catalog" action="#" method="get">
    <div class="search-form form-group">
      @if ($field['search_archive_group_headline'])
        <label class="h4" for="catalog_query">{{ $field['search_archive_group_headline'] }}</label>
      @endif
      @if ($field['search_archive_group_copy'])
        <p class="small">{{ $field['search_archive_group_copy'] }}</p>
      @endif
      <input class="form-control search-focusable" tabindex="-1" id="catalog_query" placeholder="Søg arkivmateriale i Starbas" name="catalog_query" type="search" />
    </div>
    <button id="searchform_catalog_button" class="btn btn-primary search-focusable" tabindex="-1">Søg</button>
    @if ($field['search_archive_group_link'])
      <div class="d-block mt-4">
        <a class="search-focusable" tabindex="-1" href="{{ $field['search_archive_group_link']['url'] }}" target="{{ $field['search_archive_group_link']['target'] ? $field['search_archive_group_link']['target'] : '_self' }}">
          @include('partials.icon', ['icon' => 'arrow-right-circle', 'label' => 'Link ikon'])
          {{ $field['search_archive_group_link']['title'] }}
          @if ($field['search_archive_group_link']['target'] == '_blank')
            <span class="sr-only"> (Åbner i nyt vindue og fører til anden hjemmeside)</span>
          @endif
        </a>
      </div>
    @endif
  </form>
</li>
