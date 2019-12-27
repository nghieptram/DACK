

<?php

require_once 'init.php';
$profile = findUserById($_GET['id']);
$friends = getFriends($currentUser['id']);
$isFriend = false;
foreach ($friends as $friend) {
  if ($friend['id'] == $profile['id']) {
    $isFriend = true;
  }
}


if (!$currentUser) {
  header('Location: FormLogin.php');
  exit();
}


if ($currentUser) {
    // $newFeeds = getNewFeeds();
    $newFeeds = getNewFeedsForProfile($profile['id']);
   }
// $newFeeds = getNewFeeds();
$isFollow = isFollow($currentUser['id'], $profile['id']);
$isRequest = isFollow($profile['id'], $currentUser['id']);
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
    <img 
        src="<?php echo file_exists('./IMG/' . $profile['id'] . '.jpg') ? ('./IMG/' . $profile['id'] . '.jpg') : ('./IMG/0.jpg') ?>">
    <div>
        <strong id="name"><?php echo $profile['fullname'] ?></strong>
        <div class="nav-item dropdown active" style="float: right; display: block;">
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
    <?php if ($isFriend) : ?>
        <form action="friend-request.php" method="POST">
            <input type="hidden" name="action" value="unfriend">
            <input type="hidden" name="profileId" value="<?php echo $profile['id'] ?>">
            <button type="submit" class="btn btn-danger">Hủy kết bạn</button>
        </form>
    <?php else : ?>
        <?php if ($isFollow) : ?>
            <form action="friend-request.php" method="POST">
                <input type="hidden" name="action" value="cancel-friend-request">
                <input type="hidden" name="profileId" value="<?php echo $profile['id'] ?>">
                <button type="submit" class="btn btn-primary">Hủy yêu cầu kết bạn</button>
            </form>
        <?php elseif ($isRequest) : ?>
            <form action="friend-request.php" method="POST">
                <input type="hidden" name="action" value="accept-friend-request">
                <input type="hidden" name="profileId" value="<?php echo $profile['id'] ?>">
                <button type="submit" class="btn btn-primary">Chấp nhận yêu cầu kết bạn</button>
            </form>
            <form action="friend-request.php" method="POST">
                <input type="hidden" name="action" value="reject-friend-request">
                <input type="hidden" name="profileId" value="<?php echo $profile['id'] ?>">
                <button type="submit" class="btn btn-warning">Từ chối yêu cầu kết bạn</button>
            </form>
        <?php else : ?>
            <form action="friend-request.php" method="POST">
                <input type="hidden" name="action" value="send-friend-request">
                <input type="hidden" name="profileId" value="<?php echo $profile['id'] ?>">
                <input type="hidden" name="notifyID" value="1">
                <button type="submit" class="btn btn-primary">Gửi yêu cầu kết bạn</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>
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
                <!-- <a class="nav-link">
                    <i class="far fa-heart" style="color:black" name="sub_min_points[]"></i>
                </a>
                <a class="nav-link" href="">
                    <i class="far fa-comment" style="color:black"></i>
                </a>
                <a class="nav-link" href="">
                    <i class="far fa-paper-plane" style="color:black"></i>
                </a> -->
                <?php $countlike=getLikes($post['id']);
                           
                           ;?>
           <div class="btn-group"style="position: relative;bottom:6px;left:23px">
                                               <?php if (userLiked($post['id'],$currentUser['id'])): ?>
                                               <a class="btn"name="unlike"id="unlike"href="like.php?from=profile&friendId=<?php echo $_GET['id'] ?>&type=unlike&id=<?php echo $post['id'] ?>"><i style='font-size:20px' class='far fa-thumbs-up'data-toggle="tooltip" title="Cảm xúc của bạn với status này!!"></i> Thích  <span class="badge badge-primary  rounded-circle" ><?php echo implode(" ",$countlike);?></span></a>
                                               <?php else:?>
                                               <a class="btn"name="like"id="like"href="like.php?from=profile&friendId=<?php echo $_GET['id'] ?>&type=like&id=<?php echo $post['id'] ?>"style='color:black'><i style='font-size:20px' class='far fa-thumbs-up'data-toggle="tooltip" title="Cảm xúc của bạn với status này!!"></i> Thích  <span class="badge badge-light  rounded-circle"><?php echo implode(" ",$countlike);?></span></a>
                                               <?php endif ?>
                                       </div>&emsp;&emsp;
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
                                    <form action="comments.php?from=profile&friendId=<?php echo $_GET['id'] ?>&type=upcommentindex&id=<?php echo $post['id'] ?>" method="POST" >
                                            <div class="form-group">
                                                <textarea style="height:50px" class="form-control" name="contents" id="contents" rows="3"placeholder="Thêm bình luận..."></textarea>                                
                                            </div>        
                                            <button type="submit" class="btn btn-primary" name="upcomment">comment</button>
                                        </form>	
        </div>
        
    </div>
</div>
<?php endforeach; ?>
</div>
</div>
  <?php endif; ?>
<?php include 'Footer.php'; ?>