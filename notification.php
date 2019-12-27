<?php
require_once 'init.php';

$conversations = getLatestConversations($currentUser['id']);
if (!$currentUser) {
  header('Location: FormLogin.php');
  exit();
}
// lấy id userid2
$userId1 = $currentUser['id'];
$getAllNotify =  getAllNotify($currentUser['id']);
// lấy id userid2
?>

<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width: 40vw;">
<div class="modal-body">
<!-- <?php foreach ($getAllNotify as $notify) : ?>
    <div class="card ms-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="./IMG/<?php echo $notify['fromUserID'] ?>.jpg" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
          <a href="profile.php?id=<?php echo $notify['fromUserID'] ?>"> <h5 class="card-title"><?php echo $notify['fullname'] ?></h5> </a>
            <p class="card-text">Đã gửi yêu cầu kết bạn với bạn.</p>
            <p class="card-text"><small class="text-muted"><?php echo $notify['createdAt'] ?></small></p>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?> -->

<?php foreach ($getAllNotify as $notify) : ?>
  <div class="card ms-3" style="max-width: 540px;">
    <div class="row no-gutters">

      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text">Bạn đã gửi yêu cầu kết bạn với <a href="profile.php?id=<?php echo $notify['forUserID'] ?>"> <?php echo $notify['fullname'] ?> </a> </p>
          <p class="card-text"><small class="text-muted"><?php echo $notify['createdAt'] ?></small></p>
        </div>
      </div>
      <div class="col-md-4">
        <img src="./IMG/<?php echo $notify['forUserID'] ?>.jpg" class="card-img" alt="...">
      </div>
    </div>
  </div>
<?php endforeach; ?>


<div style="margin-top: 1vw">
<!-- <?php foreach ($conversations as $conversation) : ?>
<div class="card" style="margin-bottom: 10px;">
<div class="card-body">
  <h4 class="card-title">
    <!-- <div class="row">
      <div class="col-5"> -->
      <a href="conversation.php?id=<?php echo $conversation['id'] ?>" style="font-size: 20px; float: left;"><?php echo $conversation['fullname'] ?></a>
      <!-- </div>
      <div class="col-7"> -->
        <p style="font-size: 20px; margin-left:1vw; float: left"> đã gửi tin nhắn cho bạn </p>
      <!-- </div>
    </div> -->
  </h4>


  <!-- <a href="conversation.php?id=<?php echo $conversation['id'] ?>" style="text-decoration: none; color: black">
  
  <br><form style="background-color: rgba(192,192,192,0.4); padding: 1vw; margin-top: 1vw">
  <?php echo $conversation['lastMessage']['content'] ?>
  </form>
  </a> -->
</div>
</div>
<?php endforeach; ?>
</div>
  <?php foreach ($getAllNotify as $notify) : ?>
    <div class="card ms-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="./IMG/<?php echo $notify['fromUserID'] ?>.jpg" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
          <a href="profile.php?id=<?php echo $notify['fromUserID'] ?>"> <h5 class="card-title"><?php echo $notify['fullname'] ?></h5> </a>
            <p class="card-text">Đã gửi yêu cầu kết bạn với bạn.</p>
            <p class="card-text"><small class="text-muted"><?php echo $notify['createdAt'] ?></small></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?> -->



<!-- <div style="margin-top: 1vw">
  <?php foreach ($conversations as $conversation) : ?>
<div class="card" style="margin-bottom: 10px;">
  <div class="card-body">
    <h4 class="card-title">
      <!-- <div class="row">
        <div class="col-5"> -->
        <a href="conversation.php?id=<?php echo $conversation['id'] ?>" style="font-size: 20px; float: left;"><?php echo $conversation['fullname'] ?></a>
        <!-- </div>
        <div class="col-7"> -->
          <p style="font-size: 20px; margin-left:1vw; float: left"> đã gửi tin nhắn cho bạn </p>
        <!-- </div>
      </div> -->
    </h4>
  
  
    <a href="conversation.php?id=<?php echo $conversation['id'] ?>" style="text-decoration: none; color: black">
    
    <br><form style="background-color: rgba(192,192,192,0.4); padding: 1vw; margin-top: 1vw">
    <?php echo $conversation['lastMessage']['content'] ?>
    </form>
    </a>
  </div>
</div>
<?php endforeach; ?> -->
</div>
</div>
</div>
</div>
</div>