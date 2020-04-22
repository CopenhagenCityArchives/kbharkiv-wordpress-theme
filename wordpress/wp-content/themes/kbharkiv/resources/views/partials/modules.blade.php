@php $index = 0 @endphp

@if (have_rows('modules'))
  @while ( have_rows('modules') )
    @php
      the_row();
      $index ++;
    @endphp
    @include('partials.modules.content-' . str_replace('_', '-', get_row_layout()))
  @endwhile
@endif
