export default {
  init() {
    function initMenu() {
      let viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      let hamburgerMenu = viewportWidth < 922;
      let hamburgerOpen;
      let subMenuOpen;
      let currentSubMenuLevel;

      // $('header .level-1 > a, header .menu-secondary a').attr( 'tabindex', hamburgerMenu ? '-1' : '0' );
      //
      function changeSubMenu() {
        $('header ul.menu').attr('data-level', currentSubMenuLevel)
      }

      function openSubMenu($menuItem) {
        //$('header ul.menu a').attr( 'tabindex', '-1' );
        subMenuOpen = true;

        $menuItem.addClass('active');
        $menuItem.find('> a').attr( 'aria-expanded', true );
        $menuItem.find('> .sub-menu > li > a').attr( 'tabindex', '0' );

        changeSubMenu();
      }

      function closeSubMenu() {
        currentSubMenuLevel = 0;
        subMenuOpen = false;
        $('header .sub-menu li').removeClass('active')
        $('header .sub-menu a').attr( 'aria-expanded', false ).attr( 'tabindex', '-1' );
        changeSubMenu();
      }

      function closeSubMenuLevel() {
        let $menuItem = $('.parent.active[data-level="' + currentSubMenuLevel + '"');

        currentSubMenuLevel --;
        subMenuOpen = currentSubMenuLevel == 0 ? false : true;

        $menuItem.removeClass('active')
        $menuItem.find('> a').attr( 'aria-expanded', false )
        $menuItem.find('> .sub-menu > li > a').attr( 'tabindex', '-1' );

        changeSubMenu();
      }

      function openHamburgerMenu() {
        hamburgerOpen = true;
        $('.nav-toggle').attr( 'aria-expanded', 'true')
        $('header').addClass('active')
          .find('.nav-toggle .sr-only').text('Luk menu');
        //$('header .level-1 > a, header .menu-secondary a').attr( 'tabindex', '0' );
      }

      function closeHamburgerMenu() {
        hamburgerOpen = false;
        closeSubMenu()
        $('.nav-toggle').attr( 'aria-expanded', 'false')
        $('header').removeClass('active')
          .find('.nav-toggle .sr-only').text('Åbn menu');
      }

      // Add click-event to hamburger menu btn
      $('.nav-toggle').click(function() {
        if(!hamburgerOpen) {
          openHamburgerMenu()
        } else {
          closeHamburgerMenu()
        }
      })

      // Add click-event to menu-items with sub-menu
      $('header nav .parent > a').click(function(e) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        let $menuItem = $(this).parent()
        currentSubMenuLevel = $menuItem.data('level')

        if($menuItem.hasClass('active')) {
          closeSubMenuLevel();
        } else {
          openSubMenu($menuItem);
        }

        // if($menuItem.hasClass('active')) {
        //   // Close clicked sub-menu
        //   closeSubMenuLevel()
        // } else if($('.menu-item-has-children').hasClass('active')) {
        //   // Close open sub-menu and open clicked sub-menu
        //   closeSubMenuLevel(true)
        //   openSubMenu($menuItem, $wrapper);
        // } else {
        //   // Open clicked sub-menu
        //   openSubMenu($menuItem, $wrapper, true);
        // }
      });

      $('header nav .nav-back').click(function(e) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        closeSubMenuLevel();
      });

      //
      // // Close sub-menu if focus shifts away
      // $('.sub-menu-wrapper').each(function(){
      //   $(this).find('a').last().blur(function() {
      //     closeSubMenuLevel();
      //   });
      // })

      // Close hamburger-menu if hamburgerMenu is true and focus shifts away
      $('header a').last().blur(function() {
        hamburgerMenu && closeHamburgerMenu();
      });

      // // Close sub-menu when clicking on element outside menu
      // $(window).click(function(e){
      //   if($(e.target).closest('.menu-top').length)
      //     return;
      //     closeSubMenuLevel();
      // });

      // Close sub-menu when hitting the esc keyboard btn
      $(window).keyup(function(e) {
        if (e.key === 'Escape' && subMenuOpen) {
          closeSubMenuLevel();
        } else if(e.key === 'Escape' && hamburgerOpen) {
          closeHamburgerMenu();
        }
      });

      function setMenuLayout() {
        // Return if we're not changing menu layout
        if (hamburgerMenu == viewportWidth < 992) return;

        if (hamburgerOpen) {
          closeHamburgerMenu();
        }

        if (subMenuOpen) {
          closeSubMenu();
        }

        hamburgerMenu = viewportWidth < 992;

        // Make first level and language menu accessable with tab based on layout
        //$('header .level-1 > a, header .menu-secondary a').attr( 'tabindex', hamburgerMenu ? '-1' : '0' );
      }

      $( window ).resize(function() {
        viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        setMenuLayout();
      });
    }

    initMenu();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
