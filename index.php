
<?php 
require_once 'init.php';

if ($currentUser) {
   $newFeeds = getNewFeeds();

}
?>
<?php include 'InHeader.php' ?> 
<?php if ($currentUser) : ?>
<!-- <p>Chào mừng <?php echo $currentUser['fullname'] ?> đã trở lại.</p> -->

<div class="row" style="margin: 2vw 0 2vw 0">
<div class="col-3"></div>
<div class="col-6">
<form action="post.php" method = "POST" >
        <div class = "form-group">
    <label for="content"><h1>Tạo Bài Viết</h1></label>
    <textarea class="form-control" name='content' id="content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Đăng Bài</button>
        </form>
</div>
<div class="col-3"></div>
</div>
<?php foreach ($newFeeds as $post) :  ?>
    <div class="card" style="margin: 2vw;">
    <div class="card-body">
        <h5 class="card-title">x
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
        </h5>
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