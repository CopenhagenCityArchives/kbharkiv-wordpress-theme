<footer class="module full-width" style="background-image: url(@asset('images/keyvisual-footer.svg'))">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-4 order-lg-2">
        <h5>Links</h5>
        @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['walker' => new Sub_Menu_Wrap(), 'items_wrap' => '<ul class="list-unstyled">%3$s</ul>', 'container'=> false, 'theme_location' => 'footer_navigation', 'menu_class' => 'menu-item menu-primary']) !!}
        @endif
      </div>

      <div class="col-lg-4 order-lg-1 text-center text-lg-left">
        <a class="brand" height="2.5rem" width="auto" href="{{ pll_home_url() }}"><img alt="{{ get_bloginfo('name', 'display') }}" src="@asset('images/link-lives.svg')"></a>
        <p class="mt-3 text-muted small">{{ get_field('footer_text_' . pll_current_language('slug'), 'options') }}</p>
      </div>
    </div>
  </div>
</footer>
