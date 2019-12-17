
<?php
require_once 'init.php';

if (isset($_POST['userId']) && isset($_POST['content'])) {
  sendMessage($currentUser['id'], $_POST['userId'], $_POST['content']);
  header('Location: conversation.php?id=' . $_POST['userId']);
}

$friendship = getFriends($currentUser['id']);
?>
<?php include 'InHeader.php' ?>
<div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 30vw;" >
                <div class="modal-body">
<form method="POST">
  <div class="form-group">
    <label for="userId">Chọn Người nhận</label>
    <select class="form-control" id="userId" name="userId">
      <?php foreach($friendship as $friend) : ?>
      <?php
        $user = findUserById($friend['id']);
      ?>
      <option value="<?php echo $user['id'] ?>"><?php echo $user['fullname'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="content">Tin nhắn:</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </div>
  <div style="text-align: center; padding-bottom: 2vw; margin-top: 2vw">
  <button  type="submit" class="btn btn-primary">Gửi tin nhắn</button>
  </div>
</form>
</div>
</div>
</div>
<?php include 'footer.php' ?>
