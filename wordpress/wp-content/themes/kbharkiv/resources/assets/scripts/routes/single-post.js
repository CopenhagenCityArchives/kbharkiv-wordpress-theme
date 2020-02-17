export default {
  init() {
    let last_known_scroll_position = 0;
    let ticking = false;

    function animateImg(scroll_pos) {
      let $thumbnail = $('.thumbnail');
      let thumbnailOffset = $thumbnail.offset().top + $thumbnail.outerHeight(true);
      let scale = 1 + (scroll_pos / thumbnailOffset * 0.2);

      if(scroll_pos / thumbnailOffset < 1) { // in viewport
        $thumbnail.css('transform', 'scale(' + scale.toFixed(4) + ')');
      }
    }

    if($('.thumbnail').length) {

      window.addEventListener('scroll', function() {
        last_known_scroll_position = window.scrollY;

        if (!ticking) {
          window.requestAnimationFrame(function() {
            animateImg(last_known_scroll_position);
            ticking = false;
          });

          ticking = true;
        }
      });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
