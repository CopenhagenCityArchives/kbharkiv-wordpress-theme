export default {
  init() {
    setTimeout(function () {
      let headlineTop = $('.page-header h1').offset().top;
      let eventInfoTop = $('.event-info').offset().top;
      let negativeMargin = eventInfoTop - headlineTop;
      console.log(eventInfoTop - headlineTop);
      $('.event-info').css('margin-top', -negativeMargin + 'px');
    }, 200);
  },
};
