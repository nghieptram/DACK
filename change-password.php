<?php
require_once 'init.php';

if (!$currentUser) {
  header('Location: FormLogin.php');
  exit();
}

$success = true;

if (isset($_POST['oldPassword'])) {
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];
  $newPassword2 = $_POST['newPassword2'];
  
  $oldPasswordOk = password_verify($oldPassword, $currentUser['password']);
  $newPasswordOk = $newPassword == $newPassword2 && strlen($newPassword) >= 6;
if($oldPasswordOk && $newPasswordOk)
{
  $success = true;
}
  if ($success  && !empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['newPassword2'])) {
    updateUserPassword($currentUser['id'], password_hash($newPassword, PASSWORD_DEFAULT));
     header('Location: FormLogin.php');
  }
}

?>
<?php include "InHeader.php"?>
<div style="background-color: rgba(192,192,192,0.4); margin: 3vw 25vw 0 25vw; padding: 2vw 2vw 0 2vw">
<a href="userprofile.php"> <div> <img style="float: right; width: 2vw; heigh:2vw; " src="./IMG/dongtab.png" /> </a> </div>
<h1>Đổi mật khẩu</h1>
<?php if (!$success) : ?>
 <?   header('Location: change-password.php');?>
<div class="alert alert-danger" role="alert">
  <ul>
    <?php if (!$oldPasswordOk) : ?>
    <li>Mật khẩu cũ không chính xác!</li>
    <?php endif; ?>
    <?php if (!$newPasswordOk) : ?>
    <li>Mật khẩu mới cần giống nhau và ít nhất 6 ký tự!</li>
    <?php endif; ?>
  </ul>
</div>
<?php endif; ?>
<form action="change-password.php" method="POST">
  <div class="form-group">
    <label for="password">Mật khẩu cũ</label>
    <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Điền mật khẩu cũ vào đây">
  </div>
  <div class="form-group">
    <label for="password">Mật khẩu mới</label>
    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Điền mật khẩu mới vào đây">
  </div>
  <div class="form-group">
    <label for="password">Mật khẩu mới (nhập lại)</label>
    <input type="password" class="form-control" id="newPassword2" name="newPassword2" placeholder="Điền mật khẩu mới vào đây lần nữa">
  </div>
  <div style="text-align: center">
  <button type="submit" class="btn btn-primary" style="margin-bottom: 2vw">Đổi mật khẩu</button>
  </div>
</form>
</div>






