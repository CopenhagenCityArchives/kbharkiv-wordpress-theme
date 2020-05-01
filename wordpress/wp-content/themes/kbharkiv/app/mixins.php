<?php


add_action('acf/init', function() {
	if( function_exists('acf_register_block') ) {
		acf_register_block(array(
			'name'				=> 'infobox',
			'title'				=> 'Infoboks',
			'description'		=> 'En infoboks i højreside af indholdssider.',
			'render_callback'	=> 'block_infobox',
			'category'			=> 'formatting',
			'icon'				=> 'info',
			'keywords'			=> array( 'infobox', 'info', 'infoboks', 'indhold' ),
		));
	}
});

function block_infobox( $block ) {
  if(function_exists('get_field')) :
    echo '<aside class="infobox">' . get_field('block_infobox') . '</aside>';
  endif;
}

add_filter( 'allowed_block_types', function( $allowed_blocks ) {
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
    'core/quote',
    'core/video',
    'core/table',
    'acf/infobox',
    'core/embed',
    'core-embed/twitter',
    'core-embed/youtube',
    'core-embed/facebook',
    'core-embed/instagram'
	);
});

// Move Yoast to bottom
add_filter( 'wpseo_metabox_prio', function () {
	return 'low';
});

function namespace_add_custom_types( $query ) {
  if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'arrangementer', 'medarbejdere'
        ));
    }
    return $query;
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

// Function for returning color theme array. $dark boolean is optional for returning the dark theme color
function theme_color($dark = 0) {
	global $post;

	// if cpt archive or post archive
	if (is_post_type_archive() || is_home()) {
		return $color_theme = explode(',', get_field('color_theme', get_post_type() . '_options'))[$dark ? 1 : 0];
	// if color_theme exists
	} elseif (get_field('color_theme')) {
		return $color_theme = explode(',', get_field('color_theme'))[$dark ? 1 : 0];
	// if top level parent color_theme exists
	} elseif($post->post_parent) {
		$ancestors = get_post_ancestors($post->ID);
		$root = count($ancestors)-1;
		$parent_id = $ancestors[$root];
		if (get_field('color_theme', $parent_id)) {
			return $theme_colors = explode(',', get_field('color_theme', $parent_id))[$dark ? 1 : 0];
		}
	// else default color theme
	} else {
		return ['#ffffff', '#000000'][$dark ? 1 : 0];
	}
}
