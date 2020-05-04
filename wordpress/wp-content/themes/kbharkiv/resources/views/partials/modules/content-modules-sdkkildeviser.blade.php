<div id="module-{{get_row_index()}}"></div>

<script src="http://www.kbhkilder.dk/software/KildeviserSearchSDK/KildeviserSearchSDK.latest.min.js" type="text/javascript"></script>

<script type="text/javascript">
  jQuery(function() {
	   KildeViserSearchSDK.init({{ get_sub_field('modules_sdkkildeviser_id') }}, 'module-' + {{get_row_index()}});
	});
</script>
