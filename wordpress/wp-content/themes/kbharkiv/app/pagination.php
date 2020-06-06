<?php
/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 * @param array $params
 *
 * @return string|null
 *
 * Accepts a WP_Query instance to build pagination (for custom wp_query()),
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 5.4.1
 * - Tested with Bootstrap 4.4
 * - Tested on Sage 9.0.9
 *
 * INSTALLATION:
 * add this file content to your theme function.php or equivalent
 *
 * USAGE:
 *     <?php echo pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ... endwhile() ...
 *       echo pagination($query);
 *     ?>
 */
function pagination( \WP_Query $wp_query = null, $echo = true, $params = [] ) {
  if ( null === $wp_query ) {
    global $wp_query;
  }

  $add_args = [];

  //add query (GET) parameters to generated page URLs
  /*if (isset($_GET[ 'sort' ])) {
      $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
  }*/

  $pages = paginate_links( array_merge( [
    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    'format'       => '?paged=%#%',
    'current'      => max( 1, get_query_var( 'paged' ) ),
    'total'        => $wp_query->max_num_pages,
    'type'         => 'array',
    'show_all'     => false,
    'end_size'     => 1,
    'mid_size'     => 2,
    'prev_next'    => true,
    'prev_text'    => '<div class="sr-only">Forrige side</div><svg class="icon" aria-hidden="true"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#arrow-left"/></svg>',
    'next_text'    => '<div class="sr-only">Næste side</div><svg class="icon" aria-hidden="true"><use xlink:href="' . App\asset_path('images/feather-sprite.svg') . '#arrow-right"/></svg>',
    'add_args'     => $add_args,
    'add_fragment' => ''
  ], $params ));

  if ( is_array( $pages ) ) {
    //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
    $pagination = '<nav aria-label="Paginering"><ul class="pagination">';

    foreach ( $pages as $page ) {
      $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . (strpos($page, 'dots') !== false ? '<span class="page-link dots disabled">—</span>' : str_replace('page-numbers', 'page-link', $page)) . '</li>';
    }

    $pagination .= '</ul></nav>';

    if ( $echo ) {
      echo $pagination;
    } else {
      return $pagination;
    }
  }

  return null;
}
