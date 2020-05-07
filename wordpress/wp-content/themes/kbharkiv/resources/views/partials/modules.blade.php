@if (have_rows('modules'))
  @while ( have_rows('modules') )
    @php
      the_row();
    @endphp

    @include('partials.modules.content-' . str_replace('_', '-', get_row_layout()))

    @if(get_row_layout() == 'modules_sdkkildetaster')
      @php $sdk = true @endphp
    @endif
  @endwhile
@endif

@if(isset($sdk))
  @php
    wp_enqueue_style('sdk.css', 'https://www.kbhkilder.dk/software/kildetaster-new-site/resources/css/sdk.css');
    wp_enqueue_script('sdk.js', 'https://www.kbhkilder.dk/software/kildetaster-new-site/resources/js/sdk.js');
  @endphp
@endif
