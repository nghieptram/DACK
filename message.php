
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 40vw;">
                <div class="modal-body">
<?php
require_once 'init.php';
$conversations = getLatestConversations($currentUser['id']);
if(isset($_POST['deleteall']))
{
  deleteMessageWithId($currentUser['id']);
}
?>
  <div style="text-align: center; padding-bottom: 2vw;">    
<h1>Danh sách tin nhắn</h1>
</div>
<div style="text-align: center;">   
<a href="new-message.php" class="btn btn-primary btn-lg active" role="button"  aria-pressed="true">Thêm cuộc trò chuyện</a>
</div>
<?php foreach ($conversations as $conversation) : ?>
<div class="card" style="margin-bottom: 10px;">
  <div class="card-body">
    <h4 class="card-title">
      <div class="row">
        <div class="col">
          <?php if ($conversation['hasAvatar']) : ?>
          <img class="avatar" src="./IMG/<?php echo $conversation['id'] ?>.jpg">
          <?php else : ?>
          <img class="avatar" src="no-avatar.jpg">
          <?php endif; ?>
        </div>
        <div class="col-11">
          <a href="conversation.php?id=<?php echo $conversation['id'] ?>"><?php echo $conversation['fullname'] ?></a>
        </div>
      </div>
    </h4>
  
  
    <a href="conversation.php?id=<?php echo $conversation['id'] ?>" style="text-decoration: none; color: black">
    <form style="background-color: rgba(192,192,192,0.4); padding: 2vw">
    <?php echo $conversation['lastMessage']['content'] ?>
    </form>
    </a>
    <p class="card-text">
    <small>Tin nhắn cuối: <?php echo $conversation['lastMessage']['createdAt'] ?></small>
    </p>
  </div>
</div>
<?php endforeach; ?>
<div>
<form method="POST">
  <button type="submit" class="btn btn-danger" name="deleteall" style="margin-top: 2vw">Xóa tất cả tin nhắn</button>
</form>
</div>
</div>
</div>
</div>
</div>
