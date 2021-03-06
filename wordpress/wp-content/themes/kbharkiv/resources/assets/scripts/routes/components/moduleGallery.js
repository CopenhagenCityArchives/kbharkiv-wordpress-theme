export function moduleGallery() {
  $('.module-gallery .carousel').each(function() {
    $(this).on('slid.bs.carousel', function () {
      let activeImageDescriptionId = $(this).find('.carousel-item.active').attr('data-description');
      let $description = $(activeImageDescriptionId);

      $(this).closest('.row').find('.gallery-description-item.active').removeClass('active');
      $description.addClass('active');
    })

    if('objectFit' in document.documentElement.style === false) {
      $(this).find('.carousel-item').each(function () {
        let $container = $(this);
        let imgUrl = $container.find('img').prop('src');
        if (imgUrl) {
          $container
            .css('backgroundImage', 'url(' + imgUrl + ')')
            .addClass('object-fit');
        }
      });
    }
  })
}
