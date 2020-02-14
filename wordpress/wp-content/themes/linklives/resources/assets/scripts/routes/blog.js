export default {
  init() {
    function initTags() {
      let tagsFilterOpen;

      function openTagsFilter() {
        tagsFilterOpen = true;
        $('#tags-filter-open').attr( 'aria-expanded', true );
        $('.tags-filter').addClass('active')
          .find('#tags-filter-close, #tags a').attr( 'tabindex', '0' );
      }

      function closeTagsFilter() {
        tagsFilterOpen = false;
        $('#tags-filter-open').attr( 'aria-expanded', false );
        $('.tags-filter').removeClass('active')
          .find('#tags-filter-close, #tags a').attr( 'tabindex', '-1' );
      }

      $('#tags-filter-open').click(function() {
        openTagsFilter();
      });

      $('#tags-filter-close').click(function() {
        closeTagsFilter();
      });

      // Close tags filter if focus shifts away
      $('.tags-filter a').last().blur(function() {
        closeTagsFilter();
      });

      $(window).keyup(function(e) {
        if (e.key === 'Escape' && tagsFilterOpen) {
          closeTagsFilter();
        }
      });
    }

    initTags();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
