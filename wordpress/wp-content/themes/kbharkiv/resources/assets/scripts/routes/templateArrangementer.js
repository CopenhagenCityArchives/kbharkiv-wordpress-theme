export default {
  init() {
    setTimeout(function () {
      var headlineTop = $('.page-header h1').offset().top;
      var eventInfoTop = $('.event-info').offset().top;
      var negativeMargin = eventInfoTop - headlineTop;
      $('.event-info').css('margin-top', -negativeMargin + 'px');
    }, 150);
  },
};
