<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title> 1760076-1760119 &reg; Đồ Án LTW1</title>
    <LINK REL="SHORTCUT ICON"  HREF="./logo.ico">
    <style>
      .avatar {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }
      .avatar_news {
        vertical-align: middle;
        width: 30px;
        height: 30px;
        border-radius: 50%;
      }
    </style>
</head>
<?php if ($currentUser): ?>
<body>
    <div>
        <div  class="container"> 
            <!-- <img style=" float: left; heigh: 5vw; width: 5vw; margin-top: 1vw; margin-bottom: 1vw" src="./IMG/logo.png"/>
            <h5 style=" float: left; margin-left: 5vw; margin-top: 3vw; color: royalblue "> <strong> ĐỒ ÁN LẬP TRÌNH WEB 1 </strong> </h5> -->
        </div>
        <div style="clear: both;heigh: 5vw; width: 100vw">
            <nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
                <form class="form-inline my-2 my-lg-0" style="margin: 0 3vw 0 2vw;">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Tìm Kiếm" style="width: 40vw">
                    <a href="#"><img  style="width: 40px; heigh: 40px;"></a>
                    
                </form>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
            
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active" style="margin-right: 2vw">
                        <a class="nav-link" href="">Tạo</a>
                    </li>
                    </li>
                   
                    <li class="nav-item">
                        <a href="#"><img  style="width: 40px; heigh: 40px; margin-right: 1vw" src="./IMG/addfr.png"/></a>
                    </li>
                    <li class="nav-item">
                        <a href="#"><img  style="width: 40px; heigh: 40px; margin-right: 1vw; margin-top: 5px" src="./IMG/mess.png"/></a>
                    </li>
                    <li class="nav-item">
                        <a href="#"><img  style="width: 40px; heigh: 40px; margin-right: 1vw;" src="./IMG/thongbao.png"/></a>
                    </li>
                
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo file_exists('./IMG/' . $currentUser['id'] . '.jpg') ? ('./IMG/' . $currentUser['id'] . '.jpg') : ('./IMG/0.jpg') ?>" alt="Avatar" class="avatar"><b><?php echo " " . $currentUser['fullname'] ?></b>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Cài đặt</a>
                       
                        <a class="dropdown-item" href="change-password.php">Đổi Mật Khẩu</a>
                        <a class="dropdown-item" href="profile.php">Cập Nhập Thông Tin</a>
                       
                     
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"  href="logout.php">Đăng Xuất</a>
                        </div>
                 
                    </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
<?php endif; ?>

