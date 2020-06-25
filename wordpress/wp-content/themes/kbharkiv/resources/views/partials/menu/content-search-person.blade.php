@php
  $field = get_sub_field('search_person_group');
@endphp

<li role="search">
  <form id="apacs_freetext_search__form">
    <div class="form-group">
      @if ($field['search_person_group_copy'])
        <label class="h4" for="person_search_term">{{ $field['search_person_group_headline'] }}</label>
      @endif
      {{-- <label>Søg person</label> --}}
      @if ($field['search_person_group_copy'])
        <p class="small">{{ $field['search_person_group_copy'] }}</p>
      @endif
      <input class="form-control search-focusable" tabindex="-1" id="person_search_term" title="Navn, adresse eller fritekst" type="text" placeholder="Navn, adresse eller fritekst">
    </div>
    <button class="btn btn-primary search-focusable" tabindex="-1">Søg</button>
  </form>
  @if ($field['search_person_group_link'])
    <div class="d-block mt-4">
      <a class="search-focusable" tabindex="-1" href="{{ $field['search_person_group_link']['url'] }}" target="{{ $field['search_person_group_link']['target'] ? $field['search_person_group_link']['target'] : '_self' }}">@include('partials.icon', ['icon' => 'arrow-right-circle']) {{ $field['search_person_group_link']['title'] }}</a>
    </div>
  @endif

</li>
