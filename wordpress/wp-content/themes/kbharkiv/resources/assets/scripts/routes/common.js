import { chat } from './components/chat.js';
import { checkChatScroll } from './components/chat.js';
import { changeBackground } from './components/changeBackground.js';
import { moduleBeforeAndAfter } from './components/moduleBeforeAndAfter.js';
import { moduleGallery } from './components/moduleGallery.js';
import { moduleShortcuts } from './components/moduleShortcuts.js';
import { topMenu } from './components/topMenu.js';
import { searchArchive } from './components/searchArchive.js';
import { searchPerson } from './components/searchPerson.js';
import { searchSite } from './components/searchSite.js';

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
    moduleBeforeAndAfter();
    moduleGallery();
    moduleShortcuts();
    topMenu();
    searchArchive();
    searchPerson();
    searchSite();
  },
};
