<?php 
require_once 'init.php';

require_once 'Header.php';

$success = true;

if (!empty($_POST['email']) && !empty($_POST['password'])) {  
  $user = findUserByEmail($_POST['email']);
  if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
      $success = true;
      $_SESSION['userId'] = $user['id'];
      header('Location: index.php');
      exit();
    } else {
      $success = false;
    }      
  } else {
    $success = false;
  }
}
?>
<div class="container">
    <div class="row">
        <!---CỘT TRÁI FORM-->
        <div class="col-7" style="margin-top: 2vw; font-family: SFProDisplay-Regular, Helvetica, Arial, sans-serif;">
            <div>
                <img src="./IMG/logo.png" style="width: 10vw; hight:10vw; float: left"/>
            </div>
            <div style="float: left; margin-left: 4vw; margin-top: 4vw"> <strong style="color: royalblue"> Đồ Án Web 1 <br> Đề Tài:</strong> Mạng Xã Hội</div>
        </div>
         <!---CỘT PHẢI FORM ĐĂNG NHẬP-->
         <div class="col-5" style="margin-top: 5vw;">
            
<h2 style="color: royalblue;">Đăng nhập</h2>
  <?php if (!$success) : ?>
  <div class="alert alert-danger" role="alert">
    Email hoặc mật khẩu không hợp lệ vui lòng đăng nhập lại!
  </div>
  <?php endif; ?>
<form method="POST">
  <div class="form-group">
  <label for="email"> <strong> Tên Đăng Nhập </strong></label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Điền email vào đây" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
  </div>
  <div class="form-group">
  <label for="password"><strong>Mật Khẩu</strong></label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Điền mật khẩu vào đây">
  </div>
  <div style="text-align: center">
  <button type="submit" class="btn btn-primary">Đăng nhập</button>
  </div>
  <HR align="center" WIDTH="50%"/>  
  </form>
  
  <div style="font-center: 0.8cm;text-align: center;">
  <a href="forgot-password.php">Forgot PassWord?</a> 
  <HR align="center" WIDTH="50%"/>   
</div>
  
  
  
         
           
       <!--Chuyển trang--->
             <form action="FormRegister.php" method="POST">
            <div style="text-align: center">
            <button type="submit" class="btn btn-primary">Tạo Tài Khoản Mới</button>
            </div>
            <HR align="center" WIDTH="50%"/> 
            </form>
  

<?php include 'footer.php' ?>