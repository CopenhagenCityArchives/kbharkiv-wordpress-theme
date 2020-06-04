@php
  $field = get_sub_field('search_person_group');
@endphp

<li>
  @if ($field['search_person_group_copy'])
    <label class="h4" for="search-person">{{ $field['search_person_group_headline'] }}</label>
  @endif
  {{-- <label>Søg person</label> --}}
  @if ($field['search_person_group_copy'])
    <p class="small">{{ $field['search_person_group_copy'] }}</p>
  @endif

  <div class="search-border-fix" data-sdk-app ng-controller="fritekstSearchController" ng-include="'sdk/templates/fritekst-search.tpl.html'" ng-init="init({searchUrl: \'https://www.kbharkiv.dk/sog-i-arkivet/sog-i-indtastede-kilder\' });">&nbsp;</div>

  @if ($field['search_person_group_link'])
    <div class="d-block mt-4">
      <a href="{{ $field['search_person_group_link']['url'] }}" target="{{ $field['search_person_group_link']['target'] ? $field['search_person_group_link']['target'] : '_self' }}">@include('partials.icon', ['icon' => 'arrow-right-circle']) {{ $field['search_person_group_link']['title'] }}</a>
    </div>
  @endif

</li>