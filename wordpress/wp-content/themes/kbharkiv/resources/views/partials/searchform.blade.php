<form role="search" method="get" class="search-form" action="{{ esc_url( home_url( '/' ) ) }}">
  <div class="form-group">
    <label for="search-internal">Søg på siden</label>
    <p class="small">Fritekstsøgning i artikler og nyheder her på siden.</p>
    <input type="search" class="form-control search-focusable" id="search-internal" placeholder="Søg" value="{{ get_search_query() }}" name="s" tabindex="-1" />
  </div>

  <button type="submit" class="btn btn-primary search-focusable" tabindex="-1">Søg</button>
</form>
