<?php 
  require_once 'Init.php';

  $success = true;
  if(isset($_POST['submit']))
  {
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword'])) 
  {
    $email = strtolower($_POST['email']);
    $pass1= strtolower($_POST['password']);
    $pass2= strtolower($_POST['repassword']);
    $passOK= $pass1 == $pass2;
    $password = password_hash($_POST['repassword'], PASSWORD_DEFAULT);
    
    //$stmt = $db->prepare("UPDATE users SET password = ?  WHERE id = ?");
    //$stmt->execute(array ($password, $user['id']));
    // Kiểm tra xem email có trùng không
    $user = findUserByEmail($email);
    if($passOK)
    {
        $passOK = true;
        if ($user) {
            $success = true;
            $insertId = createForgotPass($email, $password);
            $_SESSION['userId'] = $insertId;
            header('Location: ActiveForgotPass.php');
            exit();
        } else {
            $success = false;
            
        }
    }
    else{
        $passOK =false;
    }
 }
}
?>

<?php if (!$success) : ?>
      <div class="alert alert-danger" role="alert">
        Email chưa được đăng ký
      </div>
      <?php endif; ?>

<?php include"Header.php"?>
<form action="forgot-password.php" method="POST">
<body>
    <div class="container">
        <div style="position:absolute; display: block">
            <div class="container" style="width: 100vw; opacity: 0.2; ">
                <!---Load FormLogin -->
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
                        <div>
                            <h2 style="color: royalblue;">ĐĂNG NHẬP</h2>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <strong> Tên Đăng Nhập </strong></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên đăng nhập hoặc địa chỉ email" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><strong>Mật Khẩu</strong></label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mật khẩu" disabled>
                            </div>
                            <div style="text-align: center">
                            <button type="text" name="text" class="btn btn-primary" disabled>Đăng Nhập</button>
                            </div>
                        </div>
                        <p style="text-align: center" disabled><br>Quên Tài Khoản?</p>
                        <HR align="center" WIDTH="60%"/>
                        <!--Chuyển trang--->
                        <div style="text-align: center">
                        <button type="text" name="text"  class="btn btn-primary" disabled>Tạo Tài Khoản Mới</button>
                        </div>
                    </div>
                <footer style="margin: 5vw 0 2vw 0;">
                    <HR align="center" WIDTH="100%"/>
                <div class="blockquote-footer"> &copy; <strong>MSSV</strong> 1760076 & 1760119
                </footer>
                </div>
            </div>
        <!---Load FormLogin -->
    </div>
    <div style="z-index: 9999999; position: relative; background-color: rgba(192,192,192,0.4); margin: 3vw 25vw 0 25vw; padding: 2vw 2vw 0 2vw">
        <form>
            <a href="FormLogin.php"> <div> <img style="float: right; width: 2vw; heigh:2vw; " src="./IMG/dongtab.png" /> </a> </div>
            <h4 style="margin-left:2vw; color: royalblue;">Quên Tài Khoản</h4>
            <HR align="center" WIDTH="80%"/>
            <div class="form-group">
                <label for="email"> Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu mới</label>
                <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
            </div>
            <div class="form-group">
                <label for="password">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="repassword" placeholder="Mật Khẩu">
            </div>
            <div style="text-align: center; padding-bottom: 2vw; margin-top: 2vw">
        <button type="submit" name ="submit" class="btn btn-primary">Hoàn Thành</button>
        </form>
        
            <!-- <form action="FormLogin.php" method="POST" > 
                <div style="text-align: center; padding-bottom: 2vw">
                <button type="submit" class="btn btn-primary">Tạo Tài Khoản Mới</button>
                </div>
            </form> -->
    </div>
</body>
</form>
</html>
