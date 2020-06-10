import { chat } from './components/chat.js';
import { checkChatScroll } from './components/chat.js';
import { changeBackground } from './components/changeBackground.js';
import { moduleGallery } from './components/moduleGallery.js';
import { moduleShortcuts } from './components/moduleShortcuts.js';
import { topMenu } from './components/topMenu.js';
import { searchArchive } from './components/searchArchive.js';

export default {
  init() {
    let last_known_scroll_position = 0;
    let ticking = false;

    window.addEventListener('scroll', function() {
      last_known_scroll_position = window.scrollY;

      if (!ticking) {
        window.requestAnimationFrame(function() {
          changeBackground(last_known_scroll_position);
          checkChatScroll(last_known_scroll_position);
          moduleShortcuts();
          ticking = false;
        });

        ticking = true;
      }
    });
  },
  finalize() {
    chat();
    moduleGallery();
    topMenu();
    searchArchive();
    moduleShortcuts();
  },
};

// Search function used for person searches
// Note that it requires an input element named person_search_term
// Example of html:
/*
<form class="apacs_freetext_search__form" onsubmit="return submitFormApacs()">
  <input id="apacs_search_term" title="Navn, adresse eller fritekst" type="text" placeholder="Navn, adresse eller fritekst">
  <button class="button" value="søg">Søg</button>
</form>
*/
// var submitFormApacs = function() {
//   console.log('searching');
//   var term = document.getElementById('person_search_term').value;
//   if (term && term != '') {
//     var newUrl = window.location.protocol + '//' + window.location.hostname + '/search_url' + '/results?q1.f=freetext_store&q1.op=in_multivalued&q1.t=' + term + '&sortField=lastname&sortDirection=asc&postsPrPage=10&collections=1,17,18,19';
//     console.log(newUrl);
//     window.location.href = newUrl;
//   } else {
//     console.log('could not search, no term', term);
//   }
//   return false;
// };










    // From http://www.kbharkiv.dk/kbharkiv/js/frontpage_searches.js
    // $('#searchform_persons').submit(function(event){
    //   event.preventDefault();
    //   if($('#person_query').val().trim().length > 0){
    //     //ga('send', 'event', 'forside_sÃ¸gning', 'person', $('#person_query').val().trim());
    //     $('#value1').val($('#person_query').val());
    //     $('#person_query_submit').attr('disabled', true);
    //     $('#searchform_persons_status').html('SÃ¸ger...');
    //     $.ajax({
    //       url: 'http://www.politietsregisterblade.dk/index.php',
    //       data: $('#searchform_persons').serialize(),
    //       dataType: 'jsonp',
    //       timeout: 10000,
    //       sync: false,
    //       //success: function(data){respondOnSearchAnswer(data)},
    //       error: function(){$('#searchform_persons_status').html('Kunne ikke starte sÃ¸gningen')},
    //     }).success(function(jsonResponse){
    //       $('#person_query_submit').attr('disabled', false);
    //       if(jsonResponse.responseCode == 1) {
    //         //Redirect
    //         //var url = 'http://www.politietsregisterblade.dk/index.php?option=com_sfup&controller=politsearch&task=displayresults&searchname=polit_adv&searchidentifier=' + jsonResponse.searchIdentifier;
    //         //$('#windowUrl').val(url);
    //         //window.open(url, '_blank');
    //         //Redirect
    //         var url = 'http://www.politietsregisterblade.dk/index.php?option=com_sfup&controller=politsearch&task=displayresults&searchname=polit_adv&searchidentifier=' + jsonResponse.searchIdentifier;
    //
    //         window.location = url;
    //         //$('#testButton').trigger('click');
    //         //$('#searchform_persons_status').html('');
    //       }
    //       if(jsonResponse.responseCode == 3 || jsonResponse.responseCode == 5){
    //         $('#searchform_persons_status').html(jsonResponse.errorMessage);
    //       }
    //       if(jsonResponse.responseCode == 4){
    //         //Fejlmeddelelse pÃ¥ parameter
    //         $('#searchform_persons_status').html(jsonResponse.errors[0]);
    //       }
    //       if(jsonResponse.responseCode === null){
    //         $('#searchform_persons_status').html(jsonResponse.errors[0]);
    //       }
    //     });
    //   }
    // });
