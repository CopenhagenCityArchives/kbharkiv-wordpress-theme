<button class="btn btn-primary chat-btn" type="button" name="button">
  <span class="sr-only">Chat</span>
  @include("partials.icon", ["icon" => "message-square"])
</button>

<div class="chat-wrapper">
  <form target="_blank" action="{{get_the_permalink()}}" method="post" id="chat">
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
</div>
