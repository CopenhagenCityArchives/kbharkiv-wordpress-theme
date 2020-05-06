export default {
  init() {
    function initMenu() {
      let viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      let hamburgerMenu = viewportWidth < 922;
      let hamburgerOpen;
      let currentSubMenuLevel = 0;
      let $tabbable;
      let $firstTabbable;
      let $lastTabbable;

      function updateSubMenu() {
        $('.top-menu ul.menu').attr('data-current-level', currentSubMenuLevel)
        updateTabbable();
      }

      function updateTabbable() {
        // Unbind tab events
        if ($lastTabbable != null) {
          $lastTabbable.off('keydown');
          $firstTabbable.off('keydown');
        }

        // Select tabbable elements in current submenu level
        if(currentSubMenuLevel > 0) {
          $tabbable = $('.top-menu-focusable, .top-menu ul.menu .active[data-level="' + currentSubMenuLevel + '"] > .sub-menu > li > a');
        } else {
          $tabbable = $('.top-menu-focusable, .top-menu ul.menu > li > a');
        }

        $firstTabbable = $tabbable.first();
        $lastTabbable = $tabbable.last();

        // Trap tab focus inside the filter menu. When last tabbable element is focussed the next will be the first tabbable elemenet
        $lastTabbable.keydown(function(e) {
          if (e.which === 9 && !e.shiftKey) {
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);
            $firstTabbable.focus();
          }
        });

        // Trap tab focus inside the filter menu. Same as above but in the other direction.
        $firstTabbable.keydown(function(e) {
          if (e.which === 9 && e.shiftKey) {
            e.preventDefault();
            $lastTabbable.focus();
          }
        });
      }

      // function openSubMenu($menuItem) {
      //   currentSubMenuLevel = $menuItem.data('level')
      //
      //   if(currentSubMenuLevel > 0) {
      //     $('.top-menu ul.menu > li > a').attr( 'tabindex', '-1' );
      //   }
      //
      //   $menuItem.addClass('active');
      //   $menuItem.find('> a').attr( 'aria-expanded', true );
      //   $menuItem.find('> .sub-menu > li > a').attr( 'tabindex', '0' );
      //
      //   updateSubMenu();
      // }

      function closeSubMenu() {
        currentSubMenuLevel = 0;
        $('.top-menu .sub-menu li').removeClass('active')
        $('.top-menu .sub-menu a').attr( 'aria-expanded', false ).attr( 'tabindex', '-1' );
        updateSubMenu();
      }

      function closeSubMenuLevel() {
        let $menuItem = $('.parent.active[data-level="' + currentSubMenuLevel + '"');

        currentSubMenuLevel --;

        $menuItem.removeClass('active')
        $menuItem.find('> a').attr( 'aria-expanded', false )
        $menuItem.find('> .sub-menu > li > a').attr( 'tabindex', '-1' );

        updateSubMenu();
      }

      function openHamburgerMenu() {
        hamburgerOpen = true;
        $('.nav-toggle').attr( 'aria-expanded', 'true')
        $('.top-menu').addClass('active')
          .find('.nav-toggle .sr-only').text('Luk menu');

        updateTabbable();
      }

      function closeHamburgerMenu() {
        hamburgerOpen = false;
        closeSubMenu()
        $('.nav-toggle').attr( 'aria-expanded', 'false')
        $('.top-menu').removeClass('active')
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

      function updateMenu($clickedMenuItem, newLevel) {
        $('.top-menu ul.menu a').attr( 'tabindex', '-1' );

        $clickedMenuItem.addClass('active');
        $clickedMenuItem.find('> a').attr( 'aria-expanded', true );
        $clickedMenuItem.find('> .sub-menu > li > a').attr( 'tabindex', '0' );

        $('.top-menu ul.menu').attr('data-current-level', currentSubMenuLevel)
        //updateTabbable();
      }

      // Add click-event to menu-items with sub-menu
      $('.top-menu nav .parent > a').click(function(e) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        let $clickedMenuItem = $(this).parent();
        updateMenu($clickedMenuItem, $clickedMenuItem.data('level'));

        // if($menuItem.hasClass('active')) {
        //   closeSubMenuLevel();
        // } else {
        //   openSubMenu($menuItem);
        // }
      });

      $('.top-menu nav .nav-back').click(function(e) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        updateMenu($('.parent.active[data-level="' + currentSubMenuLevel + '"', currentSubMenuLevel -- );
      });

      // Close sub-menu when hitting the esc keyboard btn
      $(window).keyup(function(e) {
        if (e.key === 'Escape' &&  currentSubMenuLevel > 0) {
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

        if (currentSubMenuLevel > 0) {
          closeSubMenu();
        }

        hamburgerMenu = viewportWidth < 992;
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
