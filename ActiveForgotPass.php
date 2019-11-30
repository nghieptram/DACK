<?php
    require_once 'init.php';
?>
<?php if(isset($_GET['code2'])): ?>
<?php
    $code = $_GET['code2'];
    
    $success= false;
    $success = activateForgotPass($password, $code);
?>
<?php if(!$success): ?>
<?php header ('Location: FormLogin.php'); ?>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        Kích hoạt tài khoản thất bại!
    </div>
<?php endif; ?>
<?php else: ?>

<?php include"Header.php" ?>
<body>
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
            <form method="GET">
                
                <div class="form-group">
                <div class="alert alert-danger" role="alert">
                    Kiểm tra email để xác thực mật khẩu
                </div>
                    <label for="code2"> <strong> Mã Xác Thực </strong></label>
                    <input type="text" class="form-control" name="code2" id="code2" placeholder="Nhập mã xác thực">
                </div>
                <div style="text-align: center">
                <button type="submit" class="btn btn-primary">Xác Nhận</button>
            </form>
            <HR align="center" WIDTH="60%"/>
            <!--Chuyển trang--->
            <div style="text-align: center">
            <a href="FormLogin.php"> <button type="submit" class="btn btn-primary">Quay về</button> </a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php include "Footer.php"?>