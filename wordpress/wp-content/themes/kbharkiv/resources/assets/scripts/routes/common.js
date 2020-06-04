export default {
  init() {
    function initMenu() {
      let currentSubMenuColor;
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
          $tabbable = $('.top-menu-focusable, .top-menu ul.menu > li > a, .top-menu ul.menu .active a, .top-menu ul.menu .active .search-focusable');
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
        currentSubMenuColor = $menuItem.data('color');
        $('.top-menu').css('background-color', currentSubMenuColor);

        currentSubMenuLevel = $menuItem.data('level');
        $menuItem.addClass('active');
        $menuItem.find('> a').attr( 'aria-expanded', true );

        if(mobileMenu) {
          $('.top-menu ul.menu a').attr( 'tabindex', '-1' );
          $menuItem.find('> .sub-menu > li > a, .search-focusable').attr( 'tabindex', '0' );
        } else {
          $('body').addClass('modal-open');
          $('.top-menu').addClass('active');
          $('.top-menu ul.menu .sub-menu a').attr( 'tabindex', '-1' );
          $menuItem.find('> .sub-menu a, .search-focusable').attr( 'tabindex', '0' );
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
      }

      function closeSubMenuLevel() {
        let $menuItem = $('.parent.active[data-level="' + currentSubMenuLevel + '"');

        $menuItem.removeClass('active')
        $menuItem.find('> a').attr( 'aria-expanded', false )

        // Disable tabbing on closed submenu
        mobileMenu ? $menuItem.find('> .sub-menu > li > a, .search-focusable').attr( 'tabindex', '-1' ) : $menuItem.find('> .sub-menu a, .search-focusable').attr( 'tabindex', '-1' );

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
          currentSubMenuColor = $('.top-menu').data('color');
          $('.top-menu').css('background-color', currentSubMenuColor);
        } else {
          // Desktop
          // Enable tabbing on top level menu
          $('.top-menu-focusable, .top-menu ul.menu > li > a').attr( 'tabindex', '0' );
          $('body').removeClass('modal-open');
          $('.top-menu').removeClass('active');
          removeTabbable();
          currentSubMenuColor = $('.top-menu').data('color');
          $('.top-menu').css('background-color', currentSubMenuColor);
        }
      }

      function openMobileMenu() {
        mobileMenuOpen = true;
        $('.mobile-menu-toggle').attr( 'aria-expanded', 'true').find('.sr-only').text('Luk menu')
        $('body').addClass('modal-open');
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

    $('.module-gallery .carousel').each(function() {
      $(this).on('slid.bs.carousel', function () {
        let activeImageDescriptionId = $(this).find('.carousel-item.active').attr('data-description');
        let $description = $(activeImageDescriptionId);

        //console.log(activeImageDescriptionId);
        //console.log($description);
        console.log($(this).closest('.row').find('.gallery-description-item.active'));

        $(this).closest('.row').find('.gallery-description-item.active').removeClass('active');
        $description.addClass('active');
      })
    })

    let last_known_scroll_position = 0;
    let ticking = false;
    let bgDefault = $('.top-menu').data('color');
    let bgScrolled = colorLuminance(bgDefault, -0.08);

    function changeBackground(scroll_pos) {
      if(scroll_pos > 0) {
         $('body').addClass('scrolled');
         $('.page-header').css('background-color', bgScrolled);

      } else {
        $('body').removeClass('scrolled');
        $('.page-header').css('background-color', bgDefault);

      }
    }

    // ADD TO MANUALLY TO PHP COLOR ARRAY
    function colorLuminance(hex, lum) {
      // validate hex string
      hex = String(hex).replace(/[^0-9a-f]/gi, '');
      if (hex.length < 6) {
        hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
      }
      lum = lum || 0;
      // convert to decimal and change luminosity
      var rgb = '#', c, i;
      for (i = 0; i < 3; i++) {
        c = parseInt(hex.substr(i*2,2), 16);
        c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
        rgb += ('00'+c).substr(c.length);
      }
      return rgb;
    }

    window.addEventListener('scroll', function() {
      last_known_scroll_position = window.scrollY;

      if (!ticking) {
        window.requestAnimationFrame(function() {
          changeBackground(last_known_scroll_position);
          checkChatScroll(last_known_scroll_position);
          ticking = false;
        });

        ticking = true;
      }
    });

    function checkChatScroll(scroll_pos) {
      let footer_pos = $('footer').offset().top;
      let chat_btn_stop = footer_pos - window.innerHeight;
      if(scroll_pos > chat_btn_stop) {
        $('.chat-btn').removeClass('fixed')
          // footer position top - (btn height + 3rem distance from btn to footer)
          .css('top', footer_pos - 88);
      } else {
        $('.chat-btn').addClass('fixed')
          .css('top', '');

      }
    }

    $('.chat-btn').popover({
      container: $('.chat-holder'),
      placement: 'top',
      html: true,
      content: function () {
        // Get the content from the hidden sibling.
        return $('#chat').clone()
      },
    }).on('shown.bs.popover	', function () {
      $('.chat-holder #chat-name').trigger('focus');
    })

    // From http://www.kbharkiv.dk/kbharkiv/js/frontpage_searches.js
    $('#searchform_persons').submit(function(event){
      event.preventDefault();
      if($('#person_query').val().trim().length > 0){
        //ga('send', 'event', 'forside_sÃ¸gning', 'person', $('#person_query').val().trim());
        $('#value1').val($('#person_query').val());
        $('#person_query_submit').attr('disabled', true);
        $('#searchform_persons_status').html('SÃ¸ger...');
        $.ajax({
          url: 'http://www.politietsregisterblade.dk/index.php',
          data: $('#searchform_persons').serialize(),
          dataType: 'jsonp',
          timeout: 10000,
          sync: false,
          //success: function(data){respondOnSearchAnswer(data)},
          error: function(){$('#searchform_persons_status').html('Kunne ikke starte sÃ¸gningen')},
        }).success(function(jsonResponse){
          $('#person_query_submit').attr('disabled', false);
          if(jsonResponse.responseCode == 1) {
            //Redirect
            //var url = 'http://www.politietsregisterblade.dk/index.php?option=com_sfup&controller=politsearch&task=displayresults&searchname=polit_adv&searchidentifier=' + jsonResponse.searchIdentifier;
            //$('#windowUrl').val(url);
            //window.open(url, '_blank');
            //Redirect
            var url = 'http://www.politietsregisterblade.dk/index.php?option=com_sfup&controller=politsearch&task=displayresults&searchname=polit_adv&searchidentifier=' + jsonResponse.searchIdentifier;

            window.location = url;
            //$('#testButton').trigger('click');
            //$('#searchform_persons_status').html('');
          }
          if(jsonResponse.responseCode == 3 || jsonResponse.responseCode == 5){
            $('#searchform_persons_status').html(jsonResponse.errorMessage);
          }
          if(jsonResponse.responseCode == 4){
            //Fejlmeddelelse pÃ¥ parameter
            $('#searchform_persons_status').html(jsonResponse.errors[0]);
          }
          if(jsonResponse.responseCode === null){
            $('#searchform_persons_status').html(jsonResponse.errors[0]);
          }
        });
      }
    });

    // $('#testButton').on('click',function(event){
    //     window.open($('#windowUrl'), '_blank');
    // });

    $('#searchform_catalog').submit(function(event){
      if($('#catalog_query').val().trim().length > 0){
        event.preventDefault();

        //ga('send', 'event', 'frontpage_search', 'starbas', $('#catalog_query').val().trim());
        //Maybe necessary for UTF-8 encoded webpages...?
        /*  var strings = $('#catalog_query').val().split(' ');
        var searchString = '';

        $.each(strings, function(index, val){
            searchString = searchString + val + '+';
        });
        searchString = searchString.substring(0, searchString.length-1);
        */
        var searchVal = encodeURI($('#catalog_query').val());
        var url = 'http://www.kbharkiv.dk/kbharkiv/php/starbas_search.php?catalog_query=' + searchVal;

        window.open(url, '_blank');
      }
      else{
        event.preventDefault();
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
