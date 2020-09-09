export function searchArchive() {
  $('#searchform_catalog').submit(function(event){
    if($('#catalog_query').val().trim().length > 0){
      event.preventDefault();

      var searchVal = encodeURI($('#catalog_query').val());
      var url = 'https://www.starbas.net/av_soeg_res.php?soeg=' + searchVal + '&a_id=1&art=O01&retur_link=arkivets_forside.php%3Farkiv%3D1';

      if(window.ga){
        window.ga('send', {
          hitType: 'event',
          eventCategory: 'frontpage_search',
          eventAction: 'starbas',
          eventLabel: $('#catalog_query').val(),
        });
      }

      window.open(url, '_blank');
    }
    else{
      event.preventDefault();
    }
  });
}
