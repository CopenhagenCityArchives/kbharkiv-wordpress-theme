export function topMenu() {
  let currentSubMenuColor;
  let currentLogoColor;
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
      $tabbable = $('.top-menu-focusable, .top-menu ul.menu .active[data-level="' + currentSubMenuLevel + '"] > .sub-menu > li > a, .top-menu ul.menu .active[data-level="' + currentSubMenuLevel + '"] .search-focusable');
    } else {
      $tabbable = $('.top-menu-focusable, .top-menu ul.menu > li > a, .top-menu ul.menu .active a, .top-menu ul.menu .active .search-focusable, .top-menu ul.menu .active .desktop-menu-toggle');
    }

    $firstTabbable = $tabbable.first();
    $lastTabbable = $tabbable.last();

    // Trap tab focus inside the filter menu. When last tabbable element is focussed the next will be the first tabbable element
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

  function updateColor($el) {
    currentSubMenuColor = $el.data('color');
    currentLogoColor = $el.data('logo-color');
    $('.top-menu').css('background-color', currentSubMenuColor);
    $('.top-menu #kk-logo-shape').css('fill', currentLogoColor);
  }

  function openSubMenu($menuItem) {
    updateColor($menuItem);
    currentSubMenuLevel = $menuItem.data('level');
    $menuItem.addClass('active');
    $menuItem.find('> a').attr( 'aria-expanded', true );

    if(mobileMenu) {
      $('.top-menu ul.menu a').attr( 'tabindex', '-1' ); // deactive all
      $menuItem.find('> .sub-menu > li > a, .search-focusable').attr( 'tabindex', '' );
    } else {
      $('body').addClass('modal-open');
      $('.top-menu').addClass('active');
      $('.top-menu ul.menu .sub-menu a').attr( 'tabindex', '-1' );
      $menuItem.find('> .sub-menu a, .search-focusable').attr( 'tabindex', '' );
    }

    updateSubMenu();
    setTabbable();
  }

  function closeSubMenu() {
    currentSubMenuLevel = 0;
    $('.top-menu ul.menu li').removeClass('active')
    $('.top-menu .sub-menu a').attr( 'aria-expanded', false ).attr( 'tabindex', '-1' );
    $('.top-menu ul.menu > li > a').attr( 'tabindex', '' );

    updateSubMenu();
    removeTabbable();
    updateColor($('.top-menu'));
  }

  function closeSubMenuLevel() {
    let $menuItem = $('.parent.active[data-level="' + currentSubMenuLevel + '"');


    $menuItem.removeClass('active').find('> a').attr( 'aria-expanded', false )

    // Disable tabbing on closed submenu
    if(mobileMenu) {
      $menuItem.find('> a').focus();
      $menuItem.find('> .sub-menu > li > a, .search-focusable').attr( 'tabindex', '-1' );
    } else {
      $menuItem.find('> .sub-menu a, .search-focusable').attr( 'tabindex', '-1' );
    }

    currentSubMenuLevel --;

    updateSubMenu();

    if (currentSubMenuLevel > 0) {
      // Enable tabbing on parent menu (only mobile)
      $('.parent.active[data-level="' + currentSubMenuLevel + '"] > .sub-menu > li > a').attr( 'tabindex', '' );
      setTabbable();
    } else if (mobileMenu) {
      // Mobile
      // Enable tabbing on top level menu
      $('.top-menu-focusable, .top-menu ul.menu > li > a').attr( 'tabindex', '' );
      setTabbable();
      updateColor($('.top-menu'));
    } else {
      // Desktop
      // Enable tabbing on top level menu
      $('.top-menu-focusable, .top-menu ul.menu > li > a').attr( 'tabindex', '' );
      $('body').removeClass('modal-open');
      $('.top-menu').removeClass('active');
      removeTabbable();
      updateColor($('.top-menu'));
    }
  }

  function openMobileMenu() {
    mobileMenuOpen = true;
    $('.mobile-menu-toggle').attr( 'aria-expanded', 'true').find('.sr-only').text('Luk menu')
    $('body').addClass('modal-open'); // adds overflow hidden on body
    $('.top-menu').addClass('active');
    setTabbable();
  }

  function closeMobileMenu() {
    mobileMenuOpen = false;
    closeSubMenu();
    $('.mobile-menu-toggle').attr( 'aria-expanded', 'false').find('.sr-only').text('Åbn menu');
    $('body').removeClass('modal-open');
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

    // Open submenu if click on arrow on mobile or top level link on desktop
    if((mobileMenu && $(this).hasClass('sub-menu-btn')) || (!mobileMenu && $menuItem.attr('data-level') == '1')) {
      e.preventDefault ? e.preventDefault() : (e.returnValue = false);

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
    }
  });

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
