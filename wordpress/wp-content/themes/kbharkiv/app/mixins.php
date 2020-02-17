<?php

class Sub_Menu_Wrap extends Walker_Nav_Menu {
  private $currentItem;

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $parent = array_search( 'menu-item-has-children', $item->classes );

    $output .= sprintf( "\n<li class='%s' role='none'><a href='%s' role='menuitem' %s %s>%s%s</a>\n",
        ($item->menu_item_parent ? "level-2" : "level-1") . implode(' ', $item->classes),
        $parent ? '#' : $item->url,
        $item->menu_item_parent ? "tabindex='-1'" : "",
        $parent ? "aria-haspopup='true' aria-expanded='false'" : "",
        $item->title,
        $parent ? '<svg class="icon"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#chevron-down"/></svg>' : ''
    );
  }

  function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $this->currentItem = $item;
  }

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<div class=\"sub-menu-wrapper\"><div class=\"container-fluid\"><div class=\"row\"><div class=\"col-lg-7\"><ul class=\"sub-menu\" role=\"menu\">\n";
  }

  function end_lvl(&$output, $depth = 0, $args = array()) {
    $translate = function_exists('pll__') ? 'pll__' : '__';
    $markup = '';
    $contact = query_posts(array(
      'post_type'		=> 'medlem',
      'numberposts' => 1,
      'lang' => pll_current_language(),
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'members_menu',
          'value' => true,
          'compare' => 'LIKE'
        ),
        array(
          'key' => 'members_menu_submenu',
          'value' => '"' . get_post_meta($this->currentItem->menu_item_parent, '_menu_item_object_id', true) . '"',
          'compare' => 'LIKE'
        )
      )
    ));

    if( $contact ):
      $markup .= '<div class="col-lg-5"><div class="contact"><div class="h4 mb-3">' . $translate( 'Kontakt' ) . '</div>';
	    foreach( $contact as $c ):
        $markup .= '<div class="d-flex">';
        if ( has_post_thumbnail($c->ID)) :
          $markup .= '<img width="64px" height="64px" alt="' . $translate( 'Kontaktperson' ) . '" class="rounded-circle mr-3" src="' . get_the_post_thumbnail_url($c->ID, 'profile-image-x2') . '" srcset="' . get_the_post_thumbnail_url($c->ID, 'profile-image-x1') . ', ' . get_the_post_thumbnail_url($c->ID, 'profile-image-x2') . ' 2x"/>';
        endif;
        $markup .= '<div><div class="h5">' . get_the_title($c->ID) . '</div>';
        if(function_exists('get_field')):
          $markup .= '<a tabindex="-1" class="d-block" href="tel:' . get_field('members_phone', $c->ID) . '" target="_blank">' . get_field('members_phone', $c->ID) . '</a>';
          $markup .= '<a tabindex="-1" class="d-block" href="mailto:' . get_field('members_email', $c->ID) . '" target="_blank">' . get_field('members_email', $c->ID) . '</a></div>';
        endif;
      endforeach;

      $markup .= '</div></div></div>';

    endif;

    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul></div>$markup</div></div>\n";
  }
}

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

    acf_register_block(array(
      'name'				=> 'button',
      'title'				=> 'Knap',
      'description'		=> 'En knap der kan placeres midt i indholdet.',
      'render_callback'	=> 'block_button',
      'category'			=> 'formatting',
      'icon'				=> 'admin-links',
      'keywords'			=> array( 'knap', 'button', 'indhold' ),
    ));
	}
});

function block_infobox( $block ) {
  if(function_exists('get_field')) :
    echo '<aside class="infobox">' . get_field('block_infobox') . '</aside>';
  endif;
}

function block_button( $block ) {
  if(function_exists('get_field')) :
    echo '<a class="btn btn-primary gutenberg-btn mb-5" href="' . get_field('block_button_href') . '">' .
            get_field('block_button_text') .
            '<svg class="icon right">' .
              '<use xlink:href="' . App\asset_path('images/feather-sprite.svg)#arrow-right') . '"/>' .
            '</svg>' .
         '</a>';
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
    'acf/button',
    'core/embed',
    'core-embed/twitter',
    'core-embed/youtube',
    'core-embed/facebook',
    'core-embed/instagram'
	);
});

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-secondary"';
}

// Move Yoast to bottom
add_filter( 'wpseo_metabox_prio', function () {
	return 'low';
});
