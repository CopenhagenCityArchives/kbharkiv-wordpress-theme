export function searchSite() {
    $('#searchform_site').submit(function(){
      
      var query = $('#search-internal').val().trim();
      
      if(query.length > 0){
        if(window.ga){
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
  