<?php

$theme_color = [];

function color($color) {
	$colors = [
		'yellow' => ['#FFEECC', '#665E4F'/*'#817764'*/],
		'green' => ['#DBEDD7', '#3F5B58'],
		'purple' => ['#DACBD8', '#685966'],
		'blue' => ['#C9E4F2', '#04436E'],
		'red' => ['#E7C0B0', '#913B1C'],
		'white' => ['#ffffff', '#000000'],
		'default' => ['#C9E4F2', '#04436E'],
	];

	if($color == 'random') {
		$colors_random = $colors;
		array_splice($colors_random, 5);
		$random_color = array_rand($colors_random, 1);
		return $colors[$random_color];
	}

	return array_key_exists($color, $colors) ? $colors[$color] : $colors['default'];
}

// Function for returning color theme array. $darkness boolean is optional for returning the dark theme color
function theme_color() {

	global $post;

	// if front page
	if (is_front_page()) {
		return color('random');
	}

	if (is_search() || is_404()) {
		return color('default');
	}

	if (is_tag()) {
		return color('default');
	}

	// if cpt archive or post archive or single post
	if (is_post_type_archive() || is_home() || is_single()) {
		if (get_field('color_theme', get_post_type() . '_options')) {
			return color(get_field('color_theme', get_post_type() . '_options'));
		}
	}

	if (isset($post) && get_field('color_theme', $post->ID)) {
		return color(get_field('color_theme', $post->ID));
	}

	// if any ancestor color_theme exists
	if (isset($post) && $post->post_parent) {
		$ancestors = get_post_ancestors($post->ID);

		foreach ( $ancestors as $ancestor_id ) {
			if (get_field('color_theme', $ancestor_id)) {
				return color(get_field('color_theme', $ancestor_id));
			} elseif (get_field('color_theme', get_post_type( $ancestor_id ) . '_options')) {
				return color(get_field('color_theme', get_post_type( $ancestor_id ) . '_options'));
			}
		}
	}

	// catch user profile pages
	if (is_bbpress() && get_field('color_theme', 'forum_options')) {
		return color(get_field('color_theme', 'forum_options'));
	}

	return color('default');
}

function get_theme_color($darkness = false) {
	global $theme_color;
	$darkness = $darkness ? 1 : 0;

 	if(empty($theme_color)) {
		$theme_color = theme_color();
	};

	return $theme_color[$darkness];
}
