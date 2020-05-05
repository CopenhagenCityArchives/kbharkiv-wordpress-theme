<?php


add_action('acf/init', function() {
	if( function_exists('acf_register_block') ) {
		acf_register_block(array(
			'name'						=> 'infobox',
			'title'						=> 'Infoboks',
			'description'			=> 'En infoboks i højreside af indholdssider.',
			'render_callback'	=> 'block_infobox',
			'category'				=> 'formatting',
			'icon'						=> 'info',
			'mode' 						=> 'edit',
			'keywords'				=> array( 'infobox', 'info', 'infoboks', 'indhold' ),
		));

		acf_register_block(array(
			'name'						=> 'links',
			'title'						=> 'Links',
			'description'			=> 'Et afsnit med et eller flere links',
			'render_callback'	=> 'block_links',
			'category'				=> 'formatting',
			'icon'						=> 'admin-links',
			'mode' 						=> 'edit',
			'keywords'				=> array( 'links', 'link', 'linking', 'henvisning', 'fil', 'download' ),
		));
	}
});

function block_infobox( $block ) {
  if(function_exists('get_field')):
    echo '<aside class="infobox">' . get_field('block_infobox') . '</aside>';
  endif;
}

function block_links( $block ) {
  if(function_exists('get_field')) :
		if( have_rows('block_links') ) :
			echo '<ul class="block-links">';
			while ( have_rows('block_links') ) : the_row();
				echo '<li>';
					if( get_sub_field('block_links_type') == 'link' ) :
						$link = get_sub_field('block_links_type_link');
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '"><svg class="icon"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#arrow-right-circle"/></svg>' . esc_html( $link_title ) . '</a>';
					elseif( get_sub_field('block_links_type') == 'download') :
						echo '<a href="' . get_sub_field('block_links_type_download')['url'] . '" download><svg class="icon"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#download"/></svg>' . get_sub_field('block_links_type_title') . '</a>';
					endif;

				echo '</li>';
			endwhile;
			echo '</ul>';
		endif;
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
    'core/separator',
    'acf/infobox',
		'acf/links',
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
