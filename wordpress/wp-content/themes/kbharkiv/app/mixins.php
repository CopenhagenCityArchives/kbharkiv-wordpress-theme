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
			'name'						=> 'links',
			'title'						=> 'Links',
			'description'			=> 'Et afsnit med et eller flere links',
			'render_callback'	=> 'block_links',
			'category'				=> 'common',
			'icon'						=> 'admin-links',
			'mode' 						=> 'edit',
			'keywords'				=> array( 'links', 'link', 'linking', 'henvisning', 'fil', 'download' ),
		));

		// acf_register_block(array(
		// 	'name'						=> 'image',
		// 	'title'						=> 'Billede',
		// 	'render_callback'	=> 'block_image',
		// 	'category'				=> 'common',
		// 	'icon'						=> 'format-image',
		// 	'mode' 						=> 'edit',
		// 	'keywords'				=> array( 'billede', 'image', 'gallery', 'galleri', 'billeder' ),
		// ));
	}
});

function block_infobox( $block ) {
  if(function_exists('get_field')):
    echo '<aside class="infobox small" style="background-color: ' . theme_color() . '">' . get_field('block_infobox') . '</aside>';
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

// function block_image( $block ) {
//   if(function_exists('get_field')):
// 		$img = get_field('block_image');
// 		// echo '<pre>';
// 		// print_r($img);
// 		// echo '</pre>';
// 		echo '<a class="lightbox" href="' . $img['sizes']['medium'] . '" title="' . $img['title'] . '">';
// 		echo wp_get_attachment_image($img['ID']);
// 		echo '</a>';
// 		// <a class="chocolat-image" href="https://images.unsplash.com/photo-1589180883060-7e17fc2efaf6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1372&q=80" title="caption image 3">
// 		// 		<img width="100" src="https://images.unsplash.com/photo-1589180883060-7e17fc2efaf6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1372&q=80"/>
// 		// </a>
//   endif;
// }

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
		'acf/image',
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
	if ($id && get_field('lead', $id)) {
		return get_field('lead', $id);
	} elseif (is_post_type_archive() && get_field('lead', get_post_type() . '_options')) {
		return get_field('lead', get_post_type() . '_options');
	} elseif ( get_field('lead')) {
		return get_field('lead');
	}
}

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
