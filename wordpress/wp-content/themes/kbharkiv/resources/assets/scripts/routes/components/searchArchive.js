export function searchArchive() {
  $('#searchform_catalog').submit(function(event){
    if($('#catalog_query').val().trim().length > 0){
      event.preventDefault();

      var searchVal = encodeURI($('#catalog_query').val());
      var url = 'http://www.kbharkiv.dk/kbharkiv/php/starbas_search.php?catalog_query=' + searchVal;

      window.open(url, '_blank');
    }
    else{
      event.preventDefault();
    }
  });
}
