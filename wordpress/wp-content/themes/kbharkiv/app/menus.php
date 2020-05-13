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
		if ( in_array( 'menu-item-has-children', $classes ) ) {
			$new_classes[] = 'parent';
			$level = ' data-level="' . ($depth + 1) . '"';
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
		$output .= $indent . '<li' . $class_names . $level . '>';

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


class Kbharkiv_Walker_Nav_Children extends Walker_Page {
	public function start_el( &$output, $item, $depth = 0, $args = array(), $current_page = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    extract($args, EXTR_SKIP);

    $css_class = array('page-item', $depth == 0 ? 'col-sm-6 col-md-5 col-lg-4 col-xl-3' : '');

    $css_class = implode(' ', apply_filters( 'page_css_class', $css_class, $item, $depth, $args, $current_page ));

		$element = $depth == 0 ? 'div' : 'li';
		$thumbnail = has_post_thumbnail($item->ID) && $depth == 0 ? get_the_post_thumbnail($item->ID, 'herox1') : '';
		$headline = $depth == 0 ? 'h3' : 'h5';
		$icon = $depth == 0 ? '<svg class="icon"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#arrow-right"/></svg>' : '';

    //Modification
    $content = $link_before . $thumbnail . '<' . $headline .'>' . get_the_title($item->ID) . '</' . $headline .'>' . $icon . $link_after;

    $output .= $indent . '<' . $element . ' class="' . $css_class . '"><a href="' . get_permalink($item->ID) . '">' . $content . '</a>';
    //End Modification
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
		$element = $depth == 0 ? 'div' : 'li';
		$blank_col = $depth == 0 ? '<div class="d-none d-md-block col-md-1 d-lg-none col-xl-1 d-xl-block"></div>' : '';
    $output .= "</" . $element . ">{$n}$blank_col";
	}
}	// Kbharkiv_Walker_Nav_Children
