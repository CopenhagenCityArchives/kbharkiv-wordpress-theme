export default {
  init() {

    function initMenu() {
      let viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      let mobileMenu = viewportWidth < 922;
      let mobileMenuOpen;
      let currentSubMenuLevel = 0;
      let $tabbable;
      let $firstTabbable;
      let $lastTabbable;

      function updateSubMenu() {
        $('.top-menu ul.menu').attr('data-current-level', currentSubMenuLevel)
      }

      function removeTabbable() {
        if ($lastTabbable != null) {
          $lastTabbable.off('keydown');
          $firstTabbable.off('keydown');
        }
      }
      function setTabbable() {
        // Unbind tab events
        removeTabbable();

        // Select tabbable elements in current submenu level
        if(currentSubMenuLevel == 0) {
          $tabbable = $('.top-menu-focusable, .top-menu ul.menu > li > a');
        } else if (mobileMenu) {
          $tabbable = $('.top-menu-focusable, .top-menu ul.menu .active[data-level="' + currentSubMenuLevel + '"] > .sub-menu > li > a');
        } else {
          $tabbable = $('.top-menu-focusable, .top-menu ul.menu > li > a, .top-menu ul.menu .active a');
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

      function openSubMenu($menuItem) {
        currentSubMenuLevel = $menuItem.data('level')
        $menuItem.addClass('active');
        $menuItem.find('> a').attr( 'aria-expanded', true );

        if(mobileMenu) {
          $('.top-menu ul.menu a').attr( 'tabindex', '-1' );
          $menuItem.find('> .sub-menu > li > a').attr( 'tabindex', '0' );
        } else {
          $('.top-menu').addClass('active');
          $('.top-menu ul.menu .sub-menu a').attr( 'tabindex', '-1' );
          $menuItem.find('> .sub-menu a').attr( 'tabindex', '0' );
        }

        updateSubMenu();
        setTabbable();
      }

      // Note to self: Merge with closeSubMenuLevel
      function closeSubMenu() {
        currentSubMenuLevel = 0;
        $('.top-menu ul.menu li').removeClass('active')
        $('.top-menu .sub-menu a').attr( 'aria-expanded', false ).attr( 'tabindex', '-1' );
        $('.top-menu ul.menu > li > a').attr( 'tabindex', '' );

        updateSubMenu();
        removeTabbable();
      }

      function closeSubMenuLevel() {
        let $menuItem = $('.parent.active[data-level="' + currentSubMenuLevel + '"');

        $menuItem.removeClass('active')
        $menuItem.find('> a').attr( 'aria-expanded', false )

        // Disable tabbing on closed submenu
        mobileMenu ? $menuItem.find('> .sub-menu > li > a').attr( 'tabindex', '-1' ) : $menuItem.find('> .sub-menu a').attr( 'tabindex', '-1' );

        currentSubMenuLevel --;

        updateSubMenu();

        if (currentSubMenuLevel > 0) {
          // Enable tabbing on parent menu (only mobile)
          $('.parent.active[data-level="' + currentSubMenuLevel + '"] > .sub-menu > li > a').attr( 'tabindex', '0' );
          setTabbable();
        } else if (mobileMenu) {
          // Mobile
          // Enable tabbing on top level menu
          $('.top-menu-focusable, .top-menu ul.menu > li > a').attr( 'tabindex', '0' );
          setTabbable();
        } else {
          // Desktop
          // Enable tabbing on top level menu
          $('.top-menu-focusable, .top-menu ul.menu > li > a').attr( 'tabindex', '0' );
          $('.top-menu').removeClass('active');
          removeTabbable();
        }
      }

      function openMobileMenu() {
        mobileMenuOpen = true;
        $('.mobile-menu-toggle').attr( 'aria-expanded', 'true').find('.sr-only').text('Luk menu')
        $('.top-menu').addClass('active')
        setTabbable();
      }

      function closeMobileMenu() {
        mobileMenuOpen = false;
        closeSubMenu();
        $('.mobile-menu-toggle').attr( 'aria-expanded', 'false').find('.sr-only').text('Åbn menu');
        $('.top-menu').removeClass('active');
      }

      // Add click-event to hamburger menu btn
      $('.nav-toggle').click(function() {
        if(mobileMenu) {
          mobileMenuOpen ? closeMobileMenu() : openMobileMenu();
        } else {
          closeSubMenuLevel();
        }
      })

      // Add click-event to menu-items with sub-menu
      $('.top-menu nav .parent > a').click(function(e) {

        let $menuItem = $(this).parent()

        // Prevent default click if mobile menu or top level of desktop
        if(mobileMenu || $menuItem.attr('data-level') == '1' ) {
          e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        }

        if($menuItem.hasClass('active')) {
          // If menu item is already open. Close it.
          closeSubMenuLevel();
        } else if(!mobileMenu && $('.top-menu ul.menu > li.active').length) {
          // If another menu item is already open. Close it before opening a new one
          closeSubMenuLevel();
          openSubMenu($menuItem);
        } else {
          // Else just open
          openSubMenu($menuItem);
        }
        //}
      });

      // Add mouseenter-event to menu-items with sub-menu
      // $('.top-menu nav .parent > a').mouseenter(function() {
      //   var $this = $(this);
      //   if (!mobileMenu) {
      //     setTimeout(function () {
      //       if ($this.parent().find($this.selector + ':hover').length > 0) {
      //         openSubMenu($this.parent());
      //       }
      //     }, 400);
      //
      //     // $('.top-menu nav .parent > a').mouseenter(function() {
      //     //
      //     // })
      //
      //   }
      // })

      $('.top-menu nav .nav-back').click(function(e) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        closeSubMenuLevel();
      });

      //Close sub-menu when hitting the esc keyboard btn
      $(window).keyup(function(e) {
        if (e.key === 'Escape' && currentSubMenuLevel > 0) {
          closeSubMenuLevel();
        } else if(e.key === 'Escape' && mobileMenuOpen) {
          closeMobileMenu();
        }
      });

      function setMenuLayout() {
        // Return if we're not changing menu layout
        if (mobileMenu == viewportWidth < 992) return;

        if (mobileMenuOpen) {
          closeMobileMenu();
        }

        if (currentSubMenuLevel > 0) {
          closeSubMenu();
        }

        mobileMenu = viewportWidth < 992;
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
