<?php

function color($color, $darkness) {
	$colors = [
		'yellow' => ['#FFEECC', '#817764'],
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

	return array_key_exists($color, $colors) ? $colors[$color][$darkness] : $colors['default'][$darkness];
}

// Function for returning color theme array. $darkness boolean is optional for returning the dark theme color
function theme_color($darkness = 0, $random = 0) {
	$darkness = $darkness ? 1 : 0;
	$random = $random ? 1 : 0;

	global $post;

	if ($random) {
		return color('random', $darkness);
	}

	// if front page
	if (is_front_page()) {
		return color('white', $darkness);
	}

	if (is_search() || is_404()) {
		return color('default', $darkness);
	}

	if (is_tag()) {
		return color('default', $darkness);
	}

	// if cpt archive or post archive or single post
	if (is_post_type_archive() || is_home() || is_single()) {
		if (get_field('color_theme', get_post_type() . '_options')) {
			return color(get_field('color_theme', get_post_type() . '_options'), $darkness);
		}
	}

	if (isset($post) && get_field('color_theme', $post->ID)) {
		return color(get_field('color_theme', $post->ID), $darkness);
	}

	// if any ancestor color_theme exists
	if (isset($post) && $post->post_parent) {
		$ancestors = get_post_ancestors($post->ID);

		foreach ( $ancestors as $ancestor_id ) {
			if (get_field('color_theme', $parent_id)) {
				return color(get_field('color_theme', $parent_id), $darkness);
			} elseif (get_field('color_theme', get_post_type( $parent_id ) . '_options')) {
				return color(get_field('color_theme', get_post_type( $parent_id ) . '_options'), $darkness);
			}
		}
	}

	return color('default', $darkness);
}
