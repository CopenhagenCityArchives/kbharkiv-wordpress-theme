@php
  $module = get_row_layout();
  $before = isset($before) ? true : false;
@endphp

<header class="d-flex align-content-center">
  @if($before && get_sub_field($module . '_handwriting'))
    <h2 class="handwritten mr-3">{{ get_sub_field($module . '_handwriting') ?: get_sub_field($module . '_handwriting')}}</h2>
  @endif
  <h1>{{ get_sub_field($module . '_headline') ?: get_sub_field($module . '_headline') }}</h1>
  @if(!$before && get_sub_field($module . '_handwriting'))
    <h2 class="handwritten">{{ get_sub_field($module . '_handwriting') ?: get_sub_field($module . '_handwriting')}}</h2>
  @endif
</header>
