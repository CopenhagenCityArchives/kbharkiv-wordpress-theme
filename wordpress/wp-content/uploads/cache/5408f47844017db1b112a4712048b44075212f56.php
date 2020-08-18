<?php
 $id = rand(1000, 10000)
?>

<script src="<?php echo e(get_sub_field('modules_sdk_sdk')); ?>" type="text/javascript"></script>

<script type="text/javascript">jQuery(function() {
		KildeViserSearchSDK.init(<?php echo e(get_sub_field('modules_sdk_id')); ?>, <?php echo e($id); ?>);
	});
</script>

<div id="<?php echo e($id); ?>"></div>
