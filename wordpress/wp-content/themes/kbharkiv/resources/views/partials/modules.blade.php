@php $kildetaster @endphp

@if (have_rows('modules'))
  @while ( have_rows('modules') )
    @php
      the_row();
    @endphp

    @include('partials.modules.content-' . str_replace('_', '-', get_row_layout()))

    @if(get_row_layout() == 'modules_sdkkildetaster')
      @php $kildetaster = true @endphp
    @endif
  @endwhile
@endif

@if($kildetaster)
  @php
    wp_enqueue_style('kildetaster.css', 'https://www.kbhkilder.dk/software/kildetaster-new-site/resources/css/sdk.css');
    wp_enqueue_script('kildetaster.js', 'https://www.kbhkilder.dk/software/kildetaster/resources/js/sdk.js');
  @endphp
@endif
