
<?php
require_once 'init.php';

if (isset($_POST['content'])) {
  sendMessage($currentUser['id'], $_GET['id'], $_POST['content']); 
}

$messages = getMessagesWithuserId($currentUser['id'], $_GET['id']);
$user = findUserById($_GET['id']);

?>
<?php include 'InHeader.php' ?>
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 40vw;">
<div class="modal-body">
<div style="text-align: center;">
<h1> <?php echo $user['fullname'] ?></h1>
</div>
<?php foreach ($messages as $message) : ?>
<div class="card" style="margin-bottom: 8px; left">
  <div class="card-body">
    <?php if ($message['type'] == 1) : ?>
    <p class="card-text">
      <strong><?php echo $user['fullname'] ?></strong>:
      <?php echo $message['content'] ?>
    </p>
    <?php else: ?>
    <p class="card-text text-right">
      <?php echo $message['content'] ?>
    </p>
    <?php endif; ?>
  </div>
</div>
<?php endforeach; ?>
<form method="POST">
  <div class="form-group">
    <label for="content">Tin nhắn:</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>
  <div style="text-align: center; padding-bottom: 2vw; margin-top: 2vw">
  <button type="submit" class="btn btn-primary">Gửi tin nhắn</button>
  </div>
</form>

</div>
</div>
</div>
<?php include 'footer.php' ?>