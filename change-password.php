<?php

require_once 'init.php';
if(!$currentUser)
{
    header('Location:index.php');
    exit();
}

?>

<?php include 'header.php'; ?>
<div style="text-align: center">
<p><h1 href="#" class="text-light bg-dark">Đổi Mật Khẩu</h1></p>
</div>
<?php if(isset($_POST['currentpassword']) && isset($_POST['password'])): ?>
<?php 
$currentpassword = $_POST['currentpassword'];
$password = $_POST['password'];
$hashpassword = password_hash($password,PASSWORD_DEFAULT);
$success = false;

if(password_verify($currentpassword,$currentUser['password']) && ($password != $currentpassword))
{
    updateUserPassword($currentpassword['user-id'],$password);
 $stmt = $db->prepare("UPDATE users SET password = ? where id = ?");
 var_dump($stmt->execute(array($hashpassword, $currentUser['id'])));
$success = true;

}


?>
<?php if ($success): ?>
<?php header('Location: FormLogin.php'); ?>
<?php else : ?>
<div class ="alert alert-danger" role="alert">
 Thất Bại
</div>
<?php endif; ?>
<?php else : ?>
    
    <form action="change-password.php" method = "POST">
    <div style="z-index: 9999999; position: relative; background-color: rgba(192,192,192,0.4); margin: 3vw 25vw 0 25vw; padding: 2vw 2vw 0 2vw">
    <div class = "form-group">
    <div style="font-center: 0.8cm;text-align: center;">
   <h2> <label for="currentpassword"> Mật Khẩu Hiện Tại</label> </h2>
   </div>
    <input type="currentpassword" class = "form-control" id = "currentpassword" name = "currentpassword" placeholder = "Mật Khẩu Hiện Tại">
    </div>

    <div class = "form-group">
    <div style="font-center: 0.8cm;text-align: center;">
   <h2> <label for="password">Mật Khẩu Mới</label> </h2>
   </div>
    <input type="password" class = "form-control" id = "password" name = "password" placeholder = "Mật Khẩu Mới">
    </div>

    <div style="text-align: center">
    <p><button type = "submit" class = "btn btn-primary">Đổi Mật Khẩu</button> </p>
    </div>
    <HR align="center" WIDTH="50%"/> 
    </div>
    </form>
   
<?php endif; ?>
<?php include 'footer.php'; ?>