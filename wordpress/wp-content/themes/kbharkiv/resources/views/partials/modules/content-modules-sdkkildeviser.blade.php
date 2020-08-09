@php $image_col = (has_post_thumbnail() && !get_field('page_hide_image')) ? 'offset-xl-3' : 'offset-xl-2' @endphp

<section class="module module-kildeviser {{ get_sub_field('modules_sdkkildeviser_spacing') ? '' : 'small-margin' }}" aria-label="Kildeviser">
  @php
    wp_enqueue_style('KildeviserSearchSDK.min.css', 'https://www.kbhkilder.dk/software/KildeviserSearchSDK/KildeviserSearchSDK.min.css');
    wp_enqueue_script('KildeviserSearchSDK.min.js', 'https://www.kbhkilder.dk/software/KildeviserSearchSDK/KildeviserSearchSDK.min.js', [], null);
  @endphp
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 {{ $image_col }}">
        <div id="module-kildeviser-{{get_row_index()}}"></div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    jQuery(function() {
  	   KildeViserSearchSDK.init({{ get_sub_field('modules_sdkkildeviser_id') }}, 'module-kildeviser-' + {{get_row_index()}});
  	});
  </script>

</section>
