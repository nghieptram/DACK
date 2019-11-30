<?php
require_once 'init.php';
if (!$currentUser) {
  header('Location: index.php');
  exit();
}
?>
<?php include 'Header.php'; ?>
<div class="container">
<h1>Quản lý thông tin cá nhân</h1>
</div>
<?php if (isset($_POST['fullname']) && isset($_POST['phone'])): ?>
		<?php 
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

  if(isset($_FILES['IMG'])) {
    $fileName = $_FILES['IMG']['name'];
    $fileSize = $_FILES['IMG']['size'];
    $fileTemp = $_FILES['IMG']['tmp_name'];
    $fileSave = './IMG/' . $currentUser['id'] . '.jpg';
    // userid.jpg
    $result = move_uploaded_file($fileTemp, $fileSave);
    if (!$result) {
      $success = false;
    } else {
      $newImage = resizeImage($fileSave, 250, 250);
      imagejpeg($newImage, $fileSave);
      $currentUser['hasAvatar'] = 1;
      updateUser($currentUser);
    }
  }
}

?>
<?php if (!$success) : ?>
  <?php header('Location: index.php') ?>
<?php else: ?>
<div class="alert alert-danger" role="alert">
  Vui lòng nhập đầy đủ thông tin!
</div>
<?php endif; ?>
<?php else: ?>
<div class="container">
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="fullname">Họ và tên</label>
    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Điền họ và tên vào đây" value="<?php echo $currentUser['fullname'] ?>">
  </div>
  <div class="form-group">
    <label for="phone">Số điện thoại</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Điền số điện thoại vào đây" value="<?php echo $currentUser['phone'] ?>">
  </div>
  <div class="form-group">
    <label for="IMG">Hình ảnh đại diện</label>
    <input type="file" class="form-control-file" id="IMG" name="IMG">
  </div>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
</div>
</div>
<?php endif; ?>
<?php include 'Footer.php'; ?>