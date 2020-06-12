export function chat() {
  $('.chat-btn').popover({
    container: $('.chat-holder'),
    placement: 'top',
    html: true,
    content: function () {
      // Get the content from the hidden sibling.
      return $('#chat').clone()
    },
  }).on('shown.bs.popover	', function () {
    $('.chat-btn').attr('aria-label', 'Luk chat');
    $('.chat-holder #chat-name').trigger('focus');
  }).on('hidden.bs.popover	', function () {
    $('.chat-btn').attr('aria-label', 'Åbn chat');
  });
}

export function checkChatScroll(scroll_pos) {
  let footer_pos = $('footer').offset().top;
  let chat_btn_stop = footer_pos - window.innerHeight;
  if(scroll_pos > chat_btn_stop) {
    // footer position top - (btn height + 3rem distance from btn to footer)
    $('.chat-btn').removeClass('fixed').css('top', footer_pos - 88);
  } else {
    $('.chat-btn').addClass('fixed').css('top', '');
  }
}
