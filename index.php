
<?php 
require_once 'init.php';

if ($currentUser) {
   $newFeeds = getNewFeeds();

}
?>
<?php include 'Header.php' ?> 
<?php if ($currentUser) : ?>
<!-- <p>Chào mừng <?php echo $currentUser['fullname'] ?> đã trở lại.</p> -->
<form action="post.php" method = "POST" >
    <div class = "form-group">
   <label for="content"><h1>Tạo Bài Viết</h1></label>
   <textarea class="form-control"  name='content' id="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Đăng Bài</button>
    </form>
<?php foreach ($newFeeds as $post) :  ?>
  
<div class="card" style="margin-bottom: 10px;">
  <div class="card-body">
    <h4 class="card-title">
      <div class="row">
        <div class="col">
          <?php if ($post['userHasAvatar']) : ?>
          <img class="avatar" src="uploads/avatars/<?php echo $post['userId'] ?>.jpg">
          <?php else : ?>
          <img class="avatar" src="no-avatar.jpg">
         
          <?php endif; ?>
        </div>
        <div class="col-11">
          <?php echo $post['userFullname'] ?>
        </div>
      </div>
    </h4>
    <p class="card-text">
    <small>Đăng lúc: <?php echo $post['createdAt'] ?></small>
    <p><?php echo $post['content'] ?></p>
    </p>
  </div>
</div>
<?php endforeach; ?>
<?php else: ?>

<?php endif ?>
<?php include 'footer.php' ?>