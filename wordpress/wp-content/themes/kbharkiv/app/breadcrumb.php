<?php

/**
 * Retrieve category parents.
 *
 * @param int $id Category ID.
 * @param array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string|WP_Error A list of category parents on success, WP_Error on failure.
 */
function custom_get_category_parents( $id, $visited = array() ) {
  $chain = '';
  $parent = get_term( $id, 'category' );

  if ( is_wp_error( $parent ) )
    return $parent;

  $name = $parent->name;

  if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
    $visited[] = $parent->parent;
    $chain .= custom_get_category_parents( $parent->parent, $visited );
  }

  $chain .= '<li class="breadcrumb-item"><a href="' . esc_url( get_category_link( $parent->term_id ) ) . '">' . $name. '</a>' . '</li>';

  return $chain;
}

function the_breadcrumb() {
  global $post;

  $html = '<nav class="breadcrumb-wrapper container-fluid" aria-label="Brødkrummesti"><ol class="breadcrumb" style="background-color: ' . get_theme_color(1) . '">';

  $html .= '<li class="breadcrumb-item"><a href="'.esc_url(home_url('/')).'"><svg class="icon" aria-hidden="true"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#home"/></svg><span class="sr-only">Hjem</span></a></li>';

  if ( is_attachment() ) {
    $parent = get_post($post->post_parent);
    $categories = get_the_category($parent->ID);

    if ( $categories[0] ) {
      $html .= custom_get_category_parents($categories[0]);
    }

    $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a></li>';
    $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
  }

  elseif (is_home()) {
    $html .= '<li class="breadcrumb-item active">' . App::title() . '</li>';
  }

  elseif (is_bbpress()) {
    $html .= get_page_by_path( 'deltag' ) ? '<li class="breadcrumb-item"><a href="' . get_permalink( get_page_by_path( 'deltag' ) ). '">' . get_the_title( get_page_by_path( 'deltag') ) . '</a></li>' : '';

    $parents = array_reverse( get_post_ancestors( $post->ID ) );
    foreach ( $parents as $parent_id ) {
      $html .= '<li class="breadcrumb-item"><a href="' . get_permalink( $parent_id ) . '">' . get_the_title( $parent_id ) . '</a></li>';
    }

    if (bbp_is_forum_archive()) {
      $html .= '<li class="breadcrumb-item active">' . post_type_archive_title('', false) . '</li>';
    } else {
      $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
    }
  }

  elseif ( is_category() ) {
    $category = get_category( get_query_var( 'cat' ) );

    if ( $category->parent != 0 ) {
      $html .= custom_get_category_parents( $category->parent );
    }

    $html .= '<li class="breadcrumb-item active">' . single_cat_title( '', false ) . '</li>';
  }

  elseif (is_tax()) {
    $post_type = get_post_type();
    $html .= $post_type == 'medarbejdere' || $post_type == 'arrangementer' ? '<li class="breadcrumb-item"><a href="' . get_permalink( get_page_by_path( 'om-os' ) ). '">' . get_the_title( get_page_by_path( 'om-os') ) . '</a></li>' : '';
    $html .= '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link($post_type) . '">' . get_post_type_object($post_type)->label . '</a></li>';
    $html .= '<li class="breadcrumb-item active">' . App::title() . '</li>';
  }

  elseif (is_post_type_archive(['arrangementer', 'medarbejdere'])) {
    $html .= get_page_by_path( 'om-os' ) ? '<li class="breadcrumb-item"><a href="' . get_permalink( get_page_by_path( 'om-os' ) ). '">' . get_the_title( get_page_by_path( 'om-os') ) . '</a></li>' : '';
    $html .= '<li class="breadcrumb-item active">' . post_type_archive_title('', false) . '</li>';
  }

  elseif (is_archive() ) {
    $html .= '<li class="breadcrumb-item active">' . post_type_archive_title('', false) . '</li>';
  }

  elseif ( is_page() && !is_front_page() ) {
    $parent_id = $post->post_parent;
    $parent_pages = array();

    while ( $parent_id ) {
      $page = get_page($parent_id);
      $parent_pages[] = $page;
      $parent_id = $page->post_parent;
    }

    $parent_pages = array_reverse( $parent_pages );

    if ( !empty( $parent_pages ) ) {
      foreach ( $parent_pages as $parent ) {
        $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $parent->ID ) ) . '">' . get_the_title( $parent->ID ) . '</a></li>';
      }
    }

    $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
  }

  elseif ( is_singular( 'post' ) ) {
    $html .= '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link( 'post' ) . '">' . get_the_title( get_option('page_for_posts', true) ) . '</a></li>';
    $html .= '<li class="breadcrumb-item active">' . App::title() . '</li>';
  }

  elseif ( is_singular( ) ) {
    $post_type = get_post_type_object(get_post_type());
    $post_type_link = get_post_type_archive_link(get_post_type());

    $html .= '<li class="breadcrumb-item"><a href="' . $post_type_link . '">' . $post_type->labels->name . '</a></li>';
    $html .= '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
  }

  elseif ( is_tag() ) {
    $html .= '<li class="breadcrumb-item active">' . single_tag_title( '', false ) . '</li>';
  }

  elseif ( is_day() ) {
    $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
    $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'm' ) . '</a></li>';
    $html .= '<li class="breadcrumb-item active">' . get_the_time('d') . '</li>';
  }

  elseif ( is_month() ) {
    $html .= '<li class="breadcrumb-item"><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a></li>';
    $html .= '<li class="breadcrumb-item active">' . get_the_time( 'F' ) . '</li>';
  }

  elseif ( is_year() ) {
    $html .= '<li class="breadcrumb-item active">' . get_the_time( 'Y' ) . '</li>';
  }

  elseif ( is_author() ) {
    $html .= '<li class="breadcrumb-item active">' . get_the_author() . '</li>';
  }

  elseif ( is_search() ) {

  }

  elseif ( is_404() ) {
    $html .= '<li class="breadcrumb-item active">' . __('Siden blev ikke fundet', 'sage') . '</li>';
  }

  $html .= '</ol></nav>';

  echo $html;
}
