export function searchSite() {
    $('#searchform_site').submit(function(event) {
      var query = $('#searchform_site-query').val().trim();
      
      if (query.length > 0) {
        if (window.ga) {
          window.ga('send', {
            hitType: 'event',
            eventCategory: 'frontpage_search',
            eventAction: 'site',
            eventLabel: query,
          });
        }
      }
    });
  }
  