export default {
  init() {
    function initMenu() {
      let viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
      let hamburgerMenu = viewportWidth < 922;
      let hamburgerOpen;
      let subMenuOpen;

      $('header .level-1 > a, header .menu-secondary a').attr( 'tabindex', hamburgerMenu ? '-1' : '0' );

      function openSubMenu($menuItem, $wrapper, openBackdrop) {
        subMenuOpen = true;
        $wrapper.css('height', $menuItem.find('.container-fluid').innerHeight())
        $menuItem.addClass('active')
          .find('>a').attr( 'aria-expanded', true )
        $wrapper.css('height', $menuItem.find('.container-fluid').innerHeight())
          .find('a').attr( 'tabindex', '0' )

        if(openBackdrop) {
          $('body').addClass('backdrop')
        }
      }

      function closeSubMenu(closeBackdrop) {
        subMenuOpen = false;
        $('.sub-menu-wrapper').css('height', 0)
          .find('a').attr( 'tabindex', '-1' )
        $('.menu-item-has-children').removeClass('active')
          .find('>a').attr( 'aria-expanded', false )

        if(!closeBackdrop) {
          $('body').removeClass('backdrop')
        }
      }

      function openHamburgerMenu() {
        hamburgerOpen = true;
        $('.nav-toggle').attr( 'aria-expanded', 'true')
        $('header').addClass('active')
        $('header .level-1 > a, header .menu-secondary a').attr( 'tabindex', '0' );
      }

      function closeHamburgerMenu() {
        hamburgerOpen = false;
        $('.nav-toggle').attr( 'aria-expanded', 'false')
        $('header').removeClass('active')
        $('header .level-1 > a, header .menu-secondary a').attr( 'tabindex', '-1' );
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
      $('header .menu-item-has-children >a').click(function(e) {
        e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        let $menuItem = $(this).parent()
        let $wrapper = $menuItem.find('.sub-menu-wrapper')

        if($menuItem.hasClass('active')) {
          // Close clicked sub-menu
          closeSubMenu()
        } else if($('.menu-item-has-children').hasClass('active')) {
          // Close open sub-menu and open clicked sub-menu
          closeSubMenu(true)
          openSubMenu($menuItem, $wrapper);
        } else {
          // Open clicked sub-menu
          openSubMenu($menuItem, $wrapper, true);
        }
      });

      // Close sub-menu if focus shifts away
      $('.sub-menu-wrapper').each(function(){
        $(this).find('a').last().blur(function() {
          closeSubMenu();
        });
      })

      // Close hamburger-menu if hamburgerMenu is true and focus shifts away
      $('header a').last().blur(function() {
        hamburgerMenu && closeHamburgerMenu();
      });

      // Close sub-menu when clicking on element outside menu
      $(window).click(function(e){
        if($(e.target).closest('.menu-top').length)
          return;
          closeSubMenu();
      });

      // Close sub-menu when hitting the esc keyboard btn
      $(window).keyup(function(e) {
        if (e.key === 'Escape' && subMenuOpen) {
          closeSubMenu();
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
        $('header .level-1 > a, header .menu-secondary a').attr( 'tabindex', hamburgerMenu ? '-1' : '0' );
      }

      $( window ).resize(function() {
        viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        setMenuLayout();
      });
    }

    initMenu();

    // Modules
    function initGroupedLinks() {
      $('.module-groupedlinks').each(function() {
        let $module = $(this)
        let groupCount = $module.find('.group-link').length
        let maxHeight = 0;

        $module.find('.groups-wrap .container-fluid, .link-wrap .container-fluid').each(function() {
          maxHeight = $(this).innerHeight() > maxHeight ? $(this).innerHeight() : maxHeight;
        });

        $('.groups-wrap, .links-wrap, .link-wrap').css('height', maxHeight);

        $module.find('.group-link').click(function() {
          $module.find('.group-link').removeClass('active')
          $(this).addClass('active')

          let $translate = -100/groupCount*($(this).data('group')-1);
          let $translateY = 'translateY(' + $translate + '%)';

          $module.find('.links-animate').css({
            transform: $translateY,
            MozTransform: $translateY,
            WebkitTransform: $translateY,
            msTransform: $translateY,
         });
        })
      })
    }
    setTimeout(function () {
      initGroupedLinks();
    }, 200);

    $( window ).resize(function() {
      initGroupedLinks();
    });

    $('.module-hero').each(function() {
      let $keyvisual = $(this).find('.keyvisual')
      let timelines = Math.floor((Math.random() * 7) + 5);

      for (let i = 0; i < timelines; i++) {
        let width = Math.floor((Math.random() * 100) + 20);
        let events = Math.floor((Math.random() * 4) + 2);
        let positionX = Math.floor((Math.random() * 140) -20);
        let positionY = 80/timelines * (i+1);

        var timeline = '<div class="timeline" style="width:' + width + '%; top:' + positionY + '%; left: ' + positionX + '%;">'

        for (let i = 0; i < events; i++) {
          let diameter = Math.floor((Math.random() * 40 ) + 8);
          let opacity = (Math.random() * .8).toFixed(2);
          let positionX = Math.floor((Math.random() * 100 ));
          //console.log(diameter + ' ' + opacity + ' ' + positionX)
          timeline += '<div class="event" style="width: ' + diameter + 'px; height:' + diameter + 'px; background-color: rgba(255,255,255,' + opacity + '); left:' + positionX + '%"></div>'
        }

        timeline += '</div>'

        $keyvisual.prepend(timeline)
      }

    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('[data-toggle="tooltip"]').tooltip()
  },
};
