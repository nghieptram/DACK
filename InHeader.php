<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/fde54e994b.js" crossorigin="anonymous"></script>

    <title>1760058-1760076-1760119 &reg; TEAM 3Z</title>
    <LINK REL="SHORTCUT ICON" HREF="./logo.ico">
    <style>
    .far {
        font-size: 28px;
        cursor: pointer;
        user-select: none;
        color: black;
    }

    .info {
        color: dodgerblue;
    }

    .info:hover {
        background: #2196F3;
        color: white;
    }

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

    #main {
        width: auto;
        margin-left: 23%;
        margin-top: 40px;
        display: flex;
    }

    #avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        float: left;
        border: 1px solid #C3C3C3;
        object-fit: cover;
    }

    #name {
        margin-left: 30px;
        font-size: 18;
        color: #2F2F2F;
    }

    .button {
        background-color: white;
        border-color: #AEAEAE;
        border-radius: 5px;
        color: black;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin-left: 20px;
        cursor: pointer;
    }

    .btnSetting {
        background-color: white;
        color: black;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        cursor: pointer;
    }

    .iconTop {
        font-size: 28px;
        background-color: white;
        border: none;
        cursor: pointer;
        color: #212121;
    }

    .iconSetting {
        font-size: 22px;
        background-color: none;
        border: none;
        cursor: pointer;
        color: #212121;
        margin-left: 10px;
    }

    .textBottom {
        font-size: 18px;
    }

    .line {
        margin-left: 15px;
        margin-right: 15px;
        height: 38px;
        width: 1px;
        background-color: black;
    }

    .notification {
        background-color: white;
        text-decoration: none;
        position: relative;
        display: inline-block;
    }

    .notification:hover {
        background: white;
    }

    .notification .badge {
        position: absolute;
        font-size: 10px;
        top: 0px;
        right: -3px;
        padding: 5px 5px;
        border-radius: 50%;
        background-color: red;
        color: white;
    }
    </style>
</head>
<?php if ($currentUser): ?>
<?php 
 if(isset($_POST['submit']))
 {
    if(!empty($_POST['country'])) 
    header('Location: Search.php');
 }
 if(!isset($_COOKIE["coutNotify"])) 
 setcookie("coutNotify", 0);
 $getAllNotify =  getAllNotify($currentUser['id']);
$countNotifyCation=0;
 foreach ($getAllNotify as $notify)
    $countNotifyCation++;
    $s = $_COOKIE["coutNotify"];
?>

<body>
    <div>
        <div class="container">
            <!-- <img style=" float: left; heigh: 5vw; width: 5vw; margin-top: 1vw; margin-bottom: 1vw" src="./IMG/logo.png"/>
            <h5 style=" float: left; margin-left: 5vw; margin-top: 3vw; color: royalblue "> <strong> ĐỒ ÁN LẬP TRÌNH WEB 1 </strong> </h5> -->
        </div>


        <nav class="navbar navbar-inverse border-bottom #979797">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img
                            src="https://www.instagram.com/static/images/web/mobile_nav_type_logo.png/735145cfe0a4.png" />

                    </a>
                </div>
                <form action="Search.php" method="POST">
                    <ul class="nav navbar-nav">

                        <head>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
                            </script>
                        </head>
                        <div class="container">
                            <input type="text" class="form-control input-lg" data-toggle="modal"
                                data-target="#exampleModal" placeholder="Tìm Kiếm" />
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="width: 40vw;">
                                        <div class="modal-body">
                                            <input style="width: 20vw; float: left; margin-right: 2vw" type="text"
                                                name="country" id="country" class="form-control input-lg"
                                                autocomplete="off" placeholder="Tìm Kiếm" />

                                        </div>
                                        <button type="submit" name="submit" class="btn btn-outline-success "
                                            style="float: left;">Tìm Kiếm</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </ul>
                </form>
                <ul class="nav navbar-expand-lg">
                    <li class="nav-item">
                        <div class="nav-link">
                            <button data-toggle="modal" data-target="#message" class="iconTop"><i
                                    class="far fa-compass"></i></button>
                            <?php include "message.php"?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link" >
                            <div class="notification">
                                <button data-toggle="modal" data-target="#notification" class="iconTop"><i
                                        class="far fa-heart"></i></button>
                                <?php 
                                include "notification.php"
                                ?>
                                <?php 
                                if($countNotifyCation > $_COOKIE["coutNotify"]) : ?>
                                    <span class="badge"><?php echo $countNotifyCation;?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userprofile.php">
                            <button class="iconTop"><i class="far fa-user"></i></button>
                        </a>
                    </li>
                    <!-- <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button class="iconTop"><i class="far fa-user"></i></button>
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cài đặt</a>

                            <a class="dropdown-item" href="change-password.php">Đổi Mật Khẩu</a>
                            <a class="dropdown-item" href="userprofile.php">Trang cá nhân</a>
                            <a class="dropdown-item" href="update-profile.php">Cập Nhập Thông Tin</a>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Đăng Xuất</a>
                        </div>

                    </li> -->
                </ul>
                <!-- <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul> -->
            </div>
    </div>
</body>
<script>
$(document).ready(function() {
    $('#country').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    query: query
                },
                dataType: "json",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                }
            })
        }
    });

});
</script>
<?php endif ?>