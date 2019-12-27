<?php
require_once 'init.php';

if (!$currentUser) {
  header('Location: index.php');
  exit();
}

$fullname = $currentUser['fullname'];
$phone = $currentUser['phone'];
$success = true;

// Kiểm tra người dùng có nhập tên
if (isset($_POST['fullname'])) {
  if (strlen($_POST['fullname']) > 0) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $currentUser['fullname'] = $fullname;
    $currentUser['phone'] = $phone;
    updateUser($currentUser);
  } else {
    $success = false;
  }

  if(isset($_FILES['avatar'])) {
    $fileName = $_FILES['avatar']['name'];
    $fileSize = $_FILES['avatar']['size'];
    $fileTemp = $_FILES['avatar']['tmp_name'];
    $fileSave = './IMG/' . $currentUser['id'] . '.jpg';
    // userId.jpg
    $result = move_uploaded_file($fileTemp, $fileSave);
    if (!$result) {
      $success = false;
    } else {
      $newImage = resizeImage($fileSave, 250, 250);
      imagejpeg($newImage, $fileSave);
      $currentUser['hasAvatar'] = 1;
      updateUser($currentUser);
    }
    header('Location: index.php');
  }
}

?>
<?php include "InHeader.php"?>
<div class="row">
<div class="col-5" style=" margin-top: 3vw; margin-left: 2vw">

<h4 style="margin-bottom: 2vw; ">Thông tin hiện tại</h4>
<div class="row">
<div class="col-4">
<img id="avatar" 
        src="<?php echo file_exists('./IMG/' . $currentUser['id'] . '.jpg') ? ('./IMG/' . $currentUser['id'] . '.jpg') : ('./IMG/0.jpg') ?>">
 </div>   
 <div class="col-8">
    <div style="margin-top: 3vw;">
        <p>Họ và tên: <strong id="name"><?php echo $currentUser['fullname'] ?></strong></p>
        <p>Email: <strong id="name"><?php echo $currentUser['email'] ?></strong></p>
        <p>Số điện thoại: <strong id="name"><?php echo $currentUser['phone'] ?></strong></p>
    </div>
    </div>
    </div>
</div>

<div class= "col-5">
  <?php include "Header.php"?>
  <div style=" background-color: rgba(192,192,192,0.4); margin-top: 3vw; padding: 2vw; border-radius: 2vw 2vw 2vw 2vw">s
  <a href="userprofile.php"> <div> <img style="float: right; width: 2vw; heigh:2vw; " src="./IMG/dongtab.png" /> </a> </div>
  <h1>Cập Nhật Cá Nhân</h1>
  <?php if (!$success) : ?>

  <div class="alert alert-danger" role="alert">
    Vui lòng nhập đầy đủ thông tin!
  </div>
  <?php endif; ?>
  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="fullname">Họ và tên</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Điền họ và tên vào đây">
    </div>
    <div class="form-group">
      <label for="phone">Số điện thoại</label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Điền số điện thoại vào đây">
    </div>
    <div class="form-group">
    
      <label for="avatar">Hình ảnh đại diện</label>
      <input type="file" class="form-control-file"  name="avatar">
    </div>
    <div style="text-align: center">
    <button type="submit" class="btn btn-primary" style="margin-bottom: 2vw">Cập nhật</button>
    </div>
  </form>
  </div>
<div class="col-1"></div>
</div>