export default {
  init() {
    const sdk = $('.sdk-search')[0];
    const config = { attributes: false, childList: true, subtree: true };

    function callback(mutationsList, observer) {
      let bgDefault = $('.top-menu').data('color');
      $('.page-header').css('background-color', bgDefault);
      observer.disconnect();
    }

    const observer = new MutationObserver(callback);

    observer.observe(sdk, config);
  },
};
