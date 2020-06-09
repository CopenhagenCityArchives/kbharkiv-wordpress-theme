export default {
  init() {
    $('.module-gallery .carousel').each(function() {
      $(this).on('slid.bs.carousel', function () {
        let activeImageDescriptionId = $(this).find('.carousel-item.active').attr('data-description');
        let $description = $(activeImageDescriptionId);

        $(this).closest('.row').find('.gallery-description-item.active').removeClass('active');
        $description.addClass('active');
      })
    })
  },
}
