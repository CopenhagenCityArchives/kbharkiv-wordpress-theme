<?php

/**
 * Create HTML list of nav menu items.
 *
 * @since 1.0
 * @uses Walker_Nav_Menu
 */

class Kbharkiv_Walker_Nav_Children extends Walker_Page {
  public function start_el( &$output, $item, $depth = 0, $args = array(), $current_page = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    extract($args, EXTR_SKIP);

    $css_class = array('page-item', $depth == 0 ? 'col-sm-6 col-md-5 col-lg-4 col-xl-3 mb-5' : '');

    $css_class = implode(' ', apply_filters( 'page_css_class', $css_class, $item, $depth, $args, $current_page ));

    $article_class = $depth == 0 ? 'article-link' : '';
    $tag = $depth == 0 ? 'div' : 'li';
    $thumbnail = $depth == 0 ? has_post_thumbnail($item->ID) ? get_the_post_thumbnail($item->ID, 'herox1', ['class' => 'mb-4']) : '' : '';
    $headline = $depth == 0 ? 'h3' : 'div';
    $icon = $depth == 0 ? '<svg class="icon d-inline-block"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#arrow-right-circle"/></svg>' : '';

    //Modification
    $content = $link_before . $thumbnail . '<' . $headline .' class="mb-2"><span class="mr-2">' . get_the_title($item->ID) . '</span>' . $icon . '</' . $headline .'>' . $link_after;
    $lead = $depth == 0 && null !== get_field('lead', $item->ID) ? '<div>' . get_field('lead', $item->ID) . '</div>' : '';
    $output .= $indent . '<' . $tag . ' class="' . $css_class . '"><a class="' . $article_class . '" href="' . get_permalink($item->ID) . '">' . $content . $lead . '</a>';
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
    $tag = $depth == 0 ? 'div' : 'li';
    $blank_col = $depth == 0 ? '<div class="d-none d-md-block col-md-1 d-lg-none col-xl-1 d-xl-block"></div>' : '';
    $output .= "</" . $tag . ">{$n}$blank_col";
 	}
}	// Kbharkiv_Walker_Nav_Children
