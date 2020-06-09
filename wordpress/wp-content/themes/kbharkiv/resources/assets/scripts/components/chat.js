export default {
  init() {
    $('.chat-btn').popover({
      container: $('.chat-holder'),
      placement: 'top',
      html: true,
      content: function () {
        // Get the content from the hidden sibling.
        return $('#chat').clone()
      },
    }).on('shown.bs.popover	', function () {
      $('.chat-holder #chat-name').trigger('focus');
    });
  },
}
