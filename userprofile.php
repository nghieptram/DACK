<?php

require_once 'init.php';

if (!$currentUser) {
  header('Location: index.php');
  exit();
}
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
        <button class="button">
            Edit Profile
        </button>
                <li class="nav-item dropdown active">
                        <a  href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button class="iconSetting"><i class="fas fa-ellipsis-v"></i></button>
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cài đặt</a>

                            <a class="dropdown-item" href="change-password.php">Đổi Mật Khẩu</a>
                        
                            <a class="dropdown-item" href="update-profile.php">Cập Nhập Thông Tin</a>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Đăng Xuất</a>
                        </div>

                    </li> 
        <br>
    </div>
    <br>
</div>
</div>
</div>

<?php endif; ?>
<?php include 'Footer.php'; ?>

