import BeerSlider from 'beerslider/dist/BeerSlider.js';

export function moduleBeforeAndAfter() {
  $.fn.BeerSlider = function ( options ) {
    options = options || {};
    return this.each(function() {
      new BeerSlider(this, options);
    });
  };

  setTimeout(function () {
    $('.module-before-and-after .beer-slider').BeerSlider({start: 50});
  }, 200);
}
