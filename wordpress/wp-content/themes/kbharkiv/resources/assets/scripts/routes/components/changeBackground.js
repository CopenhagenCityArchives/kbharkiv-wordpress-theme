import { darkenColor } from './darkenColor.js';

let bgDefault = $('.top-menu').data('color');
let bgScrolled = darkenColor(bgDefault, -0.08);

setTimeout(function () {
  $('.darken-on-scroll').css('background-color', bgDefault);
}, 150);

export function changeBackground(scroll_pos) {
  if(scroll_pos > 0) {
     $('body').addClass('scrolled');
     $('.darken-on-scroll').css('background-color', bgScrolled);

  } else {
    $('body').removeClass('scrolled');
    $('.darken-on-scroll').css('background-color', bgDefault);
  }
}
