export function searchPerson() {
  $('#apacs_freetext_search__form').submit(function() {
    console.log('searching');

    var term = document.getElementById('person_search_term').value;

    if (term && term != '') {
      var newUrl = window.location.origin + '/search_url' + '/results?q1.f=freetext_store&q1.op=in_multivalued&q1.t=' + term + '&sortField=lastname&sortDirection=asc&postsPrPage=10&collections=1,17,18,19';
      window.open(newUrl);
    } else {
      console.log('could not search, no term', term);
    }

    return false;
  });
}
