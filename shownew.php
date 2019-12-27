<!-- <?php
    while($row =mysqli_fetch_assoc($result)){
        echo '<p>' . $row['content']. '<p>';
    }
    require_once 'init.php';
    // $countcommemnt=getcountcomments($posts['id'])
?> -->
<!-- <?php 
foreach ($result as $rs) :  ?>
    <div class="card" style="width: 100vw; margin-top: 2vw">
        <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col-1" style="margin-right: 1vw">
                        <?php if ($rs['userHasAvatar']) : ?>
                        <img class="avatar" src="./IMG/<?php echo $rs['userId'] ?>.jpg">
                        <?php else : ?>
                        <img class="avatar" src="no-avatar.jpg">
    
                        <?php endif; ?>
                    </div>
                    <div class="col-10" style="margin-top: 1vw">
                        <?php echo $rs['userFullname'] ?>
                    </div>
                </div>
            </h5>
            <p class="card-text">
                <p><?php echo $rs['content'] ?></p>
                <small>Đăng lúc: <?php echo $rs['createdAt'] ?></small>
            </p>
            <div class="row">
                <a class="nav-link" onclick="arata_ascunde(this);">
                    <i class="far fa-heart"></i>
                </a>
                <a class="nav-link" href="index.php">
                    <i class="far fa-comment"></i>
                </a>
                <a class="nav-link" href="index.php">
                    <i class="far fa-paper-plane"></i>
                </a>
            </div>
            <div id="dynamic_field">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="comment" placeholder="Add a comment...">
                <div method="post">
                    <button type="button" name="add" id="add" class="btn btn-success">POST</button>
                </div>
            </div>
        </div>
        </div>
    <?php endforeach; ?> -->
<?php 
foreach ($newFeeds as $post) :  ?>
<div class="card" style="width: 100vw; margin-top: 2vw">
    <div class="card-body">
        <h5 class="card-title">
            <div class="row">
                <div class="col-1" style="margin-right: 1vw">
                    <?php if ($post['userHasAvatar']) : ?>
                    <img class="avatar" src="./IMG/<?php echo $post['userId'] ?>.jpg">
                    <?php else : ?>
                    <img class="avatar" src="no-avatar.jpg">

                    <?php endif; ?>
                </div>
                <div class="col-10" style="margin-top: 1vw">
                    <?php echo $post['userFullname'] ?>
                </div>
            </div>
        </h5>
        <p class="card-text">
            <p><?php echo $post['content'] ?></p>
            <small>Đăng lúc: <?php echo $post['createdAt'] ?></small>
        </p>
        <!-- <div class="row"> -->
            <!-- <a class="nav-link">
            <form action='Like.php' method="POST">
                <button type="submit" class="far fa-heart"></button>
            </form>
            </a> -->
            <?php $countlike=getLikes($post['id']);
                           
                            ;?>
            <div class="btn-group"style="position: relative;bottom:6px;left:23px">
                                                <?php if (userLiked($post['id'],$currentUser['id'])): ?>
                                                <a class="btn"name="unlike"id="unlike"href="like.php?from=index&type=unlike&id=<?php echo $post['id'] ?>"><i style='font-size:20px' class='far fa-thumbs-up'data-toggle="tooltip" title="Cảm xúc của bạn với status này!!"></i> Thích  <span class="badge badge-primary  rounded-circle" ><?php echo implode(" ",$countlike);?></span></a>
                                                <?php else:?>
                                                <a class="btn"name="like"id="like"href="like.php?from=index&type=like&id=<?php echo $post['id'] ?>"style='color:black'><i style='font-size:20px' class='far fa-thumbs-up'data-toggle="tooltip" title="Cảm xúc của bạn với status này!!"></i> Thích  <span class="badge badge-light  rounded-circle"><?php echo implode(" ",$countlike);?></span></a>
                                                <?php endif ?>
                                        </div>&emsp;&emsp;

            <!-- <a class="nav-link" href="index.php">
                <i class="far fa-comment"></i>
            </a>
            <a class="nav-link" href="index.php">
                <i class="far fa-paper-plane"></i>
            </a>
        </div> -->

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

                                    <form action="comments.php?from=index&type=upcommentindex&id=<?php echo $post['id'] ?>" method="POST" >
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
<?php endforeach; ?>