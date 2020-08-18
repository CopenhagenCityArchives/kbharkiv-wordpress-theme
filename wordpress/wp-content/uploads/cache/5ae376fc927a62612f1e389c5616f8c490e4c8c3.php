<?php
  $args = [
    'child_of' => $post->ID,
    'title_li' => '',
    'walker' => new Kbharkiv_Walker_Nav_Children
	];
	$child_pages = get_pages( $args )
?>

<?php if(!empty($child_pages)): ?>
  <div class="row">
    <?php echo e(wp_list_pages($args)); ?>

  </div>
<?php endif; ?>


$args = array(
    'post_parent' => get_the_ID(), // Current post's ID
);
$children = get_children( $args );
// Check if the post has any child
if ( ! empty($children) ) {
    // The post has at least one child
} else {
    // There is no child for this post
}
