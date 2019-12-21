<?php

require_once 'init.php';

if (!$currentUser) {
  header('Location: FormLogin.php');
  exit();
}
if ($currentUser) {
    // $newFeeds = getNewFeeds();
    $newFeeds = getNewFeedsForProfile($currentUser['id']);
   }
// $newFeeds = getNewFeeds();
?>
<?php include 'InHeader.php'; ?>
<?php if (isset($_POST['fullname']) && isset($_POST['phone'])): ?>
<?php 
$fullname = $currentUser['fullname'];
$phone = $currentUser['phone'];
$success = true;
?>
<?php if (!$success) : ?>
<?php header('Location: index.php') ?>

<?php else: ?>
<div class="alert alert-danger" role="alert">
    Vui lòng nhập đầy đủ thông tin!
</div>
<?php endif; ?>
<?php else: ?>
<div class="row" id="main">
    <img id="avatar"
        src="<?php echo file_exists('./IMG/' . $currentUser['id'] . '.jpg') ? ('./IMG/' . $currentUser['id'] . '.jpg') : ('./IMG/0.jpg') ?>">
    <div>
        <strong id="name"><?php echo $currentUser['fullname'] ?></strong>
        <a href="update-profile.php" ><button class="button">
            Chỉnh sửa trang cá nhân
        </button></a>
        <div class="nav-item dropdown active" style="float: right; display: block;">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <button class="iconSetting"><i class="fas fa-ellipsis-v"></i></button>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="float: left">
                <a class="dropdown-item" href="#">Cài đặt</a>

                <a class="dropdown-item" href="change-password.php">Đổi Mật Khẩu</a>
                <a class="dropdown-item" href="friend.php">Danh Sách Bạn Bè</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Đăng Xuất</a>
            </div>

        </div>
        <form action="" style="padding-top:3vw">
            <label style="margin-left: 3vw" for="baiviet"> Bài Viết</label>
            <a href="friend.php"> <label style="margin-left: 3vw" for="nguoitheodoi"> Người Theo Dõi</label></a>
            <a href="friend.php"> <label style="margin-left: 3vw" for="dangtheodoi"> Đang Theo Dõi</label></a>
        </form>

        <br>
    </div>
    <br>
</div>
<?php foreach ($newFeeds as $post) :  ?>
    <div class="card" style="margin: 2vw;">
        <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col">
                        <?php if ($post['userHasAvatar']) : ?>
                        <img class="avatar" src="./IMG/<?php echo $post['userId'] ?>.jpg">
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
                <p><?php echo $post['content'] ?></p>
                <small>Đăng lúc: <?php echo $post['createdAt'] ?></small>
            </p>
            <div class="row">
                <a class="nav-link">
                    <i class="far fa-heart" style="color:black" name="sub_min_points[]"></i>
                </a>
                <a class="nav-link" href="">
                    <i class="far fa-comment" style="color:black"></i>
                </a>
                <a class="nav-link" href="">
                    <i class="far fa-paper-plane" style="color:black"></i>
                </a>
            </div>
            <div id="dynamic_field">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="comment" placeholder="Add a comment...">
                <div method="post">
                    <button type="button" name="add" id="add" class="btn btn-success">POST</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>

<?php endif; ?>
<?php include 'Footer.php'; ?>