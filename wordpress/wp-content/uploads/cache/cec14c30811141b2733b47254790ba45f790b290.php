<button class="btn btn-primary chat-btn fixed" type="button" name="button" aria-label="Åbn chat">
  <?php echo $__env->make("partials.icon", ["icon" => "message-square"], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</button>

<div class="chat-holder"></div>

<aside class="chat-wrapper" aria-labelledby="chat">
  <form target="_blank" action="<?php echo e(get_the_permalink()); ?>" method="post" id="chat" aria-label="Chat">
    <?php if(get_field('chat_text', 'option')): ?>
      <p><?php echo e(get_field('chat_text', 'option')); ?></p>
    <?php endif; ?>
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

<?php if(isset($_POST['submit'])): ?>
  <?php
  $navn = $_POST['navn'];
  $spm = $_POST['spm'];
  $spm = preg_replace("/\r|\n/", "", $spm);
  header("Location:https://kbharkiv.kk.dk/api/start_session?issue_menu=1&codeName=stadsarkiv&c2cjs=1&customer.name='.$navn.'&customer.details='$spm'");
  ?>
<?php endif; ?>
