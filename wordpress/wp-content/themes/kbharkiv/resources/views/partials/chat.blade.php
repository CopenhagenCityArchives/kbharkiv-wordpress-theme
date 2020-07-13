<button class="btn btn-primary chat-btn fixed" type="button" name="button" aria-label="Åbn chat">
  @include("partials.icon", ["icon" => "message-square"])
</button>

<div class="chat-holder"></div>

<aside class="chat-wrapper">
  <form target="_blank" action="{{get_the_permalink()}}" method="post" id="chat" aria-label="Chat">
    @if (get_field('chat_text', 'option'))
      <p>{{ get_field('chat_text', 'option') }}</p>
    @endif
    <div class="form-group">
      <label for="chat-name">Navn</label>
      <input class="form-control" type="text" name="navn" id="chat-name" placeholder="Indtast navn" maxlength="100">
    </div>
    <div class="form-group">
      <label for="chat-spm">Spørgsmål</label>
      <textarea class="form-control" name="spm" id="chat-spm" maxlength="1024" placeholder="Indtast spørgsmål"></textarea>
    </div>
    <button id="chatsubmit" type="submit" class="btn btn-primary" name="submit">Chat</button>
  </form>
</aside>

@if (isset($_POST['submit']))
  @php
  $navn = $_POST['navn'];
  $spm = $_POST['spm'];
  $spm = preg_replace("/\r|\n/", "", $spm);
  header("Location:https://kbharkiv.kk.dk/api/start_session?issue_menu=1&codeName=stadsarkiv&c2cjs=1&customer.name='.$navn.'&customer.details='$spm'");
  @endphp
@endif
