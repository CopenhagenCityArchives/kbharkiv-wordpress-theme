<?php

function color($color, $darkness) {
	$colors = [
		'yellow' => ['#F2E9CE', '#7B766A'],
		'green' => ['#DBEDD7', '#3F5B58'],
		'purple' => ['#DACBD8', '#685966'],
		'blue' => ['#C9E4F2', '#04436E'],
		'red' => ['#E7C0B0', '#8A3314'],
		'white' => ['#ffffff', '#000000'],
		'default' => ['#C9E4F2', '#04436E'],
	];

	return array_key_exists($color, $colors) ? $colors[$color][$darkness] : $colors['default'][$darkness];
}

// Function for returning color theme array. $darkness boolean is optional for returning the dark theme color
function theme_color($darkness = 0) {
	$darkness = $darkness ? 1 : 0;
	global $post;

	// if front page
	if (is_front_page()) {
		return color('white', $darkness);
	}
	elseif (is_search() || is_404()) {
		return color('default', $darkness);
	}
	// if cpt archive or post archive or single post
	elseif (is_post_type_archive() || is_home() || is_single()) {
		if (get_field('color_theme', get_post_type() . '_options')) {
			return color(get_field('color_theme', get_post_type() . '_options'), $darkness);
		} else {
			return color('default', $darkness);
		}
	}
	//return get_field('color_theme');
	elseif (get_field('color_theme', $post->ID)) {
		return color(get_field('color_theme', $post->ID), $darkness);
	}
	// if top level parent color_theme exists
	elseif($post->post_parent) {

		// Get ID of top level parent
		$ancestors = get_post_ancestors($post->ID);
		$root = count($ancestors)-1;
		$parent_id = $ancestors[$root];

		if (get_field('color_theme', $parent_id)) {
			return color(get_field('color_theme', $parent_id), $darkness);
		} else {
			return color('default', $darkness);
		}
	// else default color theme
	} else {
		return color('default', $darkness);
	}
}
