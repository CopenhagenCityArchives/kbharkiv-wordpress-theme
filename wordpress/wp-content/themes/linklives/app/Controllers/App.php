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
            return function_exists('pll__') ? pll__('Nyheder') : __('Nyheder');
        }
        if ( is_category() || is_tag() ) {
            return single_cat_title( '', false );
        }
        if (is_archive()) {
            return post_type_archive_title();
        }
        if (is_search()) {
            return function_exists('pll__') ? pll__('Søg') : __('Søg');
        }
        if (is_404()) {
            return function_exists('pll__') ? pll__('Siden blev ikke fundet') : __('Siden blev ikke fundet');
        }
        return get_the_title();
    }

    public static function parentPage()
    {
        global $post;

        if ( $post && $post->post_parent ) {
            $parent['title'] = get_the_title($post->post_parent);
            $parent['url'] = get_the_permalink($post->post_parent);
            return $parent;
        }

        if ( is_archive() && get_field('parent_page_' . pll_current_language('slug'), get_post_type() . '_options') ) {
          $page = get_field('parent_page_' . pll_current_language('slug'), get_post_type() . '_options');
          $parent['title'] = $page->post_title;
          $parent['url'] = get_permalink($page->ID);
          return $parent;
        }

        if ( is_tag() ) {
            $parent['title'] = function_exists('pll__') ? pll__('Nyheder') : __('Nyheder');
            $parent['url'] = get_post_type_archive_link( 'post' );
            return $parent;
        }

        if ( is_singular(['medlem', 'fond', 'partner', 'associeret_partner']) ) {
            $parent['title'] = get_post_type_object(get_post_type())->labels->singular_name;
            $parent['url'] = get_post_type_archive_link(get_post_type());
            return $parent;
        }
    }
}
