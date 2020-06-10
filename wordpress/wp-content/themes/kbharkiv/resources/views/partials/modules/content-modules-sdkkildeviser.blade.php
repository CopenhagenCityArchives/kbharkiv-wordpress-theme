<section class="module module-kildeviser {{ get_sub_field('modules_sdkkildeviser_spacing') ? '' : 'my-0' }}">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-xl-6 offset-lg-1 offset-xl-3">
        <div id="module-kildeviser-{{get_row_index()}}"></div>
      </div>
    </div>
  </div>
</section>

<script src="https://www.kbhkilder.dk/software/KildeviserSearchSDK/KildeviserSearchSDK.latest.min.js" type="text/javascript"></script>

<script type="text/javascript">
  jQuery(function() {
	   KildeViserSearchSDK.init({{ get_sub_field('modules_sdkkildeviser_id') }}, 'module-kildeviser-' + {{get_row_index()}});
	});
</script>
