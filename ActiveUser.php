<?php
    require_once 'Init.php';
?>
<?php if(isset($_GET['code'])): ?>
<?php
    $code = $_GET['code'];
    $success= false;

    $success = activateUser($code);
?>
<?php if($success): ?>
<?php header ('Location: FormLogin.php'); ?>
<?php else: ?>
    <div class="alert alert-danger" role="alert">
        Kích hoạt tài khoản thất bại!
    </div
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
                    <label for="code"> <strong> Mã Kích Hoạt </strong></label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="Nhập mã kích hoạt">
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