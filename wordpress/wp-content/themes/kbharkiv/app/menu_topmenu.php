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

	 private $currentItem;

	 public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$this->currentItem = $item;

 		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

 		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 		$classes[] = 'menu-item-' . $item->ID;

 		// Cleaner class array to replace default
 		$new_classes = array();
 		$level = '';
 		$icon_mobile = '';
 		$icon_desktop = '';
		$icon_desktop_sub = $depth == 1 ? '<svg class="icon d-none d-lg-inline-block"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#arrow-right-circle"/></svg>' : '';
 		$color = '';
 		$color_logo = '';
 		$tabindex = $item->menu_item_parent ? ' tabindex="-1"' : '';

 		if ( in_array( 'menu-item-has-children', $classes ) ) {
 			$new_classes[] = 'parent';
 			$level = ' data-level="' . ($depth + 1) . '"';
 			$icon_mobile = '<a class="sub-menu-btn d-lg-none" href="#" role="button" aria-haspopup="true" aria-expanded="false" ' . $tabindex . '><span class="sr-only">Se undersider</span><svg class="icon arrow"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#chevron-right"/></svg></a>';
 			$icon_desktop = $depth == 0 ? '<svg class="icon arrow d-none d-lg-inline-block"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#chevron-right"/></svg>' : '';
 			$post_id = get_post_meta( $item->ID, '_menu_item_object_id', true );

 			if ($depth == 0 && get_field('color_theme', $post_id)) {
 				$color = ' data-color="' . color(get_field('color_theme', $post_id), 0) . '"';
 				$color_logo = ' data-logo-color="' . color(get_field('color_theme', $post_id), 1) . '"';
 			} elseif($depth == 0 && !get_field('color_theme', $post_id)) {
 				$color = ' data-color="' . color('default', 0) . '"';
 				$color_logo = ' data-logo-color="' . color('default', 1) . '"';
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
 		$output .= $indent . '<li' . $class_names . $level . $color . $color_logo . '>';

 		$atts = array();
 		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
 		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
 		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
 		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
 		$atts['class']  = 'direct-btn';

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

 		$attributes .= $tabindex;

 		$item_output = $args->before;
 		$item_output .= '<a'. $attributes . '>';
 		/** This filter is documented in wp-includes/post-template.php */
 		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
 		$item_output .= $icon_desktop;
		$item_output .= $icon_desktop_sub;
 		$item_output .= '</a>';
 		$item_output .= $icon_mobile;
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
		$headline_desktop = $depth == 0 ? '<a class="nav-current d-none d-lg-block" tabindex="-1" href="' . $this->currentItem->url . '">' . $this->currentItem->title . '</a>' : '';
		$back_btn_mobile = '<li class="nav-back d-lg-none"><a tabindex="-1" role="button" href="#">Tilbage</a></li>';

    $output .= "{$n}{$indent} <ul$class_names $level> $headline_desktop $back_btn_mobile{$n}";
	}

	public function end_lvl( &$output, $depth = 0, $args = null ) {
	    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
	        $t = '';
	        $n = '';
	    } else {
	        $t = "\t";
	        $n = "\n";
	    }
			$close_menu_and_kk_logo = $depth == 0 ? '<button class="nav-toggle desktop-menu-toggle"><span class="sr-only">Luk menu</span><div class="hamburger"></div></button>' . file_get_contents(App\asset_path('images/kk-logo.svg')) : '';
			$indent  = str_repeat( $t, $depth );

	    $output .= "$indent $close_menu_and_kk_logo</ul>{$n}";
	}
} // Kbharkiv_Walker_Nav_Menu

add_filter('wp_nav_menu_items', function( $items, $args ) {

	// modify primary only
	if( $args->theme_location == 'primary_navigation' ) {

		$profile = App\template('partials.menu.content-profile');
		$search = '';

		if( have_rows('search_menu', 'option') ) {
	    while ( have_rows('search_menu', 'option') ) {
				the_row();
				$search .= App\template('partials.menu.content-' . str_replace('_', '-', get_row_layout()));
			}
		}

		$right_menu = $profile .
									'<li class="search parent" data-level="1" data-color="' . color(get_field('color_theme', 'option'), 0) . '">' .
										'<a class="d-flex align-items-center sub-menu-btn" href="#">Søg<svg class="icon"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#search"/></svg></a>' .
										'<ul class="sub-menu" data-level="1">' .
											'<li class="nav-back d-lg-none"><a tabindex="0" href="#">Tilbage</a></li>' .
											$search .
											'<button class="nav-toggle desktop-menu-toggle"><span class="sr-only">Luk menu</span><div class="hamburger"></div></button>' .
										'</ul>' .
									'</li>';
		$items = $items . $right_menu;
	}


	// return
	return $items;

}, 10, 2);
