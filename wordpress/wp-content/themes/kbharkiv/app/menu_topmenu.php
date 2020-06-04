<?php

/**
 * Create HTML list of nav menu items.
 *
 * @since 1.0
 * @uses Walker_Nav_Menu
 */
class Kbharkiv_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @see Walker_Nav_Menu::start_el()
	 *
	 * @since 1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		// Cleaner class array to replace default
		$new_classes = array();
		$level = '';
		$color = '';

		if ( in_array( 'menu-item-has-children', $classes ) ) {
			$new_classes[] = 'parent';
			$level = ' data-level="' . ($depth + 1) . '"';

			$post_id = get_post_meta( $item->ID, '_menu_item_object_id', true );

			if ($depth == 0 && get_field('color_theme', $post_id)) {
				$color = ' data-color="' . color(get_field('color_theme', $post_id), 0) . '"';
			} elseif($depth == 0 && !get_field('color_theme', $post_id)) {
				$color = ' data-color="' . color('default', 0) . '"';
			}
		}
		if ( in_array( 'current-menu-item', $classes ) )
			$new_classes[] = 'current';
		if ( in_array( 'current-menu-ancestor', $classes ) )
			$new_classes[] = 'current-ancestor';
		if ( in_array( 'current-menu-parent', $classes ) )
			$new_classes[] = 'current-parent';
		$classes = $new_classes;

		/**
		 * Filter the CSS class(es) applied to a menu item's list item element.
		 *
		 * @since 1.0
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		// removed the ID
		$output .= $indent . '<li' . $class_names . $level . $color . '>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 1.0
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title  Title attribute.
		 *     @type string $target Target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item  The current menu item.
		 * @param array  $args  An array of {@see wp_nav_menu()} arguments.
		 * @param int    $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$attributes .= $item->menu_item_parent ? ' tabindex="-1"' : '';
		$attributes .= in_array( 'menu-item-has-children', $classes ) ? ' aria-haspopup="true" aria-expanded="false"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes . '>';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 1.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of {@see wp_nav_menu()} arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function start_lvl( &$output, $depth = 0, $args = null ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
    $indent = str_repeat( $t, $depth );

    // Default class.
	  $classes = array( 'sub-menu' );

    /**
     * Filters the CSS class(es) applied to a menu list element.
     *
     * @since 4.8.0
     *
     * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
     * @param stdClass $args    An object of `wp_nav_menu()` arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$level = ' data-level="' . ($depth + 1) . '"';

    $output .= "{$n}{$indent}<ul$class_names $level><li class='nav-back d-lg-none'><a tabindex='-1' href='#'>Tilbage</a></li>{$n}";
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
	    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
	        $t = '';
	        $n = '';
	    } else {
	        $t = "\t";
	        $n = "\n";
	    }
			$close_menu = $depth == 0 ? '<button class="nav-toggle desktop-menu-toggle top-menu-focusable"><span class="sr-only">Luk menu</span><div class="hamburger"></div></button>' : '';
			$indent  = str_repeat( $t, $depth );
	    $output .= "$indent $close_menu</ul>{$n}";
	}
} // Kbharkiv_Walker_Nav_Menu

add_filter('wp_nav_menu_items', function( $items, $args ) {

	// get menu
	$menu = wp_get_nav_menu_object($args->menu);

	// modify primary only
	if( $args->theme_location == 'primary_navigation' ) {

		$login_url = get_field('login', $menu);
		$search = '';

		if( have_rows('search', $menu) ) {
	    while ( have_rows('search', $menu) ) {
				the_row();
				$search .= App\template('partials.search.content-' . str_replace('_', '-', get_row_layout()), ['menu' => $menu]);
			}
		}

		$right_menu = '<li class="login ml-auto"><a class="d-flex align-items-center" href="'. $login_url .'">Log ind <svg class="icon ml-2"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#lock"/></svg></a></li>' .
									'<li class="search parent" data-level="1">' .
										'<a class="d-flex align-items-center" href="#">Søg<svg class="icon ml-2"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#search"/></svg></a>' .
										'<ul class="sub-menu" data-level="1">' .
											'<li class="nav-back d-lg-none"><a tabindex="0" href="#">Tilbage</a></li>' .
											$search;
										'</ul>' .
									'</li>';

									// '<li class="search parent" data-level="1">' .
									// 	'<a class="d-flex align-items-center" href="#">Søg<svg class="icon ml-2"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#search"/></svg></a>' .
									// 	'<ul class="sub-menu" data-level="1">' .
									// 		'<li class="nav-back d-lg-none"><a tabindex="0" href="#">Tilbage</a></li>' .
									// 		'<li>' .
									// 			'<label>Søg person</label>' .
									// 			'<p class="small">Fritekstssøgning efter personer i indtastede kilder.</p>' .
									// 			'<div class="search-border-fix" data-sdk-app ng-controller="fritekstSearchController" ng-include="\'sdk/templates/fritekst-search.tpl.html\'" ng-init="init({searchUrl: \'https://www.kbharkiv.dk/sog-i-arkivet/sog-i-indtastede-kilder\' });">&nbsp;</div>' .
									// 			'<div class="d-block mt-4"><a href="/sog-i-arkivet/sog-i-indtastede-kilder">Avanceret søgning</a></div>' .
									// 		'</li>' .
									// 		'<li>' .
									// 			'<form id="searchform_catalog" action="http://www.kbharkiv.dk/kbharkiv/php/starbas_search.php" method="get">' .
									// 	      '<div class="search-form form-group">' .
									// 					'<label for="catalog_query">Søg arkivmateriale</label>' .
									// 					'<p class="small">Fritekstsøgning i samlingerne med Starbas.</p>' .
									// 	        '<input class="form-control" id="catalog_query" placeholder="Søg arkivmateriale i Starbas" name="catalog_query" type="search" placeholder="Søg arkivmateriale i Starbas" />' .
									// 	      '</div>' .
									// 				'<button id="searchform_catalog_button" class="btn btn-primary search-focusable">Søg</button>' .
									// 				'<a class="d-block mt-4" href="http://www.starbas.net/av_soeg_res.php?a_id=1" target="_blank" rel="noopener">Avanceret søgning</a>' .
									// 	    '</form>' .
									// 		'</li>' .
									// 		'<li>' .
									// 			get_search_form(false) .
									// 		'</li>' .
									// 	'</ul>' .
									// '</li>';

		$items = $items . $right_menu;
	}


	// return
	return $items;

}, 10, 2);
