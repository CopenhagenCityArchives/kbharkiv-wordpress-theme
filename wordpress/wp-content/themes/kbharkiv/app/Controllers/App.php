<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Seneste nyheder', 'sage');
        }
        if (is_tax()) {
          $tax = get_queried_object();
          return $tax->name;
        }
        if (is_search()) {
            return sprintf(__('Søgeresultater for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Ikke fundet', 'sage');
        }
        if (is_tag()) {
            return sprintf( __( 'Emne: %s' ), single_tag_title( '', false ) );
        }
        if (is_archive()) {
            return post_type_archive_title();
        }
        return get_the_title();
    }
}
