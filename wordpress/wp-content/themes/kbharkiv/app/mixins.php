<?php


add_action('acf/init', function() {
	if( function_exists('acf_register_block') ) {
		acf_register_block(array(
			'name'						=> 'infobox',
			'title'						=> 'Infoboks',
			'description'			=> 'En infoboks i højreside af indholdssider.',
			'render_callback'	=> 'block_infobox',
			'category'				=> 'common',
			'icon'						=> 'info',
			'mode' 						=> 'edit',
			'keywords'				=> array( 'infobox', 'info', 'infoboks', 'indhold' ),
		));

		acf_register_block(array(
			'name'						=> 'infoimage',
			'title'						=> 'Info-billede',
			'description'			=> 'Et billede i højreside af indholdssider.',
			'render_callback'	=> 'block_infoimage',
			'category'				=> 'common',
			'icon'						=> 'info',
			'mode' 						=> 'edit',
			'keywords'				=> array( 'infobox', 'info', 'infoboks', 'image' ),
		));

		acf_register_block(array(
			'name'						=> 'infoemployee',
			'title'						=> 'Info-medarbejder',
			'description'			=> 'En medarbejder i højreside af indholdssider.',
			'render_callback'	=> 'block_infoemployee',
			'category'				=> 'common',
			'icon'						=> 'info',
			'mode' 						=> 'edit',
			'keywords'				=> array( 'infobox', 'info', 'infoboks', 'employee' ),
		));

		acf_register_block(array(
			'name'						=> 'links',
			'title'						=> 'Links',
			'description'			=> 'Et afsnit med et eller flere links',
			'render_callback'	=> 'block_links',
			'category'				=> 'common',
			'icon'						=> 'admin-links',
			'mode' 						=> 'edit',
			'keywords'				=> array( 'links', 'link', 'linking', 'henvisning', 'fil', 'download' ),
		));
	}
});

function block_infobox( $block ) {
  if(function_exists('get_field')):
    echo '<aside aria-label="Infoboks" class="infobox small" style="background-color: ' . theme_color() . '">' . get_field('block_infobox') . '</aside>';
  endif;
}

function block_infoimage( $block ) {
  if(function_exists('get_field')):
		$img = get_field('block_image');
    echo '<aside aria-label="Billedeboks '. $img['caption'] .'" class="infobox infoimage small"><figure>' . wp_get_attachment_image( $img['ID'], 'full' ) . '<figcaption class="figure-caption">' . $img['caption'] . '</figcaption><figure></aside>';
  endif;
}

function block_infoemployee( $block ) {
  if(function_exists('get_field')):
		$id = get_field('block_employee')[0]->ID;

    echo '<aside aria-label="Medarbejderboks '. get_the_title($id) .'" class="infobox infoemployee small">' .
			(has_post_thumbnail($id) ? get_the_post_thumbnail($id, 'profilex2', ['class' => 'profile-image mb-3'] ) : '') .
			(get_field('employee_title', $id) ? '<h6>' . get_field('employee_title', $id) . '</h6>' : '') .
			'<header><h3 class="entry-title mb-2">' . get_the_title($id) . '</h3></header>' .
			'<div class="entry-summary small mb-3">' . get_the_excerpt($id) . '</div>' .
			'<dl class="row small">' .
			(get_field('employee_email', $id) ? '<dt class="col-3 col-lg-2">Email</dt><dd class="col-9"><a class="text-break" aria-label="Email ' . get_the_title($id) . '" href="mailto:' . get_field('employee_email', $id) . '" target="_blank">' . get_field('employee_email', $id) . '</a></dd>' : '' ) .
			(get_field('employee_phone', $id) ? '<dt class="col-3 col-lg-2">Mobil</dt><dd class="col-9"><a class="text-break" aria-label="Ring til' . get_the_title($id) . '" href="tel:' . get_field('employee_phone', $id) . '" target="_blank">' . get_field('employee_phone', $id) . '</a></dd>' : '' ) .
			'</dl>' .
		'</aside>';
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
						echo '<a href="' . get_sub_field('block_links_type_download')['url'] . '" download><svg class="icon"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#download"/></svg>' . get_sub_field('block_links_type_title')  . '</a>';
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
		'acf/infoimage',
		'acf/infoemployee',
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

add_filter( 'pre_get_posts', function( $query ) {

	// Make Archives.php Include Custom Post Types
  if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'arrangementer', 'page'
    ));
  }

 // Make employee archive show all employees
	if( ($query->is_main_query() && is_post_type_archive( 'medarbejdere' )) || ($query->is_main_query() && is_tax( 'employee_category' )) ) {
  	$query->set('posts_per_page', -1 );
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
  }

	// Make events sort by date
	if( !is_admin() && $query->is_main_query() && is_post_type_archive('arrangementer') ) {
		$query->set( 'meta_key', 'event_start' );
		$query->set( 'orderby', 'meta_value' );
		$query->set( 'order', 'ASC' );
		$query->set( 'meta_query', [
        'relation' => 'AND',
        [
            'key' => 'event_start',
            'value' => date('Y-m-d H:i:s'),
            'compare' => '>=',
            'type' => 'DATE'
        ],
    ]);
	}

  return $query;
});

// Return the lead of current
function get_the_lead($id = 0) {
	if ($id) {
		return get_field('lead', $id);
	} elseif ((is_post_type_archive() || is_home()) && get_field('lead', get_post_type() . '_options')) {
		return get_field('lead', get_post_type() . '_options');
	} elseif(is_tag()) {
		return '';
	} elseif ( get_field('lead')) {
		return get_field('lead');
	}
}

add_action('init', function() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
});

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'footer',
		'capability'	=> 'edit_posts',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Menu',
		'menu_title'	=> 'Menu',
		'menu_slug' 	=> 'menu',
		'capability'	=> 'edit_posts',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Chat',
		'menu_title'	=> 'Chat',
		'menu_slug' 	=> 'chat',
		'capability'	=> 'edit_posts',
	));
}

add_filter('get_search_form', function () {
	return \App\template( 'partials.searchform' );
});
