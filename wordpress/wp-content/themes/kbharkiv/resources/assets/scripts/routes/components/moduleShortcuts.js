$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();
  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();
  return elementBottom > viewportTop && elementTop < viewportBottom;
};

export function moduleShortcuts() {
  $('.parallax').each(function() {
    var $this = $(this);

    if ($this.isInViewport()) {
      var navHeight = $('.top-menu').outerHeight();
      var elHeight = $(this).height();
      var viewportHeight = $(window).height();

      //offsetDistance = $(window).scrollTop() == 0 ? viewportHeight - $(this)[0].getBoundingClientRect().top : offsetDistance;

      var elDistance = viewportHeight + elHeight - navHeight;
      var elToTop = $(this)[0].getBoundingClientRect().top - navHeight + elHeight;
      var elTranslateY = elToTop/elDistance*100-100;

      $this.css({
        '-webkit-transform' : 'translateY(' + elTranslateY + '%)',
        '-ms-transform' : 'translateY(' + elTranslateY + '%)',
        'transform' : 'translateY(' + elTranslateY + '%)',
      });
    }
  })

}
