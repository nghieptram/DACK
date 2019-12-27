<?php

require_once 'init.php';

if (!$currentUser) {
  header('Location: FormLogin.php');
  exit();
}
if ($currentUser) {
    // $newFeeds = getNewFeeds();
    $newFeeds = getNewFeedsForProfile($currentUser['id']);
   }
// $newFeeds = getNewFeeds();
?>
<?php include 'InHeader.php'; ?>
<?php if (isset($_POST['fullname']) && isset($_POST['phone'])): ?>
<?php 
$fullname = $currentUser['fullname'];
$phone = $currentUser['phone'];
$success = true;
?>
<?php if (!$success) : ?>
<?php header('Location: index.php') ?>

<?php else: ?>
<div class="alert alert-danger" role="alert">
    Vui lòng nhập đầy đủ thông tin!
</div>
<?php endif; ?>
<?php else: ?>
<div class="row" id="main">
    <img id="avatar"
        src="<?php echo file_exists('./IMG/' . $currentUser['id'] . '.jpg') ? ('./IMG/' . $currentUser['id'] . '.jpg') : ('./IMG/0.jpg') ?>">
    <div>
        <strong id="name"><?php echo $currentUser['fullname'] ?></strong>
        <a href="update-profile.php" ><button class="button">
            Chỉnh sửa trang cá nhân
        </button></a>
        <div class="nav-item dropdown active" style="float: right; display: block;">
            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <button class="iconSetting"><i class="fas fa-ellipsis-v"></i></button>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="float: left">
                <a class="dropdown-item" href="#">Cài đặt</a>

                <a class="dropdown-item" href="change-password.php">Đổi Mật Khẩu</a>
                <a class="dropdown-item" href="friend.php">Danh Sách Bạn Bè</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Đăng Xuất</a>
            </div>

        </div>
        <form action="" style="padding-top:3vw">
            <label style="margin-left: 3vw" for="baiviet"> Bài Viết</label>
            <a href="friend.php"> <label style="margin-left: 3vw" for="nguoitheodoi"> Người Theo Dõi</label></a>
            <a href="friend.php"> <label style="margin-left: 3vw" for="dangtheodoi"> Đang Theo Dõi</label></a>
        </form>

        <br>
    </div>
    <br>
</div>
<?php foreach ($newFeeds as $post) :  ?>
    <div class="card" style="margin: 2vw;">
        <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col">
                        <?php if ($post['userHasAvatar']) : ?>
                        <img class="avatar" src="./IMG/<?php echo $post['userId'] ?>.jpg">
                        <?php else : ?>
                        <img class="avatar" src="no-avatar.jpg">
 
                        <?php endif; ?>
                    </div>
                    <div class="col-11">
                        <?php echo $post['userFullname'] ?>
                    </div>
                </div>
            </h5>
            <p class="card-text">
                <p><?php echo $post['content'] ?></p>
                <small>Đăng lúc: <?php echo $post['createdAt'] ?></small>
            </p>
            <div class="row">


            <?php $countlike=getLikes($post['id']);
                           
                           ;?>
           <div class="btn-group"style="position: relative;bottom:6px;left:23px">
                                               <?php if (userLiked($post['id'],$currentUser['id'])): ?>
                                               <a class="btn"name="unlike"id="unlike"href="like.php?from=userprofile&type=unlike&id=<?php echo $post['id'] ?>"><i style='font-size:20px' class='far fa-thumbs-up'data-toggle="tooltip" title="Cảm xúc của bạn với status này!!"></i> Thích  <span class="badge badge-primary  rounded-circle" ><?php echo implode(" ",$countlike);?></span></a>
                                               <?php else:?>
                                               <a class="btn"name="like"id="like"href="like.php?from=userprofile&type=like&id=<?php echo $post['id'] ?>"style='color:black'><i style='font-size:20px' class='far fa-thumbs-up'data-toggle="tooltip" title="Cảm xúc của bạn với status này!!"></i> Thích  <span class="badge badge-light  rounded-circle"><?php echo implode(" ",$countlike);?></span></a>
                                               <?php endif ?>
                </div>&emsp;&emsp;
                

                <!-- <a class="nav-link">
                    <i class="far fa-heart" style="color:black" name="sub_min_points[]"></i>
                </a> -->
                <!-- <a class="nav-link" href="">
                    <i class="far fa-comment" style="color:black"></i>
                </a>
                <a class="nav-link" href="">
                    <i class="far fa-paper-plane" style="color:black"></i>
                </a> -->
            </div>

            <?php $getcomment=getcomment($post['id']);
                                   
                                   ?>
                                    <?php if(usercommentd($post['id'],$currentUser['id'])): ?>
                                    <div class="target" style="height:200px;overflow:scroll;" >
                                        <?php foreach ($getcomment as $postss):?>
                                       <div class="card" >
                                       <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?php if($postss['hasAvatar']):?> 
                                                        <img class="avatar" src="./IMG/<?php echo $postss['userId'] ?>.jpg">  
                                                        <?php else: ?>
                                                        <!-- <img src="avatars/no-avatar.jpg" style="width: 50px;height: 50px" class="card-img-top border border-primary"> -->
                                                        <?php endif ?> 
                                                        <a href="profile.php?id=<?php echo $postss['userId'] ?>"><div style="position: absolute; left:80px;top:20px " ><?php echo $postss['Fullname']?> </div> </a>
                                                    </h5> 
                            
                                                    <p class="card-text"style="position: absolute; left:80px;top:50px" > Bình luận lúc: 
                                                        <?php echo $postss['createdAt'];?>
                                                    </p>
                                                    <p >
                                                        <?php echo $postss['content'];?>
                                                    </p>
                                                    </div>  
                                            </div>
                                        <?php endforeach ?>
                                                        </div>
                                    <?php else:?>
                                            <div></div>
                                    <?php endif?>
                                    <form action="comments.php?from=userprofile&type=upcommentindex&id=<?php echo $post['id'] ?>" method="POST" >
                                            <div class="form-group">
                                                <textarea style="height:50px" class="form-control" name="contents" id="contents" rows="3"placeholder="Thêm bình luận..."></textarea>                                
                                            </div>        
                                            <button type="submit" class="btn btn-primary" name="upcomment">comment</button>
                                        </form>
            <!-- <div id="dynamic_field">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="comment" placeholder="Add a comment...">
                <div method="post">
                    <button type="button" name="add" id="add" class="btn btn-success">POST</button>
                </div>
            </div> -->
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>

<?php endif; ?>
<?php include 'Footer.php'; ?>